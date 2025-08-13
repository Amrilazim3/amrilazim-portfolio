<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationLabel = 'Site Settings';
    
    protected static ?string $modelLabel = 'Site Setting';
    
    protected static ?string $pluralModelLabel = 'Site Settings';
    
    protected static ?string $navigationGroup = 'Content Management';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Setting Details')
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        
                        Forms\Components\Select::make('type')
                            ->required()
                            ->options([
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'file' => 'File',
                                'image' => 'Image',
                                'json' => 'JSON',
                            ])
                            ->live()
                            ->afterStateUpdated(fn (Forms\Set $set) => $set('value', null)),
                        
                        Forms\Components\Select::make('group_name')
                            ->required()
                            ->options([
                                'hero' => 'Hero Section',
                                'about' => 'About Section',
                                'contact' => 'Contact Section',
                                'services' => 'Services Section',
                                'general' => 'General',
                            ])
                            ->default('general'),
                        
                        Forms\Components\TextInput::make('order_index')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ]),
                
                Forms\Components\Section::make('Content')
                    ->schema(function (string $operation = null, $record = null) {
                        $isEdit = $operation === 'edit' || $record;
                        
                        if ($isEdit && $record) {
                            // For edit mode, show only the field that matches the record's type
                            return match($record->type) {
                                'text' => [
                                    Forms\Components\TextInput::make('value')
                                        ->label('Value')
                                        ->maxLength(255),
                                ],
                                'textarea' => [
                                    Forms\Components\Textarea::make('value')
                                        ->label('Value')
                                        ->rows(4),
                                ],
                                'file' => [
                                    Forms\Components\FileUpload::make('value')
                                        ->label('File')
                                        ->directory(function () use ($record): string {
                                            return match($record->group_name) {
                                                'hero' => 'hero/resume',
                                                'about' => 'about/files',
                                                default => 'general/files'
                                            };
                                        })
                                        ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                        ->maxSize(5120)
                                        ->disk('public'),
                                ],
                                'image' => [
                                    Forms\Components\FileUpload::make('value')
                                        ->label('Image')
                                        ->directory(function () use ($record): string {
                                            return match($record->group_name) {
                                                'hero' => 'hero/images',
                                                'about' => 'about/images',
                                                'services' => 'services/icons',
                                                default => 'general/images'
                                            };
                                        })
                                        ->image()
                                        ->imageEditor()
                                        ->maxSize(2048)
                                        ->disk('public')
                                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']),
                                ],
                                'json' => [
                                    Forms\Components\Textarea::make('value')
                                        ->label('JSON Value')
                                        ->helperText('Enter valid JSON format. Example: ["Vue.js", "Laravel", "JavaScript"]')
                                        ->rows(6)
                                        ->rules(['json'])
                                        ->placeholder('["Item 1", "Item 2", "Item 3"]'),
                                ],
                                default => []
                            };
                        }
                        
                        // For create mode, show all fields with visibility based on type selection
                        return [
                            Forms\Components\TextInput::make('value')
                                ->label('Value')
                                ->visible(fn (Forms\Get $get): bool => in_array($get('type'), ['text']))
                                ->maxLength(255),
                            
                            Forms\Components\Textarea::make('value')
                                ->label('Value')
                                ->visible(fn (Forms\Get $get): bool => $get('type') === 'textarea')
                                ->rows(4),
                            
                            Forms\Components\FileUpload::make('value')
                                ->label('File')
                                ->visible(fn (Forms\Get $get): bool => $get('type') === 'file')
                                ->directory(function (Forms\Get $get): string {
                                    return match($get('group_name')) {
                                        'hero' => 'hero/resume',
                                        'about' => 'about/files',
                                        default => 'general/files'
                                    };
                                })
                                ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                                ->maxSize(5120)
                                ->disk('public'),
                            
                            Forms\Components\FileUpload::make('value')
                                ->label('Image')
                                ->visible(fn (Forms\Get $get): bool => $get('type') === 'image')
                                ->directory(function (Forms\Get $get): string {
                                    return match($get('group_name')) {
                                        'hero' => 'hero/images',
                                        'about' => 'about/images',
                                        'services' => 'services/icons',
                                        default => 'general/images'
                                    };
                                })
                                ->image()
                                ->imageEditor()
                                ->maxSize(2048)
                                ->disk('public')
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']),
                            
                            Forms\Components\Textarea::make('value')
                                ->label('JSON Value')
                                ->visible(fn (Forms\Get $get): bool => $get('type') === 'json')
                                ->helperText('Enter valid JSON format. Example: ["Vue.js", "Laravel", "JavaScript"]')
                                ->rows(6)
                                ->rules(['json'])
                                ->placeholder('["Item 1", "Item 2", "Item 3"]'),
                        ];
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('group_name')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'hero' => 'info',
                        'about' => 'success',
                        'contact' => 'warning',
                        'services' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'text' => 'info',
                        'textarea' => 'success',
                        'file' => 'warning',
                        'image' => 'danger',
                        'json' => 'gray',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 50 ? $state : null;
                    }),
                
                Tables\Columns\TextColumn::make('order_index')
                    ->label('Order')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group_name')
                    ->options([
                        'hero' => 'Hero Section',
                        'about' => 'About Section',
                        'contact' => 'Contact Section',
                        'services' => 'Services Section',
                        'general' => 'General',
                    ]),
                
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'text' => 'Text',
                        'textarea' => 'Textarea',
                        'file' => 'File',
                        'image' => 'Image',
                        'json' => 'JSON',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('group_name')
            ->defaultSort('order_index');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}

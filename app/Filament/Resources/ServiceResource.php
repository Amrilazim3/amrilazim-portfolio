<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    
    protected static ?string $navigationLabel = 'Services';
    
    protected static ?string $modelLabel = 'Service';
    
    protected static ?string $pluralModelLabel = 'Services';
    
    protected static ?string $navigationGroup = 'Content Management';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Service Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('icon_type')
                            ->required()
                            ->options([
                                'svg' => 'SVG Code',
                                'class' => 'CSS Class',
                            ])
                            ->default('svg')
                            ->live(),
                        
                        Forms\Components\Textarea::make('icon_content')
                            ->label(function (Forms\Get $get): string {
                                return $get('icon_type') === 'svg' ? 'SVG Code' : 'CSS Classes';
                            })
                            ->helperText(function (Forms\Get $get): string {
                                return $get('icon_type') === 'svg' 
                                    ? 'Enter the complete SVG element with all attributes'
                                    : 'Enter CSS classes like "fas fa-code" or "heroicon-o-code"';
                            })
                            ->rows(6)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('order_index')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->helperText('Lower numbers appear first'),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only active services will be displayed on the website'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 50 ? $state : null;
                    }),
                
                Tables\Columns\BadgeColumn::make('icon_type')
                    ->colors([
                        'primary' => 'svg',
                        'success' => 'class',
                    ]),
                
                Tables\Columns\TextColumn::make('order_index')
                    ->label('Order')
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('All services')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
                
                Tables\Filters\SelectFilter::make('icon_type')
                    ->options([
                        'svg' => 'SVG',
                        'class' => 'CSS Class',
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
            ->defaultSort('order_index')
            ->reorderable('order_index');
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}

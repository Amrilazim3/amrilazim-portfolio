<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificationResource\Pages;
use App\Filament\Resources\CertificationResource\RelationManagers;
use App\Models\Certification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificationResource extends Resource
{
    protected static ?string $model = Certification::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Portfolio Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Course Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Laravel 8 From Scratch'),
                        
                        Forms\Components\TextInput::make('platform')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Laracasts, Udemy, Coursera')
                            ->datalist([
                                'Laracasts',
                                'Udemy',
                                'Coursera',
                                'edX',
                                'LinkedIn Learning',
                                'Pluralsight',
                                'YouTube',
                            ]),
                        
                        Forms\Components\TextInput::make('instructor')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Jeffrey Way'),
                        
                        Forms\Components\TextInput::make('date')
                            ->label('Completion Date')
                            ->required()
                            ->placeholder('e.g., 2023, Q1 2023, March 2023')
                            ->helperText('Flexible format - can be year, month, or quarter'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Course Details')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->maxLength(1000)
                            ->placeholder('Brief description of what you learned in this course'),
                        
                        Forms\Components\TagsInput::make('skills')
                            ->label('Skills Covered')
                            ->required()
                            ->placeholder('e.g., Laravel, PHP, Eloquent ORM')
                            ->helperText('Press Enter after each skill'),
                        
                        Forms\Components\TextInput::make('duration')
                            ->required()
                            ->placeholder('e.g., 1 week, 2 months, 40 hours')
                            ->helperText('How long the course took to complete'),
                    ]),

                Forms\Components\Section::make('Status & Links')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'completed' => 'Completed',
                                'in_progress' => 'In Progress',
                                'planned' => 'Planned',
                            ])
                            ->required()
                            ->default('completed'),
                        
                        Forms\Components\TextInput::make('course_url')
                            ->label('Course URL')
                            ->url()
                            ->placeholder('https://laracasts.com/series/laravel-8-from-scratch')
                            ->helperText('Link to the course page'),
                        
                        Forms\Components\TextInput::make('image_url')
                            ->label('Course Image URL')
                            ->url()
                            ->placeholder('https://example.com/course-image.jpg')
                            ->helperText('URL to course thumbnail or logo'),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Certification')
                            ->helperText('Featured certifications are highlighted'),
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
                    ->sortable()
                    ->limit(40),
                
                Tables\Columns\TextColumn::make('platform')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                
                Tables\Columns\TextColumn::make('instructor')
                    ->searchable()
                    ->toggleable(),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'completed',
                        'warning' => 'in_progress',
                        'secondary' => 'planned',
                    ]),
                
                Tables\Columns\TextColumn::make('date')
                    ->label('Completed')
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('platform')
                    ->options([
                        'Laracasts' => 'Laracasts',
                        'Udemy' => 'Udemy',
                        'Coursera' => 'Coursera',
                        'edX' => 'edX',
                        'LinkedIn Learning' => 'LinkedIn Learning',
                        'Pluralsight' => 'Pluralsight',
                    ]),
                
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'completed' => 'Completed',
                        'in_progress' => 'In Progress',
                        'planned' => 'Planned',
                    ]),
                
                Tables\Filters\Filter::make('is_featured')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true))
                    ->label('Featured Only'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('sort_order')
            ->emptyStateHeading('No certifications yet')
            ->emptyStateDescription('Add your first certification to showcase your learning journey.')
            ->emptyStateIcon('heroicon-o-academic-cap');
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
            'index' => Pages\ListCertifications::route('/'),
            'create' => Pages\CreateCertification::route('/create'),
            'edit' => Pages\EditCertification::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::completed()->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }
}

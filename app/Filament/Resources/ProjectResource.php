<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Portfolio Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Select::make('skill_id')
                            ->label('Primary Skill')
                            ->relationship('skill', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Project name'),
                        
                        Forms\Components\Select::make('type')
                            ->options([
                                'client' => 'Client Project',
                                'personal' => 'Personal Project',
                                'open_source' => 'Open Source',
                                'freelance' => 'Freelance',
                            ])
                            ->required()
                            ->default('personal'),
                        
                        Forms\Components\FileUpload::make('image')
                            ->label('Project Screenshot')
                            ->image()
                            ->directory('projects')
                            ->disk('public')
                            ->visibility('public')
                            ->imageEditor()
                            ->required()
                            ->helperText('Upload a screenshot or preview image'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Description & Details')
                    ->schema([
                        Forms\Components\Textarea::make('detailed_description')
                            ->label('Detailed Description')
                            ->rows(4)
                            ->maxLength(1000)
                            ->placeholder('Comprehensive description of the project')
                            ->helperText('This will be displayed on the frontend'),
                        
                        Forms\Components\TagsInput::make('technologies')
                            ->label('Technologies Used')
                            ->placeholder('e.g., Laravel, Vue.js, MySQL')
                            ->helperText('Press Enter after each technology'),
                        
                        Forms\Components\TagsInput::make('features')
                            ->label('Key Features')
                            ->placeholder('e.g., User Authentication, Real-time Chat')
                            ->helperText('Press Enter after each feature'),
                    ]),

                Forms\Components\Section::make('Case Study Details')
                    ->schema([
                        Forms\Components\Textarea::make('challenge')
                            ->label('Challenge/Problem')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('What challenge did this project solve?'),
                        
                        Forms\Components\Textarea::make('solution')
                            ->label('Solution/Approach')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('How did you solve the challenge?'),
                        
                        Forms\Components\TextInput::make('duration')
                            ->label('Project Duration')
                            ->placeholder('e.g., 2 months, 3 weeks')
                            ->maxLength(100),
                        
                        Forms\Components\Textarea::make('outcome')
                            ->label('Outcome/Results')
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('What were the results or achievements?'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Links & Settings')
                    ->schema([
                        Forms\Components\TextInput::make('project_url')
                            ->label('Live Project URL')
                            ->url()
                            ->placeholder('https://example.com'),
                        
                        Forms\Components\TextInput::make('github_url')
                            ->label('GitHub Repository URL')
                            ->url()
                            ->placeholder('https://github.com/username/repo'),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Project')
                            ->helperText('Featured projects are highlighted on the homepage'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Screenshot')
                    ->disk('public')
                    ->width(60)
                    ->height(40),
                
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('skill.name')
                    ->label('Primary Skill')
                    ->sortable()
                    ->searchable(),
                
                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'client',
                        'success' => 'personal',
                        'warning' => 'freelance',
                        'info' => 'open_source',
                    ]),
                
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
                Tables\Filters\SelectFilter::make('skill_id')
                    ->label('Primary Skill')
                    ->relationship('skill', 'name'),
                
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'client' => 'Client Project',
                        'personal' => 'Personal Project',
                        'open_source' => 'Open Source',
                        'freelance' => 'Freelance',
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
            ->emptyStateHeading('No projects yet')
            ->emptyStateDescription('Create your first project to showcase your work.')
            ->emptyStateIcon('heroicon-o-briefcase');
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}

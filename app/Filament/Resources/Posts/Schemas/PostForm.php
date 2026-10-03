<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contenu de l\'article')
                    ->description('Rédigez votre article de blog')
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label('Contenu')
                            ->required()
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('Paramètres & Visuels')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('category')
                                ->label('Catégorie')
                                ->required(),

                            TextInput::make('read_time')
                                ->label('Temps de lecture (ex: 5 min)'),
                        ]),

                        FileUpload::make('image_url')
                            ->label('Image de couverture')
                            ->image()
                            ->directory('blog')
                            ->columnSpanFull(),

                        Toggle::make('is_featured')
                            ->label('Mettre à la une')
                            ->helperText('Cet article sera mis en avant sur le site.')
                            ->default(false),
                    ]),
            ]);
    }
}

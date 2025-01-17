<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('price')->required(),
                Forms\Components\Select::make('category')->required() // filter les category
                                                        ->label('Categorie') 
                                                        ->relationship(name: 'category' , titleAttribute: 'name')
                                                        ->required(),
                Forms\Components\FileUpload::make('images')->multiple(), // pour telecharger des fichiers

                // Select::make('category_id')
                //     ->label('Categorie')
                //     ->options(Category::all()->pluck('name', 'id'))
                //     ->searchable(),
                // TextInput::make('name'),
                // Textarea::make('description'),
                // TextInput::make('price')
                //     ->numeric()
                //     ->prefix('€'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('images'),
              

                TextColumn::make("name")
                ->description(fn (Product $record):string => substr($record->description , 0, 20))
                                            ->label('Nom')
                                            ->searchable()
                                            ->sortable(),
                // TextColumn::make('id'),
                // TextColumn::make('category_id'),
                // TextColumn::make('name'),
                // TextColumn::make('description'),
                // TextColumn::make('price')
                //     ->money('EUR'),
                // TextColumn::make('created_at'),
                // TextColumn::make('updated_at'),
            ])
            ->filters([
                SelectFilter::make('Category')
                                    ->relationship('category', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

             
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('email')->email()->required(),
                    Forms\Components\TextInput::make('password')
            ->password()
            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
            ->dehydrated(fn ($state) => filled($state))
            ->required(fn (string $context): bool => $context === 'create'),
            
                    Forms\Components\Select::make('role')
                                                        ->options(['user'=>'Client',
                                                        'admin'=> 'Administrateur',
            ]),
                // TextInput::make('name'),
                // TextInput::make('email')
                //     ->email(),
                // Select::make('role')
                //     ->options([
                //         'admin' => 'Admin',
                //         'user' => 'User',
                //     ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            Tables\Columns\TextColumn::make('name')->label('Nom')
            ->searchable()->sortable(),
            Tables\Columns\TextInputColumn::make('email') 
            // ->icon('heroicon-o-envelope') mettre des icons
            ->searchable()->sortable(),
            Tables\Columns\SelectColumn::make('role')
            ->options(['user'=>'Client',
                       'admin'=> 'Administrateur',
            ]),
                // TextColumn::make('id'),
                // TextColumn::make('name'),
                // TextColumn::make('email'),
                // TextColumn::make('role'),
                // TextColumn::make('created_at'),
                // TextColumn::make('updated_at'),
            ])
            ->filters([
                SelectFilter::make('role')
    ->options([
        'user' => 'Client',
        'admin' => 'Administrateur',
    ])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

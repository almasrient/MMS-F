<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NegaraResource\Pages;
use App\Filament\Resources\NegaraResource\RelationManagers;
use App\Models\Negara;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NegaraResource extends Resource
{
    protected static ?string $model = Negara::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationLabel = 'Negara';
    protected static ?string $modelLabel = 'Negara';
    protected static ?string $navigationGroup = 'Geo Lokasi';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->numeric()
                    ->maxLength(3),
                Forms\Components\TextInput::make('phonecode')
                    ->required()
                    ->numeric()
                    ->maxLength(5),            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('Abbr')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phonecode')
                    ->label('Phonecode')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListNegaras::route('/'),
            'create' => Pages\CreateNegara::route('/create'),
            'edit' => Pages\EditNegara::route('/{record}/edit'),
        ];
    }    
}

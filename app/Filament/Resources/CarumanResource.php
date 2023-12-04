<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarumanResource\Pages;
use App\Filament\Resources\CarumanResource\RelationManagers;
use App\Models\Caruman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarumanResource extends Resource
{
    protected static ?string $model = Caruman::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'Yuran Caruman';
    protected static ?string $modelLabel = 'Yuran Caruman';    
    protected static ?string $navigationGroup = 'Caruman';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('perkara')
                    ->label('Perkara')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('yuran')
                    ->required()    
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('perkara')
                    ->label('Perkara')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('yuran')
                    ->label('Yuran')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCarumen::route('/'),
            'create' => Pages\CreateCaruman::route('/create'),
            'view' => Pages\ViewCaruman::route('/{record}'),
            'edit' => Pages\EditCaruman::route('/{record}/edit'),
        ];
    }    
}

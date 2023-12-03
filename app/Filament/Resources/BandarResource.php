<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BandarResource\Pages;
use App\Filament\Resources\BandarResource\RelationManagers;
use App\Models\Bandar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BandarResource extends Resource
{
    protected static ?string $model = Bandar::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Bandar';
    protected static ?string $modelLabel = 'Bandar';     
    protected static ?string $navigationGroup = 'Geo Lokasi';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('negeri_id')
                    ->label('Nama Negeri')
                    ->relationship(name: 'negeri', titleAttribute: 'name')
                    ->searchable()
                    ->preload()                
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Cities Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('negeri.name')
                    ->label('States')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('negeri.negara.name')
                    ->label('Country')
                    ->searchable()
                    ->sortable(),                    
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
            'index' => Pages\ListBandars::route('/'),
            'create' => Pages\CreateBandar::route('/create'),
            'view' => Pages\ViewBandar::route('/{record}'),
            'edit' => Pages\EditBandar::route('/{record}/edit'),
        ];
    }    
}

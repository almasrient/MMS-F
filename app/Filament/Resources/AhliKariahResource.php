<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AhliKariahResource\Pages;
use App\Filament\Resources\AhliKariahResource\RelationManagers;
use App\Models\AhliKariah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AhliKariahResource extends Resource
{
    protected static ?string $model = AhliKariah::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Ahli Kariah';
    protected static ?string $modelLabel = 'Ahli Kariah';    
    protected static ?string $navigationGroup = 'Ahli Kariah';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('negara_id')
                    ->required()
                    ->numeric(),                
                Forms\Components\TextInput::make('negeri_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('bandar_id')
                    ->required()
                    ->numeric(),                    
                Forms\Components\TextInput::make('nama_penuh')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nric')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tarikh_lahir')
                    ->required(),
                Forms\Components\DatePicker::make('tarikh_meninggal'),
                Forms\Components\DatePicker::make('tarikh_daftar')
                    ->required(),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('poskod')
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListAhliKariahs::route('/'),
            'create' => Pages\CreateAhliKariah::route('/create'),
            'view' => Pages\ViewAhliKariah::route('/{record}'),
            'edit' => Pages\EditAhliKariah::route('/{record}/edit'),
        ];
    }    
}

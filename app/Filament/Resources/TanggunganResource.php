<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TanggunganResource\Pages;
use App\Filament\Resources\TanggunganResource\RelationManagers;
use App\Models\Tanggungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TanggunganResource extends Resource
{
    protected static ?string $model = Tanggungan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Tanggungan Ahli Kariah';
    protected static ?string $modelLabel = 'Tanggungan Ahli Kariah';    
    protected static ?string $navigationGroup = 'Ahli Kariah';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('negara_id')
                ->label('Nama Negara')
                ->relationship(name: 'negara', titleAttribute: 'name')
                ->searchable()
                // ->preload()
                ->required(),              
            Forms\Components\Select::make('negeri_id')
                ->label('Nama Negeri')
                ->relationship(name: 'negeri', titleAttribute: 'name')
                ->searchable()
                // ->preload()                
                ->required(),
            Forms\Components\Select::make('bandar_id')
                ->label('Nama Bandar')
                ->relationship(name: 'bandar', titleAttribute: 'name')
                ->searchable()
                // ->preload()                     
                ->required(),       
            Forms\Components\Select::make('ahli_kariah_nric')
            ->label('NRIC Penjaga')
            ->relationship(name: 'ahlikariah', titleAttribute: 'nric')
            ->searchable()
            // ->preload()                     
            ->required(),                               
            Forms\Components\TextInput::make('name_penuh')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('no_tel')
                ->label('No Tel')
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
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
            'index' => Pages\ListTanggungans::route('/'),
            'create' => Pages\CreateTanggungan::route('/create'),
            'view' => Pages\ViewTanggungan::route('/{record}'),
            'edit' => Pages\EditTanggungan::route('/{record}/edit'),
        ];
    }    
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KariahResource\Pages;
use App\Filament\Resources\KariahResource\RelationManagers;
use App\Models\Kariah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KariahResource extends Resource
{
    protected static ?string $model = Kariah::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Kariah';
    protected static ?string $modelLabel = 'Kariah';    
    protected static ?string $navigationGroup = 'Kariah';
    protected static ?int $navigationSort = 1;

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
            Forms\Components\TextInput::make('name_kariah')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('no_tel')
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->maxLength(255),
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
            Tables\Columns\TextColumn::make('name_kariah')
                ->label('Nama Kariah')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('no_tel')
                ->formatStateUsing(function ($state, Kariah $kariah) {
                    return new HtmlString("&#9993; ".$kariah->no_tel ."<br/> &#9742; ".$kariah->email) ;  })
                ->label('Contact')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat')
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
            'index' => Pages\ListKariahs::route('/'),
            'create' => Pages\CreateKariah::route('/create'),
            'edit' => Pages\EditKariah::route('/{record}/edit'),
        ];
    }    
}

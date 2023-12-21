<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrgaKariahResource\Pages;
use App\Filament\Resources\OrgaKariahResource\RelationManagers;
use App\Models\OrgaKariah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrgaKariahResource extends Resource
{
    protected static ?string $model = OrgaKariah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?string $navigationLabel = 'Organisasi Kariah';
    protected static ?string $modelLabel = 'Organisasi Kariah';    
    protected static ?string $navigationGroup = 'Kariah';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('kariah_id')
                ->label('Nama Kariah')
                ->relationship(name: 'kariah', titleAttribute: 'name_kariah')
                ->searchable()
                // ->preload()
                ->required(),                   
            Forms\Components\Select::make('ahli_kariah_id')
            ->label('NRIC Petugas')
            ->relationship(name: 'ahli_kariah', titleAttribute: 'nric')
            ->searchable()
            // ->preload()                     
            ->required(),                               
            Forms\Components\TextInput::make('jawatan')
                ->required()
                ->maxLength(255),
            Forms\Components\DatePicker::make('tarikh_lantikan')
                ->required(),
            Forms\Components\DatePicker::make('tarikh_tamat')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kariah.name_kariah')
                    ->label('Kariah')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ahli_kariah.nric')
                    ->label('NRIC Petugas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jawatan')
                    ->label('Jawatan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tarikh_lantikan')
                    ->label('Tarikh Lantikan')
                    ->sortable()
                    ->searchable(),                    
                Tables\Columns\TextColumn::make('tarikh_tamat')
                    ->label('Tarikh Tamat')
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
            'index' => Pages\ListOrgaKariahs::route('/'),
            // 'create' => Pages\CreateOrgaKariah::route('/create'),
            // 'view' => Pages\ViewOrgaKariah::route('/{record}'),
            // 'edit' => Pages\EditOrgaKariah::route('/{record}/edit'),
        ];
    }    
}

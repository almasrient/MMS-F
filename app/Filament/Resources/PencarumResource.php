<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PencarumResource\Pages;
use App\Filament\Resources\PencarumResource\RelationManagers;
use App\Models\Pencarum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PencarumResource extends Resource
{
    protected static ?string $model = Pencarum::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationLabel = 'Pencarum';
    protected static ?string $modelLabel = 'Pencarum';    
    protected static ?string $navigationGroup = 'Caruman';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('ahli_kariah_id')
                    ->label('NRIC Pencarum')
                    ->relationship(name: 'ahli_kariah', titleAttribute: 'nric')
                    ->searchable()
                    ->required(),  
                Forms\Components\Select::make('caruman_id')
                    ->label('Perkara')
                    ->relationship(name: 'caruman', titleAttribute: 'perkara')
                    ->searchable()
                    ->required(),  
                Forms\Components\DatePicker::make('tarikh_pembayaran')
                    ->required(),
                Forms\Components\TextInput::make('catatan')
                    ->label('Catatan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ahli_kariah.nric')
                    ->label('NRIC Pencarum')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('caruman.perkara')
                    ->label('Perkara')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tarikh_pembayaran')
                    ->label('Tarikh Bayaran')
                    ->sortable()
                    ->searchable(),                    
                Tables\Columns\TextColumn::make('catatan')
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
            'index' => Pages\ListPencarums::route('/'),
            'create' => Pages\CreatePencarum::route('/create'),
            'view' => Pages\ViewPencarum::route('/{record}'),
            'edit' => Pages\EditPencarum::route('/{record}/edit'),
        ];
    }    
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NegeriResource\Pages;
// use App\Filament\Resources\NegeriResource\Pages\List;
use App\Filament\Resources\NegeriResource\RelationManagers;
use App\Models\Negeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NegeriResource extends Resource
{
    protected static ?string $model = Negeri::class;

    protected static ?string $navigationTitle = 'Negeri';
    // protected ?string $subheading = 'This is the subheading.';
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationLabel = 'Negeri';
    protected static ?string $modelLabel = 'Negeri';     
    protected static ?string $navigationGroup = 'Ahli Kariah';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Add these STATUS if Column Status in Table is Updated 
                // Forms\Components\Select::make('status')
                // ->options([
                //     'active' => 'Active',
                //     'inactive' => 'Inactive',
                // ])
                // ->required(),
                Forms\Components\Select::make('negara_id')
                    ->label('Nama Negara')
                    ->relationship(name: 'negara', titleAttribute: 'name')
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
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('negara.code')
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
            'index' => Pages\ListNegeris::route('/'),
            'create' => Pages\CreateNegeri::route('/create'),
            'edit' => Pages\EditNegeri::route('/{record}/edit'),
        ];
    }    
}

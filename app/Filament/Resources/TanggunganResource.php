<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TanggunganResource\Pages;
use App\Filament\Resources\TanggunganResource\RelationManagers;
use App\Models\Negeri;
use App\Models\Bandar;
use App\Models\Tanggungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
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
            ->live()  
            ->required(),              
            Forms\Components\Select::make('negeri_id')
                ->label('Nama Negeri')
                ->options(fn(Get $get): Collection => Negeri::query()
                    ->where('negara_id', $get('negara_id'))
                    ->pluck('name', 'id'))  
                ->searchable()
                // ->preload()             
                ->live()     
                ->required(),
            Forms\Components\Select::make('bandar_id')
                ->label('Nama Bandar')
                ->options(fn(Get $get): Collection => Bandar::query()
                    ->where('negeri_id', $get('negeri_id'))
                    ->pluck('name', 'id'))  
                ->searchable()
                // ->preload()     
                ->required(),       
            Forms\Components\Select::make('ahli_kariah_id')
            ->label('NRIC Penjaga')
            ->relationship(name: 'ahli_kariah', titleAttribute: 'nric')
            ->searchable()
            // ->preload()                     
            ->required(),                               
            Forms\Components\TextInput::make('name_penuh')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('nric')
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
                Tables\Columns\TextColumn::make('name_penuh')
                    ->label('Nama Penuh')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nric')
                    ->label('NRIC')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_tel')
                    ->formatStateUsing(function ($state, Tanggungan $tanggungan) {
                        return new HtmlString("&#9993; ".$tanggungan->no_tel ."<br/> &#9742; ".$tanggungan->email) ;  })
                    ->label('Contact')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),  
                Tables\Columns\TextColumn::make('ahli_kariah.nric')
                    ->label('NRIC Penjaga')
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
            'index' => Pages\ListTanggungans::route('/'),
            // 'create' => Pages\CreateTanggungan::route('/create'),
            // 'view' => Pages\ViewTanggungan::route('/{record}'),
            // 'edit' => Pages\EditTanggungan::route('/{record}/edit'),
        ];
    }    
}

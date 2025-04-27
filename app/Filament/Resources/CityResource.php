<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Filament\Resources\CityResource\RelationManagers;
use App\Models\City;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Attributes\Reactive;
use Illuminate\Support\Str;

// use Filament\Forms\Components\FileUpload;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        // ini itu validasi kalau di bilang validasi nya langsung di form nya biasanya kan di controler
        // ->image()
        // ->directory('cities')
        // ->required(),
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                ->image()
                // directory atau tempat menyimpannya
                // ->directory('image')
                ->required()
                // lebar dua kolum
                ->columnSpan(2),
                Forms\Components\TextInput::make('name')
                ->required()
                // biar sedikit delay
                ->debounce(500)
                // jadi dia akan beraksi ketika ada perubahan
                ->reactive()
                // dan ketika dia terupdate maka kita jalakan sebuah fungsi
                // dimana dia akan merubah inputan si slug nya
                ->afterStateUpdated(function ($state, callable $set) {
                    $set('slug', Str::slug($state));
                }),
                Forms\Components\TextInput::make('slug')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCities::route('/'),
            'create' => Pages\CreateCity::route('/create'),
            'edit' => Pages\EditCity::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardingHouseResource\Pages;
use App\Filament\Resources\BoardingHouseResource\RelationManagers;
use App\Models\BoardingHouse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class BoardingHouseResource extends Resource
{
    protected static ?string $model = BoardingHouse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // biar g perlu panggil tread nya use Filament\Infolists\Components\Tabs; 
                // pakai Forms\Components\Tabs
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Infomasi umum')
                            ->schema([
                                Forms\Components\FileUpload::make('thumbnail')
                                    ->image()
                                    // directory atau tempat menyimpannya
                                    // ->directory('image')
                                    ->required(),
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    // biar sedikit delay
                                    // ->debounce(500)
                                    // jadi dia akan beraksi ketika ada perubahan
                                    ->reactive() // wajib biar bisa denger perubahan input
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->disabled(), // supaya gak bisa diedit manual, biar fokus dari name,
                                Forms\Components\Select::make('city_id')
                                    // city ini adalan nama fungsi di model coba liat model boarding
                                    ->relationship('city', 'name')
                                    ->required(),
                                Forms\Components\Select::make('category_id')
                                    // city ini adalan nama fungsi di model coba liat model boarding
                                    ->relationship('category', 'name')
                                    ->required(),
                                Forms\Components\RichEditor::make('description')
                                    ->required(),
                                Forms\Components\TextInput::make('price')
                                    // hanya angaka 
                                    ->numeric()
                                    // biar jelas aja atau keren
                                    ->prefix('IDR')
                                    ->required(),
                                Forms\Components\Textarea::make('address')
                                    ->required(),
                            ]),
                        Forms\Components\Tabs\Tab::make('city_id')
                            ->schema([
                                // ...
                            ]),
                        Forms\Components\Tabs\Tab::make('Tab 3')
                            ->schema([
                                // ...
                            ]),
                    ])->columnSpan(2)
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
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBoardingHouses::route('/'),
            'create' => Pages\CreateBoardingHouse::route('/create'),
            'edit' => Pages\EditBoardingHouse::route('/{record}/edit'),
        ];
    }
}

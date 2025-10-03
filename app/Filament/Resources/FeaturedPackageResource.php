<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturedPackageResource\Pages;
use App\Models\FeaturedPackage;
use App\Models\Package; // Pastikan ini ada
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FeaturedPackageResource extends Resource
{
    protected static ?string $model = FeaturedPackage::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Paket di Homepage';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('package_id')
                ->label('Pilih Paket Utama')
                // Menggunakan ->options() sebagai solusi pasti
                ->options(Package::all()->pluck('title', 'id'))
                ->searchable()
                ->required()
                ->helperText('Pilih dari daftar paket yang sudah dibuat sebelumnya.'),
            
            Forms\Components\Section::make('Detail Tambahan untuk Homepage')->columns(2)->schema([
                Forms\Components\Select::make('status')
                    ->options(['Tersedia' => 'Tersedia', 'Terbatas' => 'Terbatas', 'Full Booked' => 'Full Booked'])
                    ->required(),
                Forms\Components\TextInput::make('display_order')->label('Urutan Tampil')->numeric()->default(0),
                Forms\Components\Select::make('flight_type')->options(['Direct' => 'Direct', 'Transit' => 'Transit']),
                Forms\Components\TextInput::make('airline')->placeholder('Contoh: Garuda Indonesia'),
                Forms\Components\TextInput::make('hotel_1_name')->label('Nama Hotel 1'),
                Forms\Components\Select::make('hotel_1_stars')->label('Bintang Hotel 1')->options([1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5']),
                Forms\Components\TextInput::make('hotel_2_name')->label('Nama Hotel 2'),
                Forms\Components\Select::make('hotel_2_stars')->label('Bintang Hotel 2')->options([1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5']),
            ]),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('package.title')->label('Nama Paket')->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['primary' => 'Tersedia', 'warning' => 'Terbatas', 'danger' => 'Full Booked']),
                Tables\Columns\TextColumn::make('display_order')->label('Urutan')->sortable(),
            ])
            ->defaultSort('display_order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeaturedPackages::route('/'),
            'create' => Pages\CreateFeaturedPackage::route('/create'),
            'edit' => Pages\EditFeaturedPackage::route('/{record}/edit'),
        ];
    }    
}
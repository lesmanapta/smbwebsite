<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvantageResource\Pages;
use App\Models\Advantage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdvantageResource extends Resource
{
    protected static ?string $model = Advantage::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    
    protected static ?string $navigationLabel = 'Keunggulan';

    // Pastikan method form() ini ada
    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('description')
                ->required(),
            // DIUBAH: dari TextInput menjadi Select
            Forms\Components\Select::make('icon')
                ->label('Pilih Ikon')
                ->options([
                    'heroicon-o-check-circle' => 'Ceklis (Lingkaran)',
                    'heroicon-o-shield-check' => 'Perisai (Keamanan)',
                    'heroicon-o-star' => 'Bintang (Rating)',
                    'heroicon-o-heart' => 'Hati (Pelayanan)',
                    'heroicon-o-globe-alt' => 'Globe (Internasional)',
                    'heroicon-o-users' => 'Orang (Jamaah)',
                    'heroicon-o-building-office-2' => 'Gedung (Kantor Resmi)',
                    'heroicon-o-paper-airplane' => 'Pesawat Kertas (Keberangkatan)',
                ])
                ->searchable()
                ->helperText('Pilih ikon yang paling sesuai.'),
        ]);
}

    // Pastikan method table() ini ada
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('icon'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    // Pastikan method getRelations() ini ada
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    // Pastikan method getPages() ini ada
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdvantages::route('/'),
            'create' => Pages\CreateAdvantage::route('/create'),
            'edit' => Pages\EditAdvantage::route('/{record}/edit'),
        ];
    }    
}
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultationResource\Pages;
use App\Models\Consultation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConsultationResource extends Resource
{
    protected static ?string $model = Consultation::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Konsultasi Jamaah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->options([
                        'Baru' => 'Baru',
                        'Dihubungi' => 'Dihubungi',
                        'Selesai' => 'Selesai',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('name')->disabled(),
                Forms\Components\TextInput::make('whatsapp_number')->disabled(),
                Forms\Components\TextInput::make('package_name')->disabled(),
                Forms\Components\TextInput::make('planned_departure')->disabled(),
                Forms\Components\TextInput::make('created_at')->label('Tanggal Masuk')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama Lengkap')->searchable(),
                Tables\Columns\TextColumn::make('whatsapp_number')->label('No. WhatsApp'),
                Tables\Columns\TextColumn::make('package_name')->label('Paket Dipilih'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'primary' => 'Baru',
                        'warning' => 'Dihubungi',
                        'success' => 'Selesai',
                    ]),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->date()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConsultations::route('/'),
            // Kita hapus halaman 'create' karena data masuk dari form publik
            // 'create' => Pages\CreateConsultation::route('/create'), 
            'edit' => Pages\EditConsultation::route('/{record}/edit'),
        ];
    }
}
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Paket Umrah & Haji';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->unique(Package::class, 'slug', ignoreRecord: true),

                Forms\Components\DatePicker::make('departure_date')
                    ->required(),

                Forms\Components\TextInput::make('duration_days')
                    ->required()
                    ->numeric()
                    ->suffix('Hari'),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),
                
                Forms\Components\FileUpload::make('flyer_image')
                    ->required()
                    ->image()
                    ->disk('public')
                    ->directory('packages')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('is_active')
                    ->required(),
                
                // ===== BAGIAN BARU DITAMBAHKAN DI SINI =====
                Forms\Components\Section::make('Detail Biaya & Catatan')
                    ->description('Isi detail untuk ditampilkan di halaman paket sebagai akordeon.')
                    ->schema([
                        Forms\Components\RichEditor::make('cost_includes')
                            ->label('Biaya Sudah Termasuk')
                            ->helperText('Gunakan fitur bullet points untuk membuat daftar.'),

                        Forms\Components\RichEditor::make('cost_excludes')
                            ->label('Biaya Belum Termasuk'),

                        Forms\Components\RichEditor::make('notes')
                            ->label('Catatan Tambahan'),
                    ])
                    ->collapsible()
                    ->collapsed(), // Dibuat default tertutup agar form tidak terlalu panjang
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('flyer_image')->disk('public'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('price')->money('IDR')->sortable(),
                Tables\Columns\TextColumn::make('duration_days')->suffix(' Hari')->sortable(),
                Tables\Columns\TextColumn::make('departure_date')->date()->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
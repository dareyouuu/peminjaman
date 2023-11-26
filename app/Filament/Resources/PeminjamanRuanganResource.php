<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeminjamanRuanganResource\Pages;
use App\Filament\Resources\PeminjamanRuanganResource\RelationManagers;
use App\Models\PeminjamanRuangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeminjamanRuanganResource extends Resource
{
    protected static ?string $model = PeminjamanRuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Peminjaman Ruangan dan Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListPeminjamanRuangans::route('/'),
            'create' => Pages\CreatePeminjamanRuangan::route('/create'),
            'edit' => Pages\EditPeminjamanRuangan::route('/{record}/edit'),
        ];
    }    
}

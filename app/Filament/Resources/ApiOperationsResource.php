<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApiOperationsResource\Pages;
use App\Filament\Resources\ApiOperationsResource\RelationManagers;
use App\Models\ApiOperationsModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class ApiOperationsResource extends Resource {

    protected static ?string $model = ApiOperationsModel::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'API';
    protected static ?int $navigationSort = 100;
    protected static ?string $navigationGroup = 'Api İşlemleri';

    public static function form(Form $form): Form {
        /**
         * @todo Description ayrı bir class taşi
         */
        $hex = random_bytes(24);
        $hex = bin2hex($hex);
        $hex = strtoupper($hex);
        $hex = wordwrap($hex, 8, '-', true);

        return $form
                        ->schema([
                            TextInput::make('token')->default($hex)->readOnly(),
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                            TextColumn::make('token'),
                            TextColumn::make('created_at')
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

    public static function getRelations(): array {
        return [
                //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListApiOperations::route('/'),
            'create' => Pages\CreateApiOperations::route('/create'),
            'edit' => Pages\EditApiOperations::route('/{record}/edit'),
        ];
    }

    public function hexcodeToken() {
        
    }
}

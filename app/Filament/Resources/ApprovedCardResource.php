<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApprovedCardResource\Pages;
use App\Filament\Resources\ApprovedCardResource\RelationManagers;
use App\Models\CartModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\Filter;
use Filament\Resources\Components\Tab;
use Filament\Forms\Components\DatePicker;

class ApprovedCardResource extends Resource {

    protected static ?string $model = CartModel::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Onaylı Yatrımlar';
protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'YATIRIM';
    public static function form(Form $form): Form {
        return $form
                        ->schema([
                                //
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                            TextColumn::make('id'),
                            TextColumn::make('CardOwnerTitle'),
                            TextColumn::make('CardNumber'),
                            TextColumn::make('CustomerReferenceNumber'),
                            TextColumn::make('CardOwnerTitle'),
                            TextColumn::make('Amount')
                        ])->modifyQueryUsing(function (Builder $query) {
                            $query->where('status', 1)->where('black_list', 0);
                        })
                        ->filters([
                            Filter::make('created_at')
                            ->form([
                                DatePicker::make('created_from'),
                                DatePicker::make('created_until'),
                            ])
                            ->query(function (Builder $query, array $data): Builder {
                                return $query
                                ->when(
                                        $data['created_from'],
                                        fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                                )
                                ->when(
                                        $data['created_until'],
                                        fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                                );
                            })
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
            'index' => Pages\ListApprovedCards::route('/'),
            'create' => Pages\CreateApprovedCard::route('/create'),
            'edit' => Pages\EditApprovedCard::route('/{record}/edit'),
        ];
    }
}

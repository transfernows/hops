<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyListResource\Pages;
use App\Filament\Resources\CompanyListResource\RelationManagers;
use App\Models\CompanyListModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class CompanyListResource extends Resource
{
    protected static ?string $model = CompanyListModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
        protected static ?string $navigationLabel = 'Gruplar';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Grup';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('company_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 TextColum::make('company_name'),
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
            'index' => Pages\ListCompanyLists::route('/'),
            'create' => Pages\CreateCompanyList::route('/create'),
            'edit' => Pages\EditCompanyList::route('/{record}/edit'),
        ];
    }
}

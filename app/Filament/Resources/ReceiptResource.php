<?php

namespace App\Filament\Resources;

use App\Enums\ReceiptStatus;
use App\Filament\Resources\ReceiptResource\Pages;
use App\Filament\Resources\ReceiptResource\RelationManagers;
use App\Models\Receipt;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReceiptResource extends Resource
{
    protected static ?string $model = Receipt::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                TextInput::make('second_name'),
                TextInput::make('last_name'),
                Select::make('status')
                    ->options(ReceiptStatus::toSelectList()),
                Textarea::make('comment'),
                Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required(),
                TextInput::make('amount')
                    ->integer()
                    ->minValue(1)
                    ->maxValue(100),
                TextInput::make('price')
                    ->disabled()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->defaultSort(fn($query) => $query->select('*')->withFullName()->withTotalPrice())
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('fullname'),
                TextColumn::make('product.name')->label('Product'),
                BadgeColumn::make('status')->formatStateUsing(function ($state = null) {
                    return ReceiptStatus::from($state)->labelAttribute();
                })->colors([
                    'danger' => ReceiptStatus::New->value,
                    'success' => ReceiptStatus::Done->value
                ]),
                TextColumn::make('amount'),
                TextColumn::make('total_price'),
                TextColumn::make('comment'),
                TextColumn::make('created_at'),
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
            'index' => Pages\ListReceipts::route('/'),
            'create' => Pages\CreateReceipt::route('/create'),
            'edit' => Pages\EditReceipt::route('/{record}/edit'),
        ];
    }
}

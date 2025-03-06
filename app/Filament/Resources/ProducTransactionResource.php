<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Shoe;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\ProducTransaction;
use Filament\Forms\Components\Grid;
use Illuminate\Database\Eloquent\Builder;   
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductTransactionResource\Pages;
use App\Filament\Resources\ProductTransactionResource\RelationManagers;

class ProducTransactionResource extends Resource
{
    protected static ?string $model = ProducTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Wizard::make([

                    Forms\Components\Wizard\Step::make('Product and Price')
                    ->schema([

                        Grid::make(2)
                        ->schema([
                            Forms\Components\Select::make('shoe_id')
                            ->relationship('shoe','name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function($state, callable $get, callable $set){

                                $shoe = Shoe::find($state);
                                $price = $shoe ? $shoe->price : 0;
                                $quantity = $get('quantity') ?? 1;
                                $subTotalAmount = $price * $quantity;

                                $set = ('price'. $price);
                                $set('sub_total_amount', $subTotalAmount);

                                $discount = $get ('discount_amount') ?? 0;
                                //$grandTotalAmount = $subTotalAmount - $discount;
                            })
                        ])

                    ])

                ])
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
            'index' => Pages\ListProducTransactions::route('/'),
            'create' => Pages\CreateProducTransaction::route('/create'),
            'edit' => Pages\EditProducTransaction::route('/{record}/edit'),
        ];
    }
}

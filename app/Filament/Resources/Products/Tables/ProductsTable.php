<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('اسم المنتج')
                    ->searchable(),
                TextColumn::make('slug')->label('الرابط اللطيف')
                    ->searchable(),
                ImageColumn::make('main_image')->label('الصورة الرئيسية'),
                IconColumn::make('featured')->label('مميز')
                    ->boolean(),
                IconColumn::make('active')->label('مفعل')
                    ->boolean(),
                TextColumn::make('sort_order')->label('الترتيب')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label('تاريخ التعديل')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

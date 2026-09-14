<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('slug')->label('الرابط')
                    ->searchable(),
                TextColumn::make('icon')->label('الأيقونة')
                    ->searchable(),
                ImageColumn::make('main_image')->label('الصورة'),
                IconColumn::make('is_featured')->label('مميز')
                    ->boolean(),
                IconColumn::make('is_active')->label('مفعل')
                    ->boolean(),
                TextColumn::make('sort_order')->label('الترتيب')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('image_path'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('og_image')->label('الصورة'),
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

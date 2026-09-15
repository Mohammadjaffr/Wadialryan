<?php

namespace App\Filament\Resources\Industries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class IndustriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('الاسم')
                    ->state(fn ($record) => $record->getTranslation('name', 'ar', useFallbackLocale: true))
                    ->searchable(query: fn ($query, string $search) => $query->where('name->ar', 'like', "%{$search}%")->orWhere('name->en', 'like', "%{$search}%")),
                TextColumn::make('slug')->label('الرابط')
                    ->searchable(),
                ImageColumn::make('image')->label('الصورة'),
                TextColumn::make('icon')->label('الأيقونة')
                    ->searchable(),
                IconColumn::make('featured')->label('مميز')
                    ->boolean(),
                IconColumn::make('active')->label('مفعل')
                    ->boolean(),
                TextColumn::make('sort_order')->label('الترتيب')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('og_image')->label('الصورة'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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

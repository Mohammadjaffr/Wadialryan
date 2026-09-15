<?php

namespace App\Filament\Resources\Careers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CareersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('العنوان')
                    ->state(fn ($record) => $record->getTranslation('title', 'ar', useFallbackLocale: true))
                    ->searchable(query: fn ($query, string $search) => $query->where('title->ar', 'like', "%{$search}%")->orWhere('title->en', 'like', "%{$search}%")),
                TextColumn::make('department')->label('القسم')
                    ->searchable(),
                TextColumn::make('location')->label('الموقع')
                    ->state(fn ($record) => $record->getTranslation('location', 'ar', useFallbackLocale: true))
                    ->searchable(query: fn ($query, string $search) => $query->where('location->ar', 'like', "%{$search}%")->orWhere('location->en', 'like', "%{$search}%")),
                TextColumn::make('employment_type')->label('النوع')
                    ->searchable(),
                TextColumn::make('closing_date')->label('تاريخ الإغلاق')
                    ->date()
                    ->sortable(),
                IconColumn::make('active')->label('مفعل')
                    ->boolean(),
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

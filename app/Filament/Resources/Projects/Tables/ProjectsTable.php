<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('العنوان')
                    ->state(fn ($record) => $record->getTranslation('title', 'ar', useFallbackLocale: true))
                    ->searchable(query: fn ($query, string $search) => $query->where('title->ar', 'like', "%{$search}%")->orWhere('title->en', 'like', "%{$search}%")),
                TextColumn::make('slug')->label('الرابط')
                    ->searchable(),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('project_status')->label('الحالة')
                    ->searchable(),
                TextColumn::make('start_date')->label('تاريخ البدء')
                    ->date()
                    ->sortable(),
                TextColumn::make('completion_date')->label('تاريخ الانتهاء')
                    ->date()
                    ->sortable(),
                ImageColumn::make('main_image')->label('الصورة'),
                IconColumn::make('is_featured')->label('مميز')
                    ->boolean(),
                IconColumn::make('is_active')->label('مفعل')
                    ->boolean(),
                TextColumn::make('sort_order')->label('الترتيب')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('client_id')->label('العميل')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('industry_id')->label('القطاع')
                    ->numeric()
                    ->sortable(),
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

<?php

namespace App\Filament\Resources\Certifications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CertificationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('issuer')->label('جهة الإصدار')
                    ->searchable(),
                TextColumn::make('certificate_number')->label('رقم الشهادة')
                    ->searchable(),
                TextColumn::make('issue_date')->label('تاريخ الإصدار')
                    ->date()
                    ->sortable(),
                TextColumn::make('expiry_date')->label('تاريخ الانتهاء')
                    ->date()
                    ->sortable(),
                ImageColumn::make('image')->label('الصورة'),
                TextColumn::make('pdf')->label('ملف PDF')
                    ->searchable(),
                IconColumn::make('active')->label('مفعل')
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

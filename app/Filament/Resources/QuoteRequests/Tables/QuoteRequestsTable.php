<?php

namespace App\Filament\Resources\QuoteRequests\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class QuoteRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('الاسم')
                    ->searchable(),
                TextColumn::make('company')->label('الشركة')
                    ->searchable(),
                TextColumn::make('email')->label('البريد الإلكتروني')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('phone')->label('رقم الهاتف')
                    ->searchable(),
                TextColumn::make('location')->label('الموقع')
                    ->searchable(),
                TextColumn::make('requested_service')->label('الخدمة المطلوبة')
                    ->searchable(),
                TextColumn::make('project_location')->label('الموقع')
                    ->searchable(),
                TextColumn::make('estimated_timeline')->label('المدة المتوقعة')
                    ->searchable(),
                TextColumn::make('attachment')->label('المرفقات')
                    ->searchable(),
                TextColumn::make('status')->label('الحالة')
                    ->searchable(),
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

<?php

namespace App\Filament\Resources\JobApplications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class JobApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('career.title')->label('الوظيفة')
                    ->sortable(),
                TextColumn::make('name')->label('الاسم')
                    ->searchable(),
                TextColumn::make('email')->label('البريد الإلكتروني')
                    ->searchable(),
                TextColumn::make('phone')->label('رقم الهاتف')
                    ->searchable(),
                TextColumn::make('cv_path')->label('السيرة الذاتية')
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

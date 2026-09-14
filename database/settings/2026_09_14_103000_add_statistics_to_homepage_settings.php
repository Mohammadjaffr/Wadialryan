<?php

use App\Settings\HomepageSettings;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add(
            HomepageSettings::group() . '.statistics',
            []
        );
    }
};
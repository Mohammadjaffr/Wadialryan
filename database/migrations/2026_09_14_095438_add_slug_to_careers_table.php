<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('careers', function (Blueprint $table) {
            if (!Schema::hasColumn('careers', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('id');
            }
        });
        
        // Generate slugs for existing careers
        $careers = \App\Models\Career::all();
        foreach ($careers as $career) {
            $career->slug = Str::slug($career->getTranslation('title', 'en', false) ?: 'career-' . $career->id);
            $career->save();
        }
    }

    public function down(): void
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};

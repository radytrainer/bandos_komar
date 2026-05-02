<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('title_km')->nullable()->after('title');
            $table->longText('content_km')->nullable()->after('content');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->string('title_km')->nullable()->after('title');
            $table->text('content_km')->nullable()->after('content');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('name_km')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['title_km', 'content_km']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['title_km', 'content_km']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['name_km']);
        });
    }
};

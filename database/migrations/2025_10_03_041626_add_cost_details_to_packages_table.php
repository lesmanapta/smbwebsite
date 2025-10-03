<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->longText('cost_includes')->nullable()->after('description');
            $table->longText('cost_excludes')->nullable()->after('cost_includes');
            $table->longText('notes')->nullable()->after('cost_excludes');
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['cost_includes', 'cost_excludes', 'notes']);
        });
    }
};
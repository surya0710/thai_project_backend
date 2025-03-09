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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('is_deleted')->default(0)->comment('0 = No, 1 = Yes');
            $table->tinyInteger('is_blocked')->default(0)->comment('0 = No, 1 = Yes');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->foreignId('blocked_by')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

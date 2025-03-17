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
        Schema::table('set_lucky_draw', function (Blueprint $table) {
            $table->tinyInteger('recharge_status')->default(0)->comment('0 = Pending, 1 = Approved, 2 = Rejected');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('set_lucky_draw', function (Blueprint $table) {
            //
        });
    }
};

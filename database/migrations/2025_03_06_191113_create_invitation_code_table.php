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
        Schema::create('invitation_code', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->notNull();
            $table->tinyInteger('status')->default(1)->comment('0 = Inactive, 1 = Active');
            $table->tinyInteger('count')->default(0)->max(1);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_code');
    }
};

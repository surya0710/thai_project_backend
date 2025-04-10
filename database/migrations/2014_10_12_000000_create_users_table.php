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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('transaction_password')->nullable();
            $table->string('user_type')->comment('Boss, Manager, Worker, Customer');
            $table->tinyInteger('status')->default(0)->comment('0 = Inactive, 1 = Active');
            $table->string('country')->nullable();
            $table->string('invitation_code')->nullable();
            $table->string('badge')->nullable()->default('VIP0');
            $table->decimal('revenue_generated', 10, 2)->default(0.00);
            $table->decimal('frozen_amount', 10, 2)->default(0.00);
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->tinyInteger('credit_permission')->default(1)->comment('0 = No, 1 = Yes');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

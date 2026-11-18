<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tfa7_customers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->timestamps();
        });

        Schema::create('tfa7_users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tfa7_users');
        Schema::dropIfExists('tfa7_customers');
    }
};

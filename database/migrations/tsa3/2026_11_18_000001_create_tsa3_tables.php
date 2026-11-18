<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'tsa3';

    public function up(): void
    {
        Schema::connection('tsa3')->create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status')->default('pending');
            $table->date('task_date')->index();
            $table->timestamps();
        });

        Schema::connection('tsa3')->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('full_name');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('tsa3')->dropIfExists('users');
        Schema::connection('tsa3')->dropIfExists('tasks');
    }
};

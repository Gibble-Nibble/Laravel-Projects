<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'tsa4';

    public function up(): void
    {
        Schema::connection('tsa4')->create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status')->default('pending');
            $table->date('task_date')->index();
            $table->boolean('is_archived')->default(false)->index();
            $table->timestamps();
        });

        Schema::connection('tsa4')->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('tsa4')->dropIfExists('users');
        Schema::connection('tsa4')->dropIfExists('tasks');
    }
};

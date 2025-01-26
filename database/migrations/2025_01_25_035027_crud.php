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
            $table->increments('user_id');
            $table->string('email')->unique();
            $table->text('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('whatsapp');
            $table->integer('role');
            $table->timestamps();
        });

        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('schedule_id');
            $table->string('from');
            $table->string('to');
            $table->time('departure_time');
            $table->integer('ticket_price');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('order_code');
            $table->integer('user_id');
            $table->integer('schedule_id');
            $table->date('order_date');
            $table->time('order_time');
            $table->enum('order_status',['waiting','unpaid','paid','onRoad','done']);
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('schedule');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('sessions');
    }
};

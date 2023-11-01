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
        Schema::create('loggy', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('ip_address')->nullable();
            $table->string('action')->nullable();
            $table->text('action_detail')->nullable();
            $table->boolean('status')->nullable();
            $table->string('device')->nullable();
            $table->text('browser_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loggy');
    }
};

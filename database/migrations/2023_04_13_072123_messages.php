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
        Schema::dropIfExists('messages');

        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('message_id');
            $table->string('message')->nullable();
            $table->string('sender');
            $table->timestamps();
        }, 'if not exists');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};

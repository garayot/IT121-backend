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
        Schema::dropIfExists('prompts');

        Schema::create('prompts', function (Blueprint $table) {
            $table->bigIncrements('prompt_id');
            $table->string('tools_type')->nullable();
            $table->string('text');
            $table->string('result');
            $table->timestamps();
        }, 'if not exists');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prompts');
    }
};

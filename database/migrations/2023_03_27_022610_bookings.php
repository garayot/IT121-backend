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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('bookings_id');
            $table->string('booking_name');
            $table->string('booking_description')->nullable();
            $table->timestamps();
        });   
        Schema::table('bookings', function (Blueprint $table) {
            // Check if the column exists before adding it
            
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
            
        }); 
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

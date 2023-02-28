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
        Schema::create('trainingen', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->date('datum');
            $table->time('starttijd');
            $table->time('eindtijd');
            $table->string('locatie');
            $table->text('trainers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainingen');
    }
};

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
        Schema::create('training_session', function (Blueprint $table) {
            $table->increments('Id');
            $table->date('Date');
            $table->time('StartTime');
            $table->time('EndTime');
            $table->string('Description')->nullable();
            $table->unsignedBigInteger('GroupNumber');
            $table->boolean('IstrainingSession');
            $table->foreign('GroupNumber')->references('GroupNumber')->on('training_session_group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_session');
    }
};

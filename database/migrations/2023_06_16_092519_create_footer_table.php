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
        Schema::create('footer', function (Blueprint $table) {
            $table->id();
            $table->string('secretariaat');
            $table->string('rekeningnummer');
            $table->Integer('KvKnr');
            $table->Integer('RSIN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer');
    }
};

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
        Schema::create('spectacles', function (Blueprint $table) {
            $table->id();
            $table->date('datespectacle');
            $table->unsignedBigInteger('pieceID');

            $table->foreign('pieceID')
                ->references('id')
                ->on('pieces')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedBigInteger('salleID');

            $table->foreign('salleID')
                ->references('id')
                ->on('salles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spectacles');
    }
};

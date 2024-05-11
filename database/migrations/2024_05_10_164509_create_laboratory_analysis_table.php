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
        Schema::create('laboratory_analysis', function (Blueprint $table) {
            $table->id(); 

            $table->unsignedBigInteger('laboratory_id');
            $table->foreign('laboratory_id')->references('id')->on('laboratories')->onDelete('cascade');
        
            $table->unsignedBigInteger('analyse_id');
            $table->foreign('analyse_id')->references('id')->on('analyses')->onDelete('cascade');
        
            // Ajoutez d'autres colonnes si nécessaire
            // Par exemple, vous pouvez ajouter des colonnes spécifiques à la relation


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratory_analysis');
    }
};

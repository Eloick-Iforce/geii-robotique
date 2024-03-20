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
        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign(['competition_id']); // Supprimez d'abord la contrainte de clé étrangère existante
            $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade'); // Ensuite, ajoutez la nouvelle contrainte avec onDelete('cascade')
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};

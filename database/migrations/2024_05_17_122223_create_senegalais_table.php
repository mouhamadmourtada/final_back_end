<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('senegalais', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
			$table->string('prenom');
			$table->string('adresse');
			$table->date('date_naissance');
			$table->string('lieu_naissance');
			$table->string('cin')->unique();
			$table->string('telephone')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('senegalais');
    }
};
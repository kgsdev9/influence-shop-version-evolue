<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'entreprise
            $table->text('description')->nullable();; // Description de l'entreprise
            $table->string('address'); // Adresse de l'entreprise
            $table->string('email'); // Email de l'entreprise
            $table->string('phone'); // Téléphone de l'entreprise
            $table->string('website')->nullable(); // Site web de l'entreprise (optionnel)
            $table->string('logo')->nullable(); // Logo de l'entreprise (optionnel)
            $table->unsignedBigInteger('country_id'); // Référence vers le pays
            $table->unsignedBigInteger('city_id'); // Référence vers la ville
            $table->string('type_entreprise')->nullable();; // Type d'entreprise
            $table->decimal('capital', 15, 2)->nullable(); // Capital de l'entreprise
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}

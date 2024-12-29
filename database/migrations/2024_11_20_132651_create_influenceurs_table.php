<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfluenceursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('influenceurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('codeprive')->nullable();
            $table->string('codeinfluenceur')->unique(); 
            $table->string('whattssap')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('adresse')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->json('languages')->nullable(); // Pour stocker plusieurs langues
            $table->decimal('average_rate', 8, 2)->nullable(); // Taux moyen avec deux décimales
            $table->text('bio')->nullable();
            $table->string('profile_picture')->nullable(); // URL ou chemin de l'image
            $table->boolean('availability')->default(true); // Disponibilité par défaut à true
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
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
        Schema::dropIfExists('influenceurs');
    }
}

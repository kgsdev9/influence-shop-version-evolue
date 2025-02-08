<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom du produit
            $table->string('poids'); // poids produit
            $table->text('description');
            $table->string('codeproduct')->unique();
            $table->decimal('price_achat', 15, 2); // Prix d'achat
            $table->decimal('price_vente', 15, 2); // Prix de vente
            $table->unsignedBigInteger('user_id')->nullable(); // Référence de l'entreprise
            $table->unsignedBigInteger('taille_id')->nullable(); // Référence de l'entreprise
            $table->unsignedBigInteger('couleur_id')->nullable(); // Référence de l'entreprise
            $table->text('shortdescription')->nullable(); // Courte description
            $table->unsignedBigInteger('category_id'); // Catégorie du produit
            $table->integer('qtedisponible')->default(0); // Quantité disponible
            $table->string('status')->default('active'); // Statut du produit (ex. : "active", "inactive")
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('taille_id')->references('id')->on('tailles')->onDelete('cascade');
            $table->foreign('couleur_id')->references('id')->on('couleurs')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}

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
            $table->text('description')->nullable(); // Description longue
            $table->decimal('price_achat', 15, 2); // Prix d'achat
            $table->decimal('price_vente', 15, 2); // Prix de vente
            $table->unsignedBigInteger('entreprise_id')->nullable(); // Référence de l'entreprise
            $table->unsignedBigInteger('influenceur_id')->nullable(); // Référence de l'influenceur, optionnelle
            $table->string('shortdescription')->nullable(); // Courte description
            $table->unsignedBigInteger('category_id'); // Catégorie du produit
            $table->integer('qtedisponible')->default(0); // Quantité disponible
            $table->string('status')->default('active'); // Statut du produit (ex. : "active", "inactive")
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
            $table->foreign('influenceur_id')->references('id')->on('influenceurs')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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

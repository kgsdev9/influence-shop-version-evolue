<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerateLienPayementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_lien_payements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('influenceur_id'); // Référence de l'influenceur
            $table->unsignedBigInteger('compagne_id'); // Référence de la campagne
            $table->unsignedBigInteger('entreprise_id'); // Référence de l'entreprise
            $table->string('paymentlink'); // Lien de paiement
            $table->date('date_expiration')->nullable(); // Date d'expiration
            $table->integer('minute_expiration')->nullable(); // Minutes avant expiration
            $table->unsignedBigInteger('product_id'); // Référence du produit
            $table->foreign('influenceur_id')->references('id')->on('influenceurs')->onDelete('cascade');
            $table->foreign('compagne_id')->references('id')->on('compagnes')->onDelete('cascade');
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('generate_lien_payements');
    }
}

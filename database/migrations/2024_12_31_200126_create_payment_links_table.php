<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_links', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre du lien de paiement
            $table->decimal('amount', 10, 2); // Montant du paiement
            $table->string('currency', 3); // Devise, par exemple 'USD', 'EUR'
            $table->enum('status', ['active', 'paid', 'expired']); // Statut du lien
            $table->timestamp('expiration_date')->nullable(); // Date d'expiration du lien
            $table->unsignedBigInteger('user_id'); // ID de l'utilisateur créateur du lien
            $table->string('payment_method')->nullable(); // Méthode de paiement (facultatif)
            $table->text('description')->nullable(); // Description (facultatif)
            $table->string('link'); // Le lien de paiement généré
            $table->timestamps(); // Horodatage
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_links');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('codeinfluenceur')->nullable();
            $table->unsignedBigInteger('entreprise_id');
            $table->integer('qtecmde')->default(1);
            $table->unsignedBigInteger('influenceur_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('compagne_id')->nullable();
            $table->unsignedBigInteger('pricedeliverybycountry_id')->nullable();
            $table->decimal('montantht', 15, 2); // Montant HT
            $table->decimal('montanttva', 15, 2); // Montant TVA
            $table->decimal('montanttc', 15, 2); // Montant TTC
            $table->decimal('cost_delivery', 15, 2); // Prix de la livraison
            $table->string('status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->enum('statusdelivery', ['encours', 'livree', 'echec'])->default('encours');
            $table->text('shipping_address')->nullable();
            $table->unsignedBigInteger('paymentaresse_id')->nullable();
            $table->timestamp('delivery_time')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
            $table->foreign('compagne_id')->references('id')->on('compagnes')->onDelete('cascade');
            $table->foreign('influenceur_id')->references('id')->on('influenceurs')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('paymentaresse_id')->references('id')->on('payment_adresses')->onDelete('set null');
            $table->foreign('pricedeliverybycountry_id')->references('id')->on('price_delivery_by_countries')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}

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
            $table->unsignedBigInteger('paymentaresse_id');
            $table->string('codeparainage')->nullable();
            $table->integer('qtecmde')->default(1);
            $table->decimal('montantht', 15, 2);
            $table->decimal('montanttva', 15, 2)->nullable();
            $table->decimal('montanttc', 15, 2);
            $table->decimal('poidscmde', 15, 2);
            $table->decimal('montantpoidscmde', 15, 2);
            $table->decimal('montantlivraison', 15, 2)->nullable();;
            $table->string('status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paymentaresse_id')->references('id')->on('payment_adresses')->onDelete('cascade');
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

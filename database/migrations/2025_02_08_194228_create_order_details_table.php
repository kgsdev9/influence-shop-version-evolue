<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->string('taile')->nullable();
            $table->string('couleur')->nullable();
            $table->string('prixunitaire');
            $table->integer('qunatite');
            $table->string('poidsarticle')->nullable();
            $table->string('montantpoidsarticle')->nullable();;
            $table->decimal('montantht', 15, 2);
            $table->decimal('montanttva', 15, 2);
            $table->decimal('montanttc', 15, 2);
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('order_details');
    }
}

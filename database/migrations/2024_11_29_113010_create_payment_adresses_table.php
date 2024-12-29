<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_adresses', function (Blueprint $table) {
            $table->id();
            $table->string('telephone');
            $table->string('email');
            $table->text('adresse');
            $table->string('city')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_default')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('payment_adresses');
    }
}

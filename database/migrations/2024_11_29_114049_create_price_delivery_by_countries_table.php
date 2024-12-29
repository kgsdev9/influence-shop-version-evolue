<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceDeliveryByCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_delivery_by_countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_start');
            $table->string('country_destination');
            $table->string('type_delivery');
            $table->decimal('prix', 10, 2);
            $table->string('delaidelivery');
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
        Schema::dropIfExists('price_delivery_by_countries');
    }
}

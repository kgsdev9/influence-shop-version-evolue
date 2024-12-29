<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfomanceCompagnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfomance_compagnes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campagne_id'); // Référence de la campagne
            $table->bigInteger('impressions')->default(0); // Nombre d'impressions
            $table->bigInteger('clicks')->default(0); // Nombre de clics
            $table->bigInteger('conversions')->default(0); // Nombre de conversions
            $table->decimal('click_through_rate', 5, 2)->default(0.00); // Taux de clics (%)
            $table->decimal('cost_per_click', 15, 2)->default(0.00); // Coût par clic
            $table->decimal('cost_per_acquisition', 15, 2)->default(0.00); // Coût par acquisition
            $table->decimal('revenue_generated', 15, 2)->default(0.00); // Revenus générés
            $table->timestamp('measured_at')->nullable(); // Date et heure de la mesure
            $table->foreign('campagne_id')->references('id')->on('compagnes')->onDelete('cascade');
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
        Schema::dropIfExists('perfomance_compagnes');
    }
}

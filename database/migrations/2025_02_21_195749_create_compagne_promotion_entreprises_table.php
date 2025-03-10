<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompagnePromotionEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compagne_promotion_entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('entreprise_id')->constrained('entreprises')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->enum('status', ['en cours', 'terminée', 'annulée'])->default('en cours');
            $table->string('url_promotion')->nullable();
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
        Schema::dropIfExists('compagne_promotion_entreprises');
    }
}

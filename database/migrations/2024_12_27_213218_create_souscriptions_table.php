<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->unsignedBigInteger('user_id'); // Référence de l'entreprise
            $table->unsignedBigInteger('abonnement_id'); // Référence de l'abonnement
            $table->date('date_debut'); // Date de début de l'abonnement
            $table->date('date_fin'); // Date de fin de l'abonnement
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('abonnement_id')->references('id')->on('abonnements')->onDelete('cascade');
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
        Schema::dropIfExists('souscriptions');
    }
}

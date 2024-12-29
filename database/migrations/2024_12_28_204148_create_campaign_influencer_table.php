<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignInfluencerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_influencer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compagne_id');
            $table->unsignedBigInteger('influencer_id');
            $table->foreign('compagne_id')->references('id')->on('compagnes')->onDelete('cascade');
            $table->foreign('influencer_id')->references('id')->on('influenceurs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_influencer');
    }
}

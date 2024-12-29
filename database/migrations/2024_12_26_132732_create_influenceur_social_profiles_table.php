<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfluenceurSocialProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('influenceur_social_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('namesocialprofile');
            $table->string('link');
            $table->unsignedBigInteger('followers')->default(0);
            $table->unsignedBigInteger('influenceur_id');
            $table->foreign('influenceur_id')->references('id')->on('influenceurs')->onDelete('cascade');
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
        Schema::dropIfExists('influenceur_social_profiles');
    }
}

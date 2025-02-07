<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePubBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pub_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('organisateur')->nullable();
            $table->string('lieu')->nullable();
            $table->string('codeblog')->unique();
            $table->text('mini_description');
            $table->text('description');
            $table->date('date_event_debut')->nullable();
            $table->date('date_event_fin')->nullable();
            $table->integer('price')->nullable();
            $table->string('temps_lecture')->nullable();
            $table->boolean('publish_at')->default(0);
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
        Schema::dropIfExists('pub_blogs');
    }
}

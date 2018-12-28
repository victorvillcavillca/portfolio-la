<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_score', function (Blueprint $table) {
            $table->integer('campori_club_id')->unsigned()->nullable();
            $table->foreign('campori_club_id')->references('id')->on('campori_clubs')->onDelete('cascade');
            $table->integer('requirement_id')->unsigned()->nullable();
            $table->foreign('requirement_id')->references('id')->on('requirements')->onDelete('cascade');
            $table->double('score_reached', 8, 2)->default(0);
            $table->string('observations')->nullable();

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedInteger('user_id_edited')->nullable();
            $table->foreign('user_id_edited')->references('id')->on('users')->onDelete('set null');

            $table->integer('requirement_area_id')->unsigned()->nullable();

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
        Schema::dropIfExists('detail_score');
    }
}

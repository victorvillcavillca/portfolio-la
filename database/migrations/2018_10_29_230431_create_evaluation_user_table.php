<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluation_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('answer',128);

            //relation
            $table->foreign('evaluation_id')->references('id')->on('evaluations')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('evaluation_user');
    }
}

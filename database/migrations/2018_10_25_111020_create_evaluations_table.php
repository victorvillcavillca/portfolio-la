<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->mediumText('description')->nullable();
            $table->integer('time')->unsigned();

            $table->boolean('status')->default(false);
            $table->dateTime('end_date');
            $table->tinyInteger('total_question')->default(10);
            $table->tinyInteger('score')->default(0);

            $table->integer('user_id')->unsigned();
            $table->integer('evaluation_category_id')->unsigned();
            //relation
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('evaluation_category_id')->references('id')->on('evaluation_categories')
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
        Schema::dropIfExists('evaluations');
    }
}

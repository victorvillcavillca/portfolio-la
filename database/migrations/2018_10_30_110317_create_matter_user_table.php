<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matter_user', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('evaluation_category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('approved')->default(false);
            $table->boolean('accepted')->default(false);
            $table->tinyInteger('final_score')->default(0);
            $table->dateTime('evaluation_date')->default(NULL);

            //relation
            $table->foreign('evaluation_category_id')->references('id')->on('evaluation_categories')
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
        Schema::dropIfExists('matter_user');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 128);
            $table->string('slug', 128)->unique();

            $table->mediumText('description')->nullable();
            $table->boolean('status')->default(false);

            $table->integer('user_id')->unsigned();
            $table->integer('user_id_edit')->unsigned()->nullable();
            $table->integer('management_id')->unsigned();

            //relation
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('management_id')->references('id')->on('managements')
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
        Schema::dropIfExists('matters');
    }
}

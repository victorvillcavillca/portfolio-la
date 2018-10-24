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
            // $table->string('slug', 256)->unique();
            $table->string('slug')->unique();
            $table->mediumText('description')->nullable();

            // $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT');
            $table->boolean('status')->default(false);

            $table->integer('user_id')->unsigned();
            $table->integer('specialty_id')->unsigned();
            //relation
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('specialty_id')->references('id')->on('specialties')
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 128);
            $table->string('slug', 128)->unique();
            $table->integer('order');
            $table->string('filename', 128)->nullable();
            $table->string('file', 128)->nullable();
            $table->string('imagename', 128)->nullable();

            $table->mediumText('description')->nullable();
            $table->text('body')->nullable();
            $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT');
            
            $table->integer('user_id')->unsigned();
            $table->integer('resource_category_id')->unsigned();
            //relation
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('resource_category_id')->references('id')->on('resource_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();        
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}

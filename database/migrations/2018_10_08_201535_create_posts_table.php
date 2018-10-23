<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 128);
            $table->string('slug', 128)->unique();

            $table->mediumText('excerpt')->nullable();
            $table->text('body');
            $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT');

            $table->string('file', 128)->nullable();

            // System blog
            $table->integer('view_count')->default(0);
            // $table->boolean('status')->default(false);
            $table->boolean('is_approved')->default(false);

            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            //relation
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::dropIfExists('posts');
    }
}

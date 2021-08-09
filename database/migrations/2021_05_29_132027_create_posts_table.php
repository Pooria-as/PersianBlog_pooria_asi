<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer("user_id");
            $table->integer("category_id");
            $table->string("title")->unique();
            $table->string("slug")->unique();
            $table->text("description");
            $table->text("image");
            $table->text("content");
            $table->integer("view")->default(0);
            $table->integer("like")->default(0);
            $table->integer("Disslike")->default(0);
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

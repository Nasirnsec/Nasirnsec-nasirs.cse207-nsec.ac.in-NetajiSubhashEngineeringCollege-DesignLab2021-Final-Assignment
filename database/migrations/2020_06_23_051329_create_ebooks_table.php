<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ebookcategory_id');
            $table->foreign('ebookcategory_id')->references('id')->on('ebook_categories');
            $table->String('title');
            $table->String('author');
            $table->Integer('pages');
            $table->String('published_on');
            $table->longText('description');
            $table->String('uploaded_by');
            $table->String('picture');
            $table->String('ebook');
            $table->String('status');
            $table->String('like');
            $table->String('dislike');
            $table->softdeletes();
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
        Schema::dropIfExists('ebooks');
    }
}

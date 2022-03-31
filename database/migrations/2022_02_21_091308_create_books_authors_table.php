<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_authors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->integer('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->softDeletes(); // add
            $table->timestamps();

            // $table->unsignedBigInteger('book_id')->nullable();
            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            // $table->unsignedBigInteger('author_id')->nullable();
            // $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_authors');
    }
}

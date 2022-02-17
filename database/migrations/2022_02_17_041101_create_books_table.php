<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('isbn');
            $table->string('category_id');
            $table->string('parent_id');
            $table->string('publisher_id');
            $table->string('condition');
            $table->string('content');
            $table->string('description');
            $table->integer('num_pages');
            $table->integer('quantity');
            $table->integer('edition');
            $table->float('price');
            $table->timestamp('date_published')->nullable();
            $table->string('created_by');
            $table->string('modified_by');
            
            $table->timestamps();
            $table->softDeletes(); // add
            /*
            id: char(36), primary_key,
            title: varchar(100),
            isbn: varchar(13),
            category_id: char(36),
            parent_id: char(36),
            publisher_id: char(36),
            date_published: date,
            num_pages: int,
            quantity: int,
            condition: varchar(2),
            edition: int,
            price: float,
            content: text(),
            description: text(),
            created_by: varchar(36),
            modified_by: varchar(36),
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

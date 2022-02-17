<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('description');
            $table->string('created_by');
            $table->string('modified_by');
            $table->timestamps();
            $table->softDeletes(); // add
            /*
            id: char(36),
            deleted: boolean,
            name: varchar(50),
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
        Schema::dropIfExists('categories');
    }
}

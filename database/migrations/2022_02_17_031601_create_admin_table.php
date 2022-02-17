<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('full_name');
            $table->string('role_id');
            $table->string('created_by');
            $table->string('modified_by');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); // add
            /*
            id: char(36),
            deleted: boolean,
            name: varchar(50),
            email: varchar(50),
            role_id: varchar(250);
            birthday: date(),
            password: varchar(36),
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
        Schema::dropIfExists('admin');
    }
}

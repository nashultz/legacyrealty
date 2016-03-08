<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('office_id');
            $table->integer('title_id');
            $table->integer('specialty_id');
            $table->string('name');
            $table->string('email');
            $table->tinyInteger('protected');
            $table->timestamps();
            $table->string('phone');
            $table->string('cell');
            $table->string('fax');
            $table->tinyInteger('published');
            $table->text('bio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}

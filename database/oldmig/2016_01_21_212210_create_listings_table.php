<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('publish')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('status_id')->default(0);
            $table->string('slug');
            $table->string('title');
            $table->text('summary');
            $table->text('description');
            $table->string('address');
            $table->integer('city_id');
            $table->integer('county_id');
            $table->integer('state_id');
            $table->integer('zipcode');
            $table->integer('type_id');
            $table->integer('subtype_id');
            $table->decimal('price',10,2);
            $table->string('mlsno')->nullable();
            $table->integer('yearbuilt')->nullable();
            $table->string('googlemap')->nullable();
            $table->integer('viewcount')->default(0);
            $table->string('video')->nullable();
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
        Schema::drop('listings');
    }
}

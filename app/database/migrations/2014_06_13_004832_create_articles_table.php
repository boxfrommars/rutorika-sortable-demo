<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('articles', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('position')->default(1);

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
        Schema::table('articles', function(Blueprint $table)
        {
            $table->drop();
        });
	}

}

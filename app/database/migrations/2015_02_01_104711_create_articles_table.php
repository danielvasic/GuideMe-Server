<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function($table)
		{
			$table->bigIncrements('id');
			$table->string('title', 255);
			$table->string('description', 255)->nullable();
			$table->text('content')->nullable();

			$table->bigInteger('place_id')->unsigned()->nullable();
			$table->foreign('place_id')->references('id')->on('places');

			$table->bigInteger('created_by')->unsigned();
			$table->foreign('created_by')->references('id')->on('users');

			$table->bigInteger('updated_by')->unsigned();
			$table->foreign('updated_by')->references('id')->on('users');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}

}

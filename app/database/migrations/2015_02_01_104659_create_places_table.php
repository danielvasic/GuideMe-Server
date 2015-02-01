<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration {

	public function up()
	{
		Schema::create('places', function($table)
		{
			$table->bigIncrements('id');
			$table->string('name', 255);
			$table->string('description', 255)->nullable();
			$table->string('address', 255)->nullable();
			$table->string('phone', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('url', 255)->nullable();
			$table->decimal('lat', 9, 6);
			$table->decimal('lng', 9, 6);

			$table->integer('place_type_id')->unsigned();
			$table->foreign('place_type_id')->references('id')->on('place_types');

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
		Schema::drop('places');
	}

}

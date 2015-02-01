<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTypesTable extends Migration {

	public function up()
	{
		Schema::create('place_types', function($table)
		{
			$table->increments('id');
			$table->string('name', 16)->unique();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('place_types');
	}

}

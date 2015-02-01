<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->bigIncrements('id');
			$table->string('username', 16)->unique();
			$table->string('password', 255);
			$table->string('first_name', 16)->nullable();
			$table->string('last_name', 16)->nullable();
			$table->string('email', 255)->unique();
			$table->integer('group_id')->unsigned();
			$table->boolean('active')->default(1);
			$table->rememberToken();
			$table->timestamp('last_seen')->nullable();
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('group_id')->references('id')->on('groups');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {
	

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->unsignedInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
			$table->string('company_name');
			$table->string('sector');
			$table->string('industry');
			$table->string('street_address');
			$table->string('city');
			$table->string('state');
			$table->integer('zipCode');
			$table->integer('phone1');
			$table->integer('phone2');
			$table->integer('phone3');
			$table->integer('fax');
			$table->integer('fax2');
			$table->string('memo');
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
		Schema::drop('customers');
	}

}

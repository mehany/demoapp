<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the `expenses` table
		Schema::create('expenses', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->unsignedInteger('language_id');
			$table->foreign('language_id')->references('id')->on('languages');
			$table->integer('position')->nullable();
			$table->unsignedInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
			$table->unsignedInteger('user_id_edited')->nullable();
			$table->foreign('user_id_edited')->references('id')->on('users')->onDelete('set null');
			$table->unsignedInteger('expense_category_id')->nullable();
			$table->foreign('expense_category_id')->references('id')->on('expense_categories')->onDelete('set null');
			$table->unsignedInteger('expense_sub_category_id')->nullable();
			$table->foreign('expense_sub_category_id')->references('id')->on('expense_sub_categories')->onDelete('set null');
			$table->string('title');
			$table->string('slug')->nullable();
			$table->date('date_of_purchase');
			$table->text('introduction');
			$table->text('content');
			$table->string('source')->nullable();
			$table->string('picture')->nullable();
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
		Schema::drop('expenses');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaArretsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ba_arrets', function(Blueprint $table) {
			
			$table->increments('id');
			
			$table->integer('cruser_id');
			$table->integer('deleted');
			$table->string('reference');
			$table->integer('pub_date');
			$table->text('abstract');
			$table->text('pub_text');
			$table->text('file');
			$table->integer('categories');
			$table->text('analysis');						
			$table->integer('created_at');
			$table->integer('updated_at');
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ba_arrets');
	}

}

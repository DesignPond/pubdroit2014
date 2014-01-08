<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaAnalysesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ba_analyses', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('pid');
			$table->integer('cruser_id');
			$table->integer('deleted');			
			$table->string('authors');
			$table->integer('pub_date');
			$table->text('abstract');
			$table->text('pub_text');
			$table->text('file');
			$table->integer('categories');
			$table->integer('arrets');								
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
		Schema::drop('ba_analyses');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inscriptions', function(Blueprint $table) {
		
			$table->increments('id');
			
			$table->integer('event_id');
			$table->integer('user_id');
			$table->integer('price_id');
			$table->string('noInscription');
			$table->dateTime('dateInscription');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inscriptions');
	}

}
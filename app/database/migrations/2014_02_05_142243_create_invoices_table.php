<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table) {
		
			$table->increments('id');
			
			$table->integer('pid');	
			$table->integer('deleted');	
			$table->string('invoiceNumber');
			$table->string('inscriptionNumber');
			$table->enum('payementType', array('1'))->default(1);
			$table->integer('user_id');
			$table->integer('delivery_id');	
			$table->string('price');
			$table->text('comment');
			$table->dateTime('payed_at'); 
			
			$table->integer('event_id');
			$table->enum('status', array('attente','paye','gratuit'))->default('attente');
			
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
		Schema::drop('invoices');
	}

}

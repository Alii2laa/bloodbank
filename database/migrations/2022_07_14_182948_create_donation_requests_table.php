<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
            $table->id();
			$table->string('patient_name');
			$table->integer('patient_age');
			$table->string('patient_phone');
			$table->string('hospital');
			$table->text('address');
			$table->integer('bags_quantity');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->text('notes');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}

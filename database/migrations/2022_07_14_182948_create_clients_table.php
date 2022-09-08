<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('email');
			$table->date('date_of_birth');
			$table->string('phone');
			$table->date('last_donation_date');
			$table->string('password');
			$table->integer('pin_code')->nullable();
			$table->string('api_token',60)->unique()->nullable();
			$table->boolean('status')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}

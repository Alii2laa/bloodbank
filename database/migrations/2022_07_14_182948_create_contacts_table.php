<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
            $table->id();
			$table->string('subject');
			$table->text('message');
			$table->string('email');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}

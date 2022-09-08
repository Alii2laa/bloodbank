<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
            $table->id();
			$table->string('phone');
			$table->string('email');
			$table->text('about_us');
			$table->string('fb_link');
			$table->string('tw_link');
			$table->string('in_link');
			$table->string('yt_link');
			$table->text('notification_setting_message');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}

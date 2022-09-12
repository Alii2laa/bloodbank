<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->id();
			$table->text('title');
			$table->string('image');
			$table->text('content');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}

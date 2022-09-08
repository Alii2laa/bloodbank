<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->foreignId('blood_type_id')->constrained();
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->foreignId('city_id')->constrained();
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->foreignId('governorate_id')->constrained();
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreignId('category_id')->constrained();
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreignId('donation_request_id')->constrained();
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->foreignId('client_id')->nullable()->constrained();
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreignId('city_id')->constrained();
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreignId('blood_type_id')->constrained();
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreignId('client_id')->constrained();
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->foreignId('client_id')->constrained();
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->foreignId('notification_id')->constrained();
		});
		Schema::table('client_post', function(Blueprint $table) {
			$table->foreignId('client_id')->constrained();
		});
		Schema::table('client_post', function(Blueprint $table) {
			$table->foreignId('post_id')->constrained();
		});
		Schema::table('client_governorate', function(Blueprint $table) {
			$table->foreignId('client_id')->constrained();
		});
		Schema::table('client_governorate', function(Blueprint $table) {
			$table->foreignId('governorate_id')->constrained();
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->foreignId('blood_type_id')->constrained();
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->foreignId('client_id')->constrained();
		});
	}

	public function down()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_blood_type_id_foreign');
		});

		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_city_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_governorate_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_category_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_donation_request_id_foreign');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->dropForeign('contacts_client_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_city_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_blood_type_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_client_id_foreign');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->dropForeign('client_notification_client_id_foreign');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->dropForeign('client_notification_notification_id_foreign');
		});
		Schema::table('client_post', function(Blueprint $table) {
			$table->dropForeign('client_post_client_id_foreign');
		});
		Schema::table('client_post', function(Blueprint $table) {
			$table->dropForeign('client_post_post_id_foreign');
		});
		Schema::table('client_governorate', function(Blueprint $table) {
			$table->dropForeign('client_governorate_client_id_foreign');
		});
		Schema::table('client_governorate', function(Blueprint $table) {
			$table->dropForeign('client_governorate_governorate_id_foreign');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->dropForeign('blood_type_client_blood_type_id_foreign');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->dropForeign('blood_type_client_client_id_foreign');
		});
	}
}

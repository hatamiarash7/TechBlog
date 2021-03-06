<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::disableForeignKeyConstraints();
		Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id')->nullable()->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->longText('body');
			$table->integer('like')->default(0);
			$table->integer('dislike')->default(0);
			$table->string('slug');
			$table->string('thumbnail')->nullable();
			$table->tinyInteger('confirm')->default(0);
			$table->mediumText('tags')->nullable();
			$table->mediumText('tags_id')->nullable();
			$table->integer('seen')->default(0);
			$table->string('source')->nullable();
			$table->string('create_date');
			$table->timestamps();
			$table->foreign('category_id')
				->references('id')
				->on('categories')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::enableForeignKeyConstraints();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('posts');
	}
}

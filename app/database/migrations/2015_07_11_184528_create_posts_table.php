<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('posts', function($table)
            {
                  $table->increments('id');
                  $table->integer('user_id');            
                  $table->string('title');
                  
                  $table->text('content');

                  $table->string('created_at');
                  $table->string('updated_at');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('posts');		
	}

}

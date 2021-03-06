<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('comments', function($table)
            {
                  $table->increments('id');
                  $table->integer('user_id');            
                  $table->integer('post_id');            
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
        Schema::drop('comments');
	}

}

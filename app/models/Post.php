<?php

class Post extends Eloquent {

	/* Alowing Eloquent to insert data into our database */
	protected $fillable = array('user_id', 'title', 'content');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

}

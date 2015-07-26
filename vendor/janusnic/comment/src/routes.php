<?php

Route::post(
	Config::get('comment::routes.base_uri'),
	array(
		'before' => array(
			'csrf',
			'auth',
		),
		'uses' => 'Servise\Comments\CommentsController@create',
	)
);
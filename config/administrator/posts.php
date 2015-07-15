<?php

/**
 * Directors model config
 */

return array(

	'title' => 'Posts',

	'single' => 'post',

	'model' => '\App\Post',

	/**
	 * The display columns
	 */
	'columns' => array(
		'title' => array(
			'title' => 'Title',
		),
		'slug' => array(
              'title' => 'Slug',
        ),
        'published_at' => array(
              'title' => 'Published at',
        ),
		
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'title',
		'published_at',
	),

	/**
	 * The editable fields
	 */

	'edit_fields' => array(
		'title' => array(
			'title' => 'title',
			'type' => 'text',
		),
		'published_at' => array(
			'title' => 'Published at',
			'type' => 'date',
			'date_format' => 'yy-mm-dd',
		),
		      
        'content' => array(
              'title' => 'Content',
              'type' => 'wysiwyg',
          ),
       
	),

);
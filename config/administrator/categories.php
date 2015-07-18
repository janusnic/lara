<?php

/**
 * Directors model config
 */

return array(

	'title' => 'Categories',

	'single' => 'category',

	'model' => '\App\Category',

	/**
	 * The display columns
	 */
	'columns' => array(
		'name' => array(
			'title' => 'Name',
		),
		'slug' => array(
              'title' => 'Slug',
        ),
        		
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name',
		
	),

	/**
	 * The editable fields
	 */

	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),
				      
        'description' => array(
              'title' => 'Description',
              'type' => 'text',
          ),
       
	),

);
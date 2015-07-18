<?php

/**
 * Directors model config
 */

return array(

	'title' => 'Roles',

	'single' => 'role',

	'model' => '\App\Authority\Role',

	/**
	 * The display columns
	 */
	'columns' => array(
		'name' => array(
			'title' => 'Role',
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
			'title' => 'Role',
			'type' => 'text',
		),
				      
               
	),

);
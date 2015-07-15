<?php

/**
 * Directors model config
 */

return array(

	'title' => 'Users',

	'single' => 'user',

	'model' => '\App\User',

	/**
	 * The display columns
	 */
	'columns' => array(
		'name' => array(
			'title' => 'NicName',
		),
		'email' => array(
              'title' => 'Email',
        ),
		
	),


	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'first_name',
		'last_name',
	),

	/**
	 * The editable fields
	 */

	'edit_fields' => array(
		'first_name' => array(
			'title' => 'First Name',
			'type' => 'text',
		),
		'last_name' => array(
			'title' => 'Last Name',
			'type' => 'text',
		),
		      'email' => array(
              'title' => 'Email',
              'type' => 'text',
          ),
        'name' => array(
              'title' => 'Nicname',
              'type' => 'text',
          ),
        'roles' => array(
              'title' => 'Role',
              'type' => 'relationship',
              'name_field' => 'name',
          ),
        'password' => array(
              'title' => 'Password',
              'type' => 'password',
          ),
	),

);
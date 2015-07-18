<?php

/**
 * Directors model config
 */

return array(

	'title' => 'Permissions',

	'single' => 'permission',

	'model' => '\App\Authority\Permission',

	/**
	 * The display columns
	 */
	'columns' => array(
		'type' => array(
			'title' => 'Type',
		),
		'action' => array(
			'title' => 'Action',
		),
		'resource' => array(
			'title' => 'Resource',
		),
       		 
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'type',
		'action',
		'resource',
		
	),

	/**
	 * The editable fields
	 */

	'edit_fields' => array(
		'type' => array(
			'title' => 'Type',
			'type' => 'text',
		),
		'action' => array(
			'title' => 'Action',
			'type' => 'text',
		),
		'resource' => array(
			'title' => 'Resource',
			'type' => 'text',
		),
		'type' => array(
			'title' => 'Type',
			'type' => 'text',
		),		      
        'user' => array(
              'title' => 'User',
              'type' => 'relationship',
              'name_field' => 'name',
          ),    
	),

);
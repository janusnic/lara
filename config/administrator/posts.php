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
               /**'kcfinder' => array(
               
                * You can find all the default and configurable
                * options here: http://kcfinder.sunhater.com/install
                * in the Configuration -> Dynamic Settings paragraph
                
                'disabled' => false,   //this is the default way to enable, but
                //'enabled' => true,   //you can also use enabled => true 
                //'uploadURL' => '../../../../../uploads',   //this is the default 'public/uploads' folder
                'uploadPath' => public_path(). '/uploads', //this is the default 'public/uploads' folder
                //etc...
            ),**/
        ),
        'categories' => array(
             'title' => 'Category',
             'type' => 'relationship',
             'name_field' => 'name',
        ),
       
	),

);
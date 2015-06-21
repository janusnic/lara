var elixir = require('laravel-elixir');
//elixir.config.publicDir = 'public';
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.less('app.less');
    //mix.sass('app.scss');
/*
    mix.styles([
    	'vendor/skel-noscript.css',
    	'app.css',
    	'vendor/style-desktop.css',
    	],'public/output/final.css','public/css');

    mix.styles([
    	'skel-noscript.css',
    	'app.css',
    	'style-desktop.css',
    	],null,'public/css');*/
/*
    mix.scripts([
    	'skel.min.js',
    	'skel-panels.min.js',
    	'init.js',
    	],'public/output/scripts.js','public/js');

    mix.scripts([
    	'skel.min.js',
    	'skel-panels.min.js',
    	'init.js',
    	],null,'public/js');*/
    //mix.version("public/css/all.css");
    //mix.version("public/css/skel-noscript.css");
	//mix.version("public/css/style-desktop.css");
    //mix.version("public/js/skel.min.js");
	//mix.version("public/js/skel-panels.min.js");
	//mix.version("public/js/all.js");
    //mix.phpUnit();
});

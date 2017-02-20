const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js')
       .styles([
       		'bootstrap.css',
       		'blog-post.css',
       		'font-awesome.css',
       		'metisMenu.css',
       		'sb-admin-2.css'
       	],'public/css/libs.css')
       .scripts([
       		'jquery.js',
                  'bootstrap.min.js',
       		'metisMenu.js',
       		'sb-admin-2.js'
       	], 'public/js/libs.js');
       
});

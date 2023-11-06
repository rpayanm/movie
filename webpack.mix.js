let mix = require('laravel-mix');

mix
  .js('assets/js/movie_form.js', 'js')
  .sass('assets/sass/movie_form.scss', 'css')
  .setPublicPath('dist')
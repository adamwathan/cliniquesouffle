let mix = require('laravel-mix');

mix.options({
    processCssUrls: false
})

mix.setPublicPath('dist')
mix.css('assets/css/app.css', 'css/');
mix.js('assets/js/app.js', 'js/');
mix.copyDirectory('assets/images', 'dist/images')
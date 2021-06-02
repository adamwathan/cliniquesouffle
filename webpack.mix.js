let mix = require('laravel-mix');

mix.options({
    processCssUrls: false
})

mix.setPublicPath('dist')
mix.css('assets/css/app.css', 'css/');
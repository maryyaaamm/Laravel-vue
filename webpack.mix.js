const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue() // Enable Vue
    .sass('resources/sass/app.scss', 'public/css')
    .version(); // Cache busting

// Fix for some Windows issues
mix.options({
    processCssUrls: false
});

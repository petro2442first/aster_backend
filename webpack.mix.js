const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/app.js")
    .js("resources/js/admin.js", "public/admin.js")
    .sass("resources/style/style.scss", "public/style.css")
    .options({
        autoprefixer: "last 8 versions",
    })
    .copyDirectory("resources/assets", "public/images")
    .browserSync({
        watch: true,
        proxy: "http://aster-invest.local",
    })
    .version();

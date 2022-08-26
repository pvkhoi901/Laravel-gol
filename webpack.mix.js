const mix = require("laravel-mix");
let fs = require("fs");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

let getFiles = function (dir) {
    // get all 'files' in this directory
    // filter directories
    return fs.readdirSync(dir).filter((file) => {
        return fs.statSync(`${dir}/${file}`).isFile();
    });
};

mix.js("resources/js/app.js", "js")
    .js("resources/js/common.js", "js")
    .sass("resources/sass/dark/app.scss", "css/dark.css")
    .sass("resources/sass/light/app.scss", "css/light.css")
    .sass("resources/sass/custom.scss", "css")
    .sass("resources/sass/rma.scss", "css/rma.css");

// Product
// mix.js("resources/js/pages/*", "js/pages");

getFiles("resources/js/pages").forEach(function (JSpath) {
    mix.js("resources/js/pages/" + JSpath, "public/js/pages");
});

mix.disableNotifications();

mix.version();

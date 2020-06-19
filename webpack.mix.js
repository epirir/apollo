const mix = require('laravel-mix');
const exec = require('child_process').exec;
require('dotenv').config();

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

const glob = require('glob')
const path = require('path')

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
    (glob.sync('resources/' + query) || []).forEach(f => {
        f = f.replace(/[\\\/]+/g, '/');
        cb(f, f.replace('resources', 'public'));
    });
}

const sassOptions = {
    precision: 5
};

// plugins Core stylesheets
mixAssetsDir('sass/plugins/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), sassOptions));

// themes Core stylesheets
mixAssetsDir('sass/themes/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), sassOptions));

// pages Core stylesheets
mixAssetsDir('sass/pages/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), sassOptions));

// Core stylesheets
mixAssetsDir('sass/core/**/!(_)*.scss', (src, dest) => mix.sass(src, dest.replace(/(\\|\/)sass(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), sassOptions));

// script js
mixAssetsDir('js/scripts/**/*.js', (src, dest) => mix.scripts(src, dest));

/*
 |--------------------------------------------------------------------------
 | Application assets
 |--------------------------------------------------------------------------
 */

mixAssetsDir('vendors/js/**/*.js', (src, dest) => mix.scripts(src, dest));
mixAssetsDir('vendors/css/**/*.css', (src, dest) => mix.copy(src, dest));
mixAssetsDir('vendors/css/editors/quill/fonts/', (src, dest) => mix.copy(src, dest));
mix.copyDirectory('resources/images', 'public/images');
mix.copyDirectory('resources/fonts', 'public/fonts');

mix.js('resources/js/core/app-menu.js', 'public/js/core')
    .js('resources/js/core/app.js', 'public/js/core')
    .sass('resources/sass/bootstrap.scss', 'public/css')
    .sass('resources/sass/bootstrap-extended.scss', 'public/css')
    .sass('resources/sass/colors.scss', 'public/css')
    .sass('resources/sass/components.scss', 'public/css')
    .sass('resources/sass/custom-rtl.scss', 'public/css')
    .sass('resources/sass/custom-laravel.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')

    // Devextreme
    .styles([
        'resources/sass/packages/devextreme/dx.common.css',
        //select theme
        'resources/sass/packages/devextreme/dx.material.purple.light.css'
    ], 'public/css/packages/devextreme/dx.theme.css')

    .copyDirectory('resources/sass/packages/devextreme/fonts/', 'public/css/packages/devextreme/fonts')
    .copyDirectory('resources/sass/packages/devextreme/fonts/', 'public/css/packages/devextreme/fonts')

    .scripts([
        'resources/js/packages/devextreme/dx.all.js'
    ], 'public/js/packages/devextreme/dx.all.js')

    .scripts(['resources/js/packages/devextreme/dx.aspnet.data.js'], 'public/js/packages/devextreme/dx.aspnet.data.js')

    .scripts([
        'resources/js/packages/devextreme/cldr.min.js',
        'resources/js/packages/devextreme/cldr/event.min.js',
        'resources/js/packages/devextreme/cldr/supplemental.min.js',
        'resources/js/packages/devextreme/cldr/unresolved.min.js'
    ], 'public/js/packages/devextreme/cldr.bundle.js')

    .scripts([
        'resources/js/packages/devextreme/globalize.min.js',
        'resources/js/packages/devextreme/globalize/message.min.js',
        'resources/js/packages/devextreme/globalize/number.min.js',
        'resources/js/packages/devextreme/globalize/currency.min.js',
        'resources/js/packages/devextreme/globalize/date.min.js',
        // 'resources/js/packages/devextreme/globalize/plural.min.js',
        // 'resources/js/packages/devextreme/globalize/relative-time.min.js',
        // 'resources/js/packages/devextreme/globalize/unit.min.js'
    ], 'public/js/packages/devextreme/globalize.bundle.js')

    .scripts([
        'resources/js/packages/devextreme/globalize/es-GT/supplemental.js',
        'resources/js/packages/devextreme/globalize/es-GT/currencies.js',
        'resources/js/packages/devextreme/globalize/es-GT/dates.js',
        'resources/js/packages/devextreme/globalize/es-GT/number.js',
        'resources/js/packages/devextreme/globalize/es-GT/plurals.js',
    ], 'public/js/packages/devextreme/gt.bundle.js')

    .scripts([
        'resources/js/packages/devextreme/localization/dx.messages.es.js',
        'resources/js/packages/devextreme/localization/dx.messages.en.js',
    ], 'public/js/packages/devextreme/dx.messages.js');


mix.then(() => {
    if (process.env.MIX_CONTENT_DIRECTION === "rtl") {
        let command = `node ${path.resolve('node_modules/rtlcss/bin/rtlcss.js')} -d -e ".css" ./public/css/ ./public/css/`;
        exec(command, function (err, stdout, stderr) {
            if (err !== null) {
                console.log(err);
            }
        });
        // exec('./node_modules/rtlcss/bin/rtlcss.js -d -e ".css" ./public/css/ ./public/css/');
    }
});

mix.version();

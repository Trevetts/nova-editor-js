let mix = require('laravel-mix')

mix.setPublicPath('dist')
    .js('resources/js/attaches-bundle.js', 'js')
    .js('resources/js/field.js', 'js')
    .sass('resources/sass/field.scss', 'css')

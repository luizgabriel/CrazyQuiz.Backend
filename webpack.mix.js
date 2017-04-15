const {mix} = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/admin/layout3/layout.scss', 'public/css/layout.css')
    .sass('resources/assets/sass/admin/pages/login2.scss', 'public/css/login.css');

let mix = require('laravel-mix');

mix.js('./assets/plugins/tailwind/mix/app.js', './assets/plugins/tailwind/post/app.js').postCss('./assets/plugins/tailwind/mix/app.css', './assets/plugins/tailwind/post/app.css', [
    require("tailwindcss")
]);
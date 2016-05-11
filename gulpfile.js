var elixir = require('laravel-elixir');

elixir.config.appPath = 'src';

elixir(function (mix) {
    mix.phpUnit('', 'vendor\\bin\\phpunit --verbose');
});
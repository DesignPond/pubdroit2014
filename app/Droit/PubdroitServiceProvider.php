<?php namespace Droit;

use Illuminate\Support\ServiceProvider;

class PubdroitServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('foo', function()
        {
            return new Foo;
        });
    }

}
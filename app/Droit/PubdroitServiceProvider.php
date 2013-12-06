<?php namespace Droit;

use Event;
use Illuminate\Support\ServiceProvider;
use Droit\Repo\Event\EventEloquent;

class PubdroitServiceProvider extends ServiceProvider {

    public function register()
    {
        
        $this->app->bind('Droit\Repo\Event\EventInterface', function()
		{
		     return new EventEloquent( new Event );
		});
        
    }

}
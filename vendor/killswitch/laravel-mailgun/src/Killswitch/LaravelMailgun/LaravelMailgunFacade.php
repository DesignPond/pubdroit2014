<?php namespace Killswitch\LaravelMailgun;

use Illuminate\Support\Facades\Facade;

class LaravelMailgunFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'laravelmailgun'; }

}
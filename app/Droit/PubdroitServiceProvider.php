<?php namespace Droit;

use Illuminate\Support\ServiceProvider;
use Events as E;

class PubdroitServiceProvider extends ServiceProvider {

    public function register()
    {     
       	
    	$this->registerEventService();	
    	$this->registerInscriptionService();	
    			
    }
    
    protected function registerEventService(){
    
	    $this->app->bind('Droit\Repo\Event\EventInterface', function()
        {
            return new \Droit\Repo\Event\EventEloquent( new E );
        });
        
    }
    
    protected function registerInscriptionService(){
    
	    $this->app->bind('Droit\Repo\Inscription\InscriptionInterface', function()
        {
            return new \Droit\Repo\Inscription\InscriptionEloquent( new E );
        });
        
    }

}
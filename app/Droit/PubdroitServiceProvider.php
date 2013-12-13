<?php namespace Droit;

use Illuminate\Support\ServiceProvider;
use Events as E;
use Comptes as C;

class PubdroitServiceProvider extends ServiceProvider {

    public function register()
    {     
       	// Admin
    	$this->registerEventService();	
    	$this->registerInscriptionService();
    	$this->registerCompteService();	
		$this->registerFileService();	
    			
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
    
    protected function registerCompteService(){
    
	    $this->app->bind('Droit\Repo\Compte\CompteInterface', function()
        {
            return new \Droit\Repo\Compte\CompteEloquent( new C );
        });
        
    }
    
    protected function registerFileService(){
    
	    $this->app->bind('Droit\Service\File\FileInterface', function()
        {
            return new \Droit\Service\File\FileWorker();
        });
        
    }

}
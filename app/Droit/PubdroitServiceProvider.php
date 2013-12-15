<?php namespace Droit;

use Illuminate\Support\ServiceProvider;
use Events as E;
use Comptes as C;
use Files as F;

class PubdroitServiceProvider extends ServiceProvider {

    public function register()
    {     
       	// Admin
    	$this->registerEventService();	
    	$this->registerInscriptionService();
    	$this->registerCompteService();	
		$this->registerFileService();
		$this->registerUploadService();	
    			
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

	    $this->app->bind('Droit\Repo\File\FileInterface', function()
        {
            return new \Droit\Repo\File\FileEloquent( new F );
        });
        
    }
    
    protected function registerUploadService(){
    
	    $this->app->bind('Droit\Service\Upload\UploadInterface', function()
        {
            return new \Droit\Service\Upload\UploadWorker();
        });
        
    }
}
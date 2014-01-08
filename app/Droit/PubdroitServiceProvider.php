<?php namespace Droit;

use Illuminate\Support\ServiceProvider;
use Events as E;
use Inscriptions as I;
use Comptes as C;
use Options as O;
use Specialisations as S;
use Membres as M;
use Professions as P;
use Files as F;
use Arrets as A;
use BaCategories as BA;

class PubdroitServiceProvider extends ServiceProvider {

    public function register()
    {     
       	// Admin
    	$this->registerEventService();
    	$this->registerInscriptionService();	
    	$this->registerCompteService();	
    	$this->registerOptionService();	
    	$this->registerSpecialisationService();	
    	$this->registerMembreService();
    	$this->registerProfessionService();	
    	$this->registerArretService();	
    	$this->registerCategorieService();	
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
            return new \Droit\Repo\Inscription\InscriptionEloquent( new I );
        });
        
    }

    protected function registerCompteService(){
    
	    $this->app->bind('Droit\Repo\Compte\CompteInterface', function()
        {
            return new \Droit\Repo\Compte\CompteEloquent( new C );
        });
        
    }
    
    protected function registerOptionService(){
    
	    $this->app->bind('Droit\Repo\Option\OptionInterface', function()
        {
            return new \Droit\Repo\Option\OptionEloquent( new O );
        });
        
    }
    
    protected function registerSpecialisationService(){
    
	    $this->app->bind('Droit\Repo\Specialisation\SpecialisationInterface', function()
        {
            return new \Droit\Repo\Specialisation\SpecialisationEloquent( new S );
        });
        
    } 
    
    public function registerMembreService(){
		
		$this->app->bind('Droit\Repo\Membre\MembreInterface', function()
        {
            return new \Droit\Repo\Membre\MembreEloquent( new M );
        });
        
	}
    
    public function registerProfessionService(){
		
		$this->app->bind('Droit\Repo\Profession\ProfessionInterface', function()
        {
            return new \Droit\Repo\Profession\ProfessionEloquent( new P );
        });
        
	}

    public function registerArretService(){
		
		$this->app->bind('Droit\Repo\Arret\ArretInterface', function()
        {
            return new \Droit\Repo\Arret\ArretEloquent( new A );
        });
        
	}

    public function registerCategorieService(){
		
		$this->app->bind('Droit\Repo\Categorie\CategorieInterface', function()
        {
            return new \Droit\Repo\Categorie\CategorieEloquent( new BA );
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
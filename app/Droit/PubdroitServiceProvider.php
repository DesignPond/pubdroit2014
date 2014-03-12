<?php namespace Droit;

use Illuminate\Support\ServiceProvider;

use Events as E;
use Inscriptions as I;
use Invoices as IN;
use Comptes as C;
use Options as O;
use Specialisations as S;
use Membres as M;
use Professions as P;
use Prices as PR;

use User as U;
use Adresses as AD;

use Files as F;

use Arrets as A;
use Analyses as AN;
use Auteur as AU;
use Seminaires as SM;
use Subjects as SU;

use BaCategories as BA;
use BsCategories as BS;

use Calculette_ipc as CI;
use Calculette_taux as CT;

use Droit\Repo\Price\PriceInterface;

class PubdroitServiceProvider extends ServiceProvider {

    public function register()
    {     
       	// Admin
    	$this->registerEventService();
    	$this->registerInscriptionService();
    	$this->registerInvoiceService();	
    	$this->registerCompteService();	
    	$this->registerOptionService();	
    	$this->registerSpecialisationService();	
    	$this->registerMembreService();
    	$this->registerProfessionService();	
    	$this->registerPriceService();	
    	$this->registerArretService();	
    	$this->registerAnalyseService();	
    	$this->registerSeminaireService();	
    	$this->registerSubjectService();	
    	$this->registerAuteurService();	
    	$this->registerCategorieService();
    	$this->registerBSCategorieService();	
		$this->registerFileService();
		$this->registerUploadService();	
		$this->registerCalculetteService();
		$this->registerGenerateService();
		$this->registerSearchService();
		
		// User
    	$this->registerUserService();
    	$this->registerAdresseService();
    			
    }
    
    
    protected function registerUserService(){
    
	    $this->app->bind('Droit\Repo\User\UserInfoInterface', function()
        {
            return new \Droit\Repo\User\UserInfoEloquent( new U );
        });       
    }    
    
    protected function registerAdresseService(){
    
	    $this->app->bind('Droit\Repo\Adresse\AdresseInterface', function()
        {
            return new \Droit\Repo\Adresse\AdresseEloquent( new AD );
        });       
    } 
    
    protected function registerSearchService(){
    
	    $this->app->bind('Droit\Repo\Search\SearchInterface', function()
        {
            return new \Droit\Repo\Search\SearchEloquent( \App::make('Droit\Repo\User\UserInfoInterface') , \App::make('Droit\Repo\Adresse\AdresseInterface') );
        });       
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
    
    protected function registerInvoiceService(){
    
	    $this->app->bind('Droit\Repo\Invoice\InvoiceInterface', function()
        {
            return new \Droit\Repo\Invoice\InvoiceEloquent( new IN );
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
	
	public function registerPriceService(){
	
		$this->app->bind('Droit\Repo\Price\PriceInterface', function()
        {
            return new \Droit\Repo\Price\PriceEloquent( new PR );
        });
        
	}

    public function registerArretService(){
		
		$this->app->bind('Droit\Repo\Arret\ArretInterface', function()
        {
            return new \Droit\Repo\Arret\ArretEloquent( new A );
        });
        
	}

    public function registerAnalyseService(){
		
		$this->app->bind('Droit\Repo\Analyse\AnalyseInterface', function()
        {
            return new \Droit\Repo\Analyse\AnalyseEloquent( new AN );
        });
        
	}
	
    public function registerSeminaireService(){
		
		$this->app->bind('Droit\Repo\Seminaire\SeminaireInterface', function()
        {
            return new \Droit\Repo\Seminaire\SeminaireEloquent( new SM );
        });
        
	}
	
    public function registerSubjectService(){
		
		$this->app->bind('Droit\Repo\Subject\SubjectInterface', function()
        {
            return new \Droit\Repo\Subject\SubjectEloquent( new SU );
        });
        
	}	
	
    public function registerAuteurService(){
		
		$this->app->bind('Droit\Repo\Auteur\AuteurInterface', function()
        {
            return new \Droit\Repo\Auteur\AuteurEloquent( new AU );
        });
        
	}			

    public function registerCategorieService(){
		
		$this->app->bind('Droit\Repo\Categorie\CategorieInterface', function()
        {
            return new \Droit\Repo\Categorie\CategorieEloquent( new BA );
        });
        
	}

    public function registerBSCategorieService(){
		
		$this->app->bind('Droit\Repo\BSCategorie\BSCategorieInterface', function()
        {
            return new \Droit\Repo\BSCategorie\BSCategorieEloquent( new BS );
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
    
    protected function registerCalculetteService(){
    
	    $this->app->bind('Droit\Repo\Calculette\CalculetteInterface', function()
        {
            return new \Droit\Repo\Calculette\CalculetteEloquent( new CT , new CI );
        });
        
    }
	        
    protected function registerGenerateService(){

	    $this->app->bind('Droit\Service\Generate\GenerateInterface', function()
        {
            return new \Droit\Service\Generate\GenerateWorker( 
            	\App::make('Droit\Repo\Price\PriceInterface') , 
            	\App::make('Droit\Repo\Compte\CompteInterface') , 
            	\App::make('Droit\Repo\File\FileInterface') ,
            	\App::make('Droit\Repo\User\UserInfoInterface')
            );
        });
        
    }
    
}
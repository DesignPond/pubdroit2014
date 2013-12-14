<?php namespace Killswitch\LaravelMailgun;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Mailgun\Mailgun;
use Config;

class LaravelMailgunServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['laravelmailgun'] = $this->app->share(function($app)
		{
			return new Mailgun(Config::get('mailgun.api_key'));
		});

		// Shortcut so developers don't need to add an Alias in app/config/app.php
		$this->app->booting(function()
		{
			$loader = AliasLoader::getInstance();
			$loader->alias('Mailgun', 'Killswitch\LaravelMailgun\LaravelMailgunFacade');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('laravelmailgun');
	}

}
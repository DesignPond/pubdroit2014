<?php namespace Droit\Repo;

use Illuminate\Support\ServiceProvider;
use Droit\Repo\Session\SentrySession;
use Droit\Repo\User\SentryUser;
use Droit\Repo\Group\SentryGroup;
use Cartalyst\Sentry\Sentry;

class RepoServiceProvider extends ServiceProvider {

	/**
	 * Register the binding
	 */
	public function register()
	{
		$app = $this->app;

		 // Bind the Session Repository
        $app->bind('Droit\Repo\Session\SessionInterface', function($app)
        {
            return new SentrySession(
            	$app['sentry']
            );
        });

        // Bind the User Repository
        $app->bind('Droit\Repo\User\UserInterface', function($app)
        {
            return new SentryUser(
            	$app['sentry']
            );
        });

        // Bind the Group Repository
        $app->bind('Droit\Repo\Group\GroupInterface', function($app)
        {
            return new SentryGroup(
                $app['sentry']
            );
        });
	}

}
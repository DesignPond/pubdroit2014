<?php namespace Droit\Service\Form;

use Illuminate\Support\ServiceProvider;
use Droit\Service\Form\Login\LoginForm;
use Droit\Service\Form\Login\LoginFormLaravelValidator;
use Droit\Service\Form\Register\RegisterForm;
use Droit\Service\Form\Register\RegisterFormLaravelValidator;
use Droit\Service\Form\Group\GroupForm;
use Droit\Service\Form\Group\GroupFormLaravelValidator;
use Droit\Service\Form\User\UserForm;
use Droit\Service\Form\User\UserFormLaravelValidator;
use Droit\Service\Form\ResendActivation\ResendActivationForm;
use Droit\Service\Form\ResendActivation\ResendActivationFormLaravelValidator;
use Droit\Service\Form\ForgotPassword\ForgotPasswordForm;
use Droit\Service\Form\ForgotPassword\ForgotPasswordFormLaravelValidator;
use Droit\Service\Form\ChangePassword\ChangePasswordForm;
use Droit\Service\Form\ChangePassword\ChangePasswordFormLaravelValidator;
use Droit\Service\Form\SuspendUser\SuspendUserForm;
use Droit\Service\Form\SuspendUser\SuspendUserFormLaravelValidator;

class FormServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        // Bind the Login Form
        $app->bind('Droit\Service\Form\Login\LoginForm', function($app)
        {
            return new LoginForm(
                new LoginFormLaravelValidator( $app['validator'] ),
                $app->make('Droit\Repo\Session\SessionInterface')
            );
        });

        // Bind the Register Form
        $app->bind('Droit\Service\Form\Register\RegisterForm', function($app)
        {
            return new RegisterForm(
                new RegisterFormLaravelValidator( $app['validator'] ),
                $app->make('Droit\Repo\User\UserInterface')
            );
        });

        // Bind the Group Form
        $app->bind('Droit\Service\Form\Group\GroupForm', function($app)
        {
            return new GroupForm(
                new GroupFormLaravelValidator( $app['validator'] ),
                $app->make('Droit\Repo\Group\GroupInterface')
            );
        });

        // Bind the User Form
        $app->bind('Droit\Service\Form\User\UserForm', function($app)
        {
            return new UserForm(
                new UserFormLaravelValidator( $app['validator'] ),
                $app->make('Droit\Repo\User\UserInterface')
            );
        });

        // Bind the Resend Activation Form
        $app->bind('Droit\Service\Form\ResendActivation\ResendActivationForm', function($app)
        {
            return new ResendActivationForm(
                new ResendActivationFormLaravelValidator( $app['validator'] ),
                $app->make('Droit\Repo\User\UserInterface')
            );
        });

        // Bind the Forgot Password Form
        $app->bind('Droit\Service\Form\ForgotPassword\ForgotPasswordForm', function($app)
        {
            return new ForgotPasswordForm(
                new ForgotPasswordFormLaravelValidator( $app['validator'] ),
                $app->make('Droit\Repo\User\UserInterface')
            );
        });

        // Bind the Change Password Form
        $app->bind('Droit\Service\Form\ChangePassword\ChangePasswordForm', function($app)
        {
            return new ChangePasswordForm(
                new ChangePasswordFormLaravelValidator( $app['validator'] ),
                $app->make('Droit\Repo\User\UserInterface')
            );
        });

        // Bind the Suspend User Form
        $app->bind('Droit\Service\Form\SuspendUser\SuspendUserForm', function($app)
        {
            return new SuspendUserForm(
                new SuspendUserFormLaravelValidator( $app['validator'] ),
                $app->make('Droit\Repo\User\UserInterface')
            );
        });

    }

}
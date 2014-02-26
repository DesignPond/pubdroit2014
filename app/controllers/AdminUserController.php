<?php

use Droit\Repo\User\UserInterface;
use Droit\Repo\User\UserInfoInterface;
use Droit\Repo\Adresse\AdresseInterface;

use Droit\Repo\Group\GroupInterface;
use Droit\Service\Form\Register\RegisterForm;
use Droit\Service\Form\User\UserForm;
use Droit\Service\Form\ResendActivation\ResendActivationForm;
use Droit\Service\Form\ForgotPassword\ForgotPasswordForm;
use Droit\Service\Form\ChangePassword\ChangePasswordForm;
use Droit\Service\Form\SuspendUser\SuspendUserForm;

class AdminUserController extends BaseController {

	protected $user;
	protected $userInfo;
	protected $adresse;
	protected $group;
	protected $registerForm;
	protected $userForm;
	protected $resendActivationForm;
	protected $forgotPasswordForm;
	protected $changePasswordForm;
	protected $suspendUserForm;

	/**
	 * Instantiate a new UserController
	 */
	public function __construct(
		UserInterface $user, 
		UserInfoInterface $userInfo, 
		AdresseInterface $adresse, 
		GroupInterface $group, 
		RegisterForm $registerForm, 
		UserForm $userForm,
		ResendActivationForm $resendActivationForm,
		ForgotPasswordForm $forgotPasswordForm,
		ChangePasswordForm $changePasswordForm,
		SuspendUserForm $suspendUserForm
	)
	{
		$this->user                 = $user;
		$this->userInfo             = $userInfo;
		$this->adresse              = $adresse;
		$this->group                = $group;
		$this->registerForm         = $registerForm;
		$this->userForm             = $userForm;
		$this->resendActivationForm = $resendActivationForm;
		$this->forgotPasswordForm   = $forgotPasswordForm;
		$this->changePasswordForm   = $changePasswordForm;
		$this->suspendUserForm      = $suspendUserForm;

		//Check CSRF token on POST
		$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		$this->beforeFilter('auth', array('only' => array('change')));
		$this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users    = $this->userInfo->getAll();
        $adresses = $this->adresse->test('yann');
        
        $columns  = array('email','prenom','nom','adresse','ville');
        
        $sEcho          = 1;
        $iDisplayStart  = 5;
        $iDisplayLength = 5;
        
        $filter   = $this->adresse->get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength ,  NULL);
        
        $types = \Adresse_types::all()->lists('type','id');
      
        return View::make('admin.users.index')->with( array('users' => $users, 'adresses' => $adresses , 'types' => $types , 'filter' => $filter ) );
	}

	/**
	 * Display a listing of all users.
	 *
	 * @return Response
	 */
	public function getAllUser()
	{

        $columns = array('email','prenom','nom','activated'); 
        
        $sSearch = NULL;
        
        if(Input::get('sSearch'))
        {
	        $sSearch = Input::get('sSearch');
        }

        $sEcho          = Input::get('sEcho');      
        $iDisplayStart  = Input::get('iDisplayStart');
        $iDisplayLength = Input::get('iDisplayLength');
        
        return $this->userInfo->get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch );
        
	}
	
	/**
	 * Display a listing of all adresses.
	 *
	 * @return Response
	 */
	public function getAllAdresse()
	{

        $columns = array('email','prenom','nom','adresse','ville'); 
        $sSearch = NULL;
        
        if(Input::get('sSearch'))
        {
	        $sSearch = Input::get('sSearch');
        }

        $sEcho          = Input::get('sEcho');      
        $iDisplayStart  = Input::get('iDisplayStart');
        $iDisplayLength = Input::get('iDisplayLength');
        
        return $this->adresse->get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch );
        
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.users.create');
	}

	/**
	 * Store a newly created user.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Form Processing
        $result = $this->registerForm->save( Input::all() );

        if( $result['success'] )
        {
            Event::fire('user.signup', array(
            	'email' => $result['mailData']['email'], 
            	'userId' => $result['mailData']['userId'], 
                'activationCode' => $result['mailData']['activationCode']
            ));

            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('admin');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::action('UserController@create')
                ->withInput()
                ->withErrors( $this->registerForm->errors() );
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = $this->userAdresse->find($id);

        if($user == null || !is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

        return View::make('admin.users.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = $this->user->byId($id);

        if($user == null || !is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

        $currentGroups = $user->getGroups()->toArray();
        $userGroups    = array();
        
        foreach ($currentGroups as $group) {
        	array_push($userGroups, $group['name']);
        }
        
        $allGroups = $this->group->all();

        return View::make('admin.users.edit')->with('user', $user)->with('userGroups', $userGroups)->with('allGroups', $allGroups);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		// Form Processing
        $result = $this->userForm->update( Input::all() );

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::action('UserController@show', array($id));

        } else {
            Session::flash('error', $result['message']);
            return Redirect::action('UserController@edit', array($id))
                ->withInput()
                ->withErrors( $this->userForm->errors() );
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		if ($this->user->destroy($id))
		{
			Session::flash('success', 'User Deleted');
            return Redirect::to('/users');
        }
        else 
        {
        	Session::flash('error', 'Unable to Delete User');
            return Redirect::to('/users');
        }
	}

	/**
	 * Activate a new user
	 * @param  int $id   
	 * @param  string $code 
	 * @return Response
	 */
	public function activate($id, $code)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$result = $this->user->activate($id, $code);

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('admin');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::route('home');
        }
	}

	/**
	 * Process resend activation request
	 * @return Response
	 */
	public function resend()
	{
		// Form Processing
        $result = $this->resendActivationForm->resend( Input::all() );

        if( $result['success'] )
        {
            Event::fire('user.resend', array(
				'email' => $result['mailData']['email'], 
				'userId' => $result['mailData']['userId'], 
				'activationCode' => $result['mailData']['activationCode']
			));

            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('admin');
        } 
        else 
        {
            Session::flash('error', $result['message']);
            return Redirect::route('profile')
                ->withInput()
                ->withErrors( $this->resendActivationForm->errors() );
        }
	}

	/**
	 * Process Forgot Password request
	 * @return Response
	 */
	public function forgot()
	{
		// Form Processing
        $result = $this->forgotPasswordForm->forgot( Input::all() );

        if( $result['success'] )
        {
            Event::fire('user.forgot', array(
				'email'     => $result['mailData']['email'],
				'userId'    => $result['mailData']['userId'],
				'resetCode' => $result['mailData']['resetCode']
			));

            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('admin');
        } 
        else 
        {
            Session::flash('error', $result['message']);
            return Redirect::route('forgotPasswordForm')
                ->withInput()
                ->withErrors( $this->forgotPasswordForm->errors() );
        }
	}

	/**
	 * Process a password reset request link
	 * @param  [type] $id   [description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function reset($id, $code)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$result = $this->user->resetPassword($id, $code);

        if( $result['success'] )
        {
            Event::fire('user.newpassword', array(
				'email' => $result['mailData']['email'],
				'newPassword' => $result['mailData']['newPassword']
			));

            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('admin');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::route('home');
        }
	}

	/**
	 * Process a password change request
	 * @param  int $id 
	 * @return redirect     
	 */
	public function change($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$data = Input::all();
		$data['id'] = $id;

		// Form Processing
        $result = $this->changePasswordForm->change( $data );

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('admin');
        } 
        else 
        {
            Session::flash('error', $result['message']);
            return Redirect::action('UserController@edit', array($id))
                ->withInput()
                ->withErrors( $this->changePasswordForm->errors() );
        }
	}

	/**
	 * Process a suspend user request
	 * @param  int $id 
	 * @return Redirect     
	 */
	public function suspend($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		// Form Processing
        $result = $this->suspendUserForm->suspend( Input::all() );

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('users');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::action('UserController@suspend', array($id))
                ->withInput()
                ->withErrors( $this->suspendUserForm->errors() );
        }
	}

	/**
	 * Unsuspend user
	 * @param  int $id 
	 * @return Redirect     
	 */
	public function unsuspend($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$result = $this->user->unSuspend($id);

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('users');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::to('users');
        }
	}

	/**
	 * Ban a user
	 * @param  int $id 
	 * @return Redirect     
	 */
	public function ban($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

		$result = $this->user->ban($id);

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('users');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::to('users');
        }
	}

	public function unban($id)
	{
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }
        
		$result = $this->user->unBan($id);

        if( $result['success'] )
        {
            // Success!
            Session::flash('success', $result['message']);
            return Redirect::to('users');

        } else {
            Session::flash('error', $result['message']);
            return Redirect::to('users');
        }
	}


}

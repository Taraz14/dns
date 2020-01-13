<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Authemtication Class
 * 
 * Class untuk mengatur authentikasi admin 
 *
 * @package		SPK-GIZI
 * @subpackage	Controller
 * @category	Authentication
 * @author  	Semar Site
 */
class Authentication extends CI_Controller {

	/**
	 * Construct Magic
	 */
	public function __construct()
	{
		parent::__construct();
		
		/** Load Model Authentikasi */
		$this->load->model('AuthenticationModel');
	}

	/**
	 * Check apakah admin sudah login ?
	 * 
	 * @return void
	 */
	private function isSignIn() : void
	{
		$session = $this->session;
		if($session->isLoggon && $session->isAdmin) redirect('0/dashboard','refresh');
	}

   /**
	 * Default function Authentication
	 * 
	 * @return void
	 */
	public function index() : void
	{
		$this->signIn();
	}

	/**
	 * Sign In Function
	 */
	public function signIn()
	{
		$this->isSignIn();

		$valid = $this->form_validation;
		$rules = $this->config;

		$valid->set_rules($rules->item('login'));
		if( ! $valid->run()) {
			return $this->pageSignIn();
		}
		return $this->actionSignIn();
	}

	/**
	 * Page View Sign In
	 * 
	 * @return void
	 */
	private function pageSignIn() : void
	{
		$this->load->view('auth/login_v');
	}

	/**
	 * Action Sign In function
	 */
	private function actionSignIn()
	{
		$validAccount = AuthenticationModel::verifyAccount();
		if(! $validAccount) {
			return direct('Username atau Password Salah', 'service/sign-in');
		}

		$this->setSessionData($validAccount);
	}

	/**
	 * Set Session User Data
	 * 
	 * @param array $validAccount account yang valid
	 */
	private function setSessionData(array $validAccount) : void
	{
		$this->session->set_userdata([
			"name" 		=> $validAccount['admin_name'],
			"isLoggon"	=> true,
			"isAdmin"	=> true
		]);

		redirect('0/dashboard','refresh');
	}

	/**
	 * Desroy Session
	 * 
	 * @return void
	 */
	public function signOut() : void
	{
		$this->session->sess_destroy();
		redirect('service/sign-in','refresh');
	}
}

/* End of file Auth_c.php */

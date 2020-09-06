<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Authemtication Class
 * 
 * Class untuk mengatur authentikasi admin 
 *
 * @package		SPK-GIZI
 * @subpackage	Controller
 * @category	Authentication
 * @author  	Semarsite
 */
class Authentication extends CI_Controller
{

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
	private function isSignIn(): void
	{
		$session = $this->session;
		if ($session->isLoggon && $session->isAdmin) redirect('0/dashboard', 'refresh');
	}

	/**
	 * Default function Authentication
	 * 
	 * @return void
	 */
	public function index(): void
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
		if (!$valid->run()) {
			return $this->pageSignIn();
		}
		return $this->actionSignIn();
	}

	/**
	 * Page View Sign In
	 * 
	 * @return void
	 */
	private function pageSignIn(): void
	{
		$this->load->view('auth/login_v');
	}

	/**
	 * Action Sign In function
	 */
	private function actionSignIn()
	{
		$recaptcha = $this->verifyRecaptcha();
		if (!$recaptcha->success)
			return direct('Invalid recaptcha', 'service/sign-in');

		$validAccount = AuthenticationModel::verifyAccount();
		if (!$validAccount) {
			return direct('Username atau Password Salah', 'service/sign-in');
		}

		$this->setSessionData($validAccount);
	}

	/**
	 * Verify Recaptcha
	 */
	private function verifyRecaptcha()
	{
		$data = array(
			'secret'   => "6LeTf9wUAAAAABHuAxJwbWxJY3CkWbhw9Mj4wO_a",
			'response' => $this->input->post('g-recaptcha-response')
		);

		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($verify);
		return json_decode($response);
	}

	/**
	 * Set Session User Data
	 * 
	 * @param array $validAccount account yang valid
	 */
	private function setSessionData(array $validAccount): void
	{
		$this->session->set_userdata([
			"name" 		=> $validAccount['admin_name'],
			"isLoggon"	=> true,
			"isAdmin"	=> true
		]);

		redirect('0/dashboard', 'refresh');
	}

	/**
	 * Desroy Session
	 * 
	 * @return void
	 */
	public function signOut(): void
	{
		$this->session->sess_destroy();
		redirect('service/sign-in', 'refresh');
	}
}

/* End of file Auth_c.php */

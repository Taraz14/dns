<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Class
 * 
 * Class untuk mengatur authentikasi admin 
 *
 * @package     SPK-GIZI
 * @subpackage  Controller
 * @category    Dashboard
 * @author      Semar Site
 */
class Dashboard extends CI_Controller {

	/**
	 * Construct Magic
	 */
	public function __construct()
	{
		parent::__construct();
		$this->isSingIn();
	}

	/**
	 * Default function Authentication
	 * 
	 * @return void
	 */
	public function index() : void
	{
		$this->load->view('admin/layouts/wrapper', [
			'content' => 'admin/pages/dashboard_v',
			'title' => 'Dashboard'
		]);
	}

	/**
	 * Check apakah admin sudah login ?
	 * 
	 * @return boolean|void
	 */
	private function isSingIn()
	{
		if($this->session->isLoggon && $this->session->isAdmin) {
			return true;
		}
		redirect('service/sign-out','refresh');
	}
}

/* End of file Dashboard_c.php */

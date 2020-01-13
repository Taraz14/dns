<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Authemtication Class
 * 
 * Class untuk mengatur authentikasi admin 
 *
 * @package		DNS
 * @subpackage	Model
 * @category	Authentication
 * @author  	Semarsite
 */
class AuthenticationModel extends CI_Model {

	/**
	 * Minimal Limit
	 */
	const MIN_LIMIT = 1;

	/**
	 * Instansiasi variable $db
	 * 
	 * @var object
	 */
	private static $db;

	/**
	 * Instansiasi variable input
	 * 
	 * @var array
	 */
	private static $input;

	/**
	 * Magic constructor
	 */
	public function __construct()
	{
		parent::__construct();

		/**
		 * Set value varible $db
		 * @var object
		 */
		self::$db =& get_instance()->db;

		/**
		 * Set value varible $input
		 * @var array
		 */
		self::$input =& get_instance()->input;
	}

	/**
	 * Verify account from database
	 * 
	 * @return boolean|array
	 */
	public static function verifyAccount()
	{
		if(static::$input->post('btnSignIn') !== 'true') {
			return false;
		}

		$account  = static::find([
			"admin_username" => static::$input->post('username')
		]);

		if($account->num_rows() !== 1) {
			return false;
		}

		$password = $account->row()->admin_password;
		if(! static::isValidPassword($password)) {
			return false;
		}

		return $account->row_array();
	}

	/**
	 * Find Users from database
	 * 
	 * @param  array  $params condisional
	 * @return object
	 */
	private static function find(array $params)
	{
		return static::$db->get_where("admin", $params, static::MIN_LIMIT);
	}

	/**
	 * Check is Correct Password
	 * 
	 * @param  string $password
	 * @return boolean
	 */
	private static function isValidPassword(string $password) : bool
	{
		return password_verify(static::$input->post('password'), $password);
	} 
}

/* End of file AuthenticationModel.php */
/* Location: ./application/models/AuthenticationModel.php */
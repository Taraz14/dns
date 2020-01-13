<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Kriteria Class
 * 
 * Class untuk mengatur data kriteria
 *
 * @package		DNS
 * @subpackage	Model
 * @category	Kriteria
 * @author  	Semarsite
 */
class KriteriaModel extends CI_Model {

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
	 * Ambil semua data kriteria
	 * 
	 * @return array
	 */
	public static function findAll() : array
	{
		return static::$db->get("kriteria")->result_array();
	}

	/**
	 * Set Data Kriteria
	 * 
	 * @param  array $data
	 * @return boolean
	 */
	public static function set(array $data) : bool
	{
		return static::$db->insert('kriteria', $data);
	}

	/**
	 * Ambil beberapa data kriteria
	 *
	 * @param  array  $clause
	 * @return object
	 */
	public static function show(array $clause)
	{
		return static::$db->get_where("kriteria", $clause, static::MIN_LIMIT);
	}

	/**
	 * Update data kriteria
	 * 
	 * @param  array  $attributes data
	 * @param  array  $params     kaluse
	 * @return boolean
	 */
	public static function update(array $attributes, array $params) : bool
	{
		return static::$db->update("kriteria", $attributes, $params);
	}

	/**
	 * Delete data kriteria
	 * 
	 * @param  array  $params     kaluse
	 * @return boolean
	 */
	public static function delete(array $params) : bool
	{
		return static::$db->delete("kriteria", $params);
	}
}

/* End of file KriteriaModel.php */
/* Location: ./application/models/KriteriaModel.php */
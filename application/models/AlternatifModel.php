<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * AlternatifModel Class
 * 
 * Class untuk mengatur data alternatif
 *
 * @package		DNS
 * @subpackage	Model
 * @category	AlternatifModel
 * @author  	Semarsite
 */
class AlternatifModel extends CI_Model {

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
	 * Ambil semua data alternatif
	 * 
	 * @return array
	 */
	public static function findAll() : array
	{
		return static::$db->get("alternatif")->result_array();
	}

	/**
	 * Set Data Kriteria
	 * 
	 * @param  array $data
	 * @return boolean
	 */
	public static function set(array $data) : bool
	{
		return static::$db->insert('alternatif', $data);
	}

	/**
	 * Ambil beberapa data alternatif
	 *
	 * @param  array  $clause
	 * @return object
	 */
	public static function show(array $clause)
	{
		return static::$db->get_where("alternatif", $clause, static::MIN_LIMIT);
	}

	/**
	 * Update data alternatif
	 * 
	 * @param  array  $attributes data
	 * @param  array  $params     kaluse
	 * @return boolean
	 */
	public static function update(array $attributes, array $params) : bool
	{
		return static::$db->update("alternatif", $attributes, $params);
	}

	/**
	 * Delete data alternatif
	 * 
	 * @param  array  $params     kaluse
	 * @return boolean
	 */
	public static function delete(array $params) : bool
	{
		return static::$db->delete("alternatif", $params);
	}

}

/* End of file AlternatifModel.php */
/* Location: ./application/models/AlternatifModel.php */
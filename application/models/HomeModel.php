<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * HomeModel Class
 * 
 * Class untuk mengatur data alternatif
 *
 * @package		DNS
 * @subpackage	Model
 * @category	HomeModel
 * @author  	Semarsite
 */
class HomeModel extends CI_Model {

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
	 * Find Question
	 * 
	 * @param  array  $params 
	 * @return array
	 */
	public static function findQuestion() : array
	{
		return static::$db
			->select("kp.*, k.kriteria_name")
			->from('kriteria_pertanyaan kp')
			->join('kriteria k','k.kriteria_id = kp.kriteria_id','inner')
			->get()
			->result_array();
	}

	/**
	 * Find Answer
	 * 
	 * @param  array  $kp_id 
	 * @return array
	 */
	public static function findAnswer(array $kp_id) : array
	{
		return static::$db
			->select("*")
			->from("jawaban_pertanyaan")
			->where($kp_id)
			->get()
			->result_array();
	}

	/**
	 * Find Question And Answer
	 * 
	 * @param  string $params string
	 * @return object
	 */
	public static function findQuestionAndAnswer(string $params) 
	{
		return static::$db->query("
			SELECT 
				kp.pertanyaan, 
				kp.bobot as bobot_pertanyaan, 
				jp.bobot as bobot_jawaban, 
				jp.keterangan, 
				jp.jawaban 
			FROM 
				jawaban_pertanyaan jp 
			INNER JOIN 
				kriteria_pertanyaan kp ON kp.kp_id = jp.kp_id 
			WHERE 
				jp.jp_id = ".str_replace("-", " AND kp.kp_id = ", $params)
		);
	}
}

/* End of file HomeModel.php */
/* Location: ./application/models/HomeModel.php */
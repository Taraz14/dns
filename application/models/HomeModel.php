<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
class HomeModel extends CI_Model
{

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
		self::$db = &get_instance()->db;

		/**
		 * Set value varible $input
		 * @var array
		 */
		self::$input = &get_instance()->input;
	}

	/**
	 * Find Question
	 * 
	 * @param  array  $params 
	 * @return array
	 */
	public static function findQuestion(): array
	{
		return static::$db
			->select("kp.*, k.*")
			->from('kriteria_pertanyaan kp')
			->join('kriteria k', 'k.kriteria_id = kp.kriteria_id', 'inner')
			// ->group_by('kp.kriteria_id')
			->get()
			->result_array();
	}


	/**
	 * Find Question
	 * 
	 * @param  array  $params 
	 * @return array
	 */
	public static function findKriteria(): array
	{
		return static::$db
			->select('*')
			->from('kriteria')
			->get()
			->result_array();
	}

	/**
	 * Find Answer
	 * 
	 * @param  array  $kp_id 
	 * @return array
	 */
	public static function findAnswer(array $kp_id): array
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
				jp.jawaban, 
				a.alternatif_name 
			FROM 
				jawaban_pertanyaan jp 
			INNER JOIN 
				kriteria_pertanyaan kp ON kp.kp_id = jp.kp_id
			INNER JOIN
				alternatif a ON a.alternatif_id = jp.alternatif_id 
			WHERE 
				jp.jp_id = " . str_replace("-", " AND kp.kp_id = ", $params));
	}

	/**
	 * Set Data SPK
	 * 
	 * @param  array $data
	 * @return boolean
	 */
	public static function set(array $data): bool
	{
		return static::$db->insert_batch('responden', $data);
	}

	/**
	 * Show Data SPK
	 * 
	 * @param  array $data
	 * @return boolean
	 */
	public static function show(): array
	{
		return static::$db
			->select("r.*, kp.kp_id, kp.pertanyaan, kp.bobot as kpb")
			->from('responden r')
			->join('kriteria_pertanyaan kp', 'kp.kp_id = r.kp_id', 'inner')
			->where('r.created_at', time())
			// ->where('r.created_at', 1582982642)
			->get()
			->result_array();
	}

	public static function set_c($c)
	{
		return static::$db->insert('ksak', $c);
	}

	/**
	 * Find Answer
	 * 
	 * @param  array  $param 
	 * @return array
	 */
	public static function show_c(): array
	{
		return static::$db
			->select("
				max(c1) as c1,
				max(c2) as c2,
				max(c3) as c3, 
				max(c4) as c4, 
				max(c5) as c5,
				max(c6) as c6, 
				max(c7) as c7,
				max(c8) as c8,
				max(c9) as c9,
				max(c10) as c10,
				max(c11) as c11,
				max(c12) as c12,
				max(c13) as c13,
				max(c14) as c14,
				max(c15) as c15
			 ")
			->from("ksak")
			->get()
			->row_array();
	}

	public function count_all()
	{
		return $this->db->get('ksak')->num_rows();
	}

	protected $order = [
		'nama_ot',
		'name',
		'lastname',
		'alamat',
		'umur',
		'hasil',
		'bobot',
		'created_at'
	];

	private function setHistory()
	{
		$this->db->select('*')
			->from('responden');
		$this->db->group_by('created_at');

		if (isset($_GET['order'])) {
			$this->db->order_by($this->order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
		} else {
			$this->db->order_by('created_at', 'desc');
		}
	}

	public function getHistory()
	{
		$this->setHistory();
		if ($this->input->get('length') !== 1) {
			$this->db->limit($this->input->get('length'));
		}

		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->setHistory();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function hi_count_all()
	{
		$this->db->from('responden');
		return $this->db->count_all_results();
	}
}

/* End of file HomeModel.php */
/* Location: ./application/models/HomeModel.php */
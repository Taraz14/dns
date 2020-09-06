<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Homepage Class
 * 
 * Class untuk mengatur data alternatif
 *
 * @package     DNS
 * @subpackage  Controller
 * @category    Homepage
 * @author      Semarsite
 */
class Homepage extends CI_Controller
{

	/**
	 * Magic constructor
	 */
	public function __construct()
	{
		parent::__construct();
		/** Load model kriteria */
		$this->load->model('KriteriaModel');
		/** Load model Home */
		$this->load->model('HomeModel');
	}

	/**
	 * Default function Home Page
	 * 
	 * @return void
	 */
	public function index()
	{
		$valid = $this->form_validation;
		$valid->set_rules('name', 'Nama', 'trim|required');
		if (!$valid->run()) {
			return $this->pageHome();
		}

		return $this->createHasil();
	}


	/**
	 * Create Hasil function
	 * @param string
	 * @return void
	 */
	private function createHasil()
	{
		$get = $this->input->post();
		$kb = $get['kriteria_bobot'];
		$bobot = $get['bobot'];
		// var_dump($kb); echo '<br/><br/>'; var_dump($bobot);die();
		for ($i = 0; $i < count($kb); $i++) {
			$hasil[] = $kb[$i] * $bobot[$i] / 100 / 100;
		}

		$c = [
			'c1' => $get['bj'][0],
			'c2' => $get['bj'][1],
			'c3' => $get['bj'][2],
			'c4' => $get['bj'][3],
			'c5' => $get['bj'][4],
			'c6' => $get['bj'][5],
			'c7' => $get['bj'][6],
			'c8' => $get['bj'][7],
			'c9' => $get['bj'][8],
			'c10' => $get['bj'][9],
			'c11' => $get['bj'][10],
			'c12' => $get['bj'][11],
			'c13' => $get['bj'][12],
			'c14' => $get['bj'][13],
			'c15' => $get['bj'][14]
		];

		// KSAK
		if (!HomeModel::set_c($c)) {
			$this->session->set_flashdata('message', 'Data gagal diinputkan.');
			redirect('', 'refresh');
		}

		$tot = HomeModel::show_c();
		for ($r = 0; $r < count($bobot); $r++) {
			$h[$r] = $get['bj'][$r] / $tot['c' . ($r + 1)];
			$t[$r] = $h[$r] * $hasil[$r];
			// echo '<pre>', var_dump($tot), '</pre>';
		}

		// die();
		$hu = array_sum($t);
		$total = round($hu, 2);

		// echo '<pre>', var_dump($total), '</pre>';


		foreach ($get['kp_id'] as $key => $value) {

			$data[] = array(
				'kp_id' => $get['kp_id'][$key],
				'kriteria_id' => $get['kriteria_id'][$key],
				'nama_ot' => $get['ot'],
				'name' => $get['name'],
				'lastname' => $get['lastname'],
				'alamat' => $get['address'],
				'umur' => $get['umur'] . ' bulan',
				'hasil' => $hasil[$key],
				'bobot' => $get['bj'][$key],
				'total' => $total,
				'created_at' => time()
			);
		}

		// Responden
		if (!HomeModel::set($data)) {
			$this->session->set_flashdata('message', 'Data gagal diinputkan.');
			redirect('', 'refresh');
		}

		$cont = [
			'content' 	=> 'homepage/pages/hasil_spk',
			'title'    	=> 'Home',
			'nama_ot' => $get['ot'],
			'name' => $get['name'],
			'lastname' => $get['lastname'],
			'alamat' => $get['address'],
			'bb' => $get['bb'],
			'tb' => $get['tb'],
			'umur' => $get['umur'] . ' bulan',
			'tlp' => $get['tlp'],
			'bobot' => $get['bj'],
			'hasil' => $hasil,
			'total' => $total,
			'ksak' 	=> HomeModel::show_c(),
			'count' => $this->HomeModel->count_all(),
			"quest" => HomeModel::show()
		];
		$this->load->view('homepage/layouts/wrapper', $cont);
	}

	/**
	 * Show Data
	 * 
	 * @return void
	 */
	private function showData()
	{
		$get = $this->input->post();
	}

	/**
	 * Page Home
	 * 
	 * @return void
	 */
	public function pageHome(): void
	{
		$data = [
			'content'  => 'homepage/pages/home_v',
			'title'    => 'Home',
			'kriteria' => KriteriaModel::findAll()
		];
		$this->load->view('homepage/layouts/wrapper', $data);
	}

	/**
	 * Get Pertanyaan berdasarkan kriteria
	 * 
	 * @return void
	 */
	public function getQuestion(): void
	{
		$view = $this->load->view("homepage/pages/question", [
			"content" => HomeModel::findQuestion()
		], TRUE);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode([
				"question" => $view
			]));
	}

	/**
	 * Get kriteria
	 * 
	 * @return void
	 */
	public function getKriteria(): void
	{
		$view = $this->load->view("homepage/pages/question", [
			"kriteria" => HomeModel::findKriteria()
		], TRUE);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode([
				"krit" => $view
			]));
	}

	/**
	 * Ambil Hasil Jawaban
	 * 
	 * @return void
	 */
	public function getHasil(): void
	{
		if (is_array($this->input->post('jawaban'))) {
			$count = count($this->input->post('jawaban'));
			$temp  = [];
			for ($i = 0; $i < $count; $i++) {
				$temp[] = HomeModel::findQuestionAndAnswer($this->input->post('jawaban')[$i])->row_array();
			}
		} else {
			$temp = HomeModel::findQuestionAndAnswer($this->input->post('jawaban'))->result_array();
		}
		$view = $this->load->view('homepage/pages/hasil', [
			'pertanyaan' => $temp,
			// 'kriteria'	 => HomeModel::findKriteria($this->input->post('kriteria_id')),
			'user' 		 => $this->input->post(),
		], TRUE);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode([
				"hasil" => $view
			]));
	}

	public function history()
	{
		$data = [
			'content' => 'homepage/pages/history',
			'title'    	=> 'Home',
		];

		$this->load->view('homepage/layouts/wrapper', $data, FALSE);
	}

	public function dataHistory()
	{
		$list = $this->HomeModel->getHistory();
		$data = [];
		$no = 1;
		foreach ($list as $val) {
			if ($val->total < 0.26) {
				$gizi = 'Gizi Buruk';
			} elseif ($val->total > 0.25 && $val->total < 0.61) {
				$gizi = 'Gizi Kurang';
			} elseif ($val->total > 0.60 && $val->total < 1.00) {
				$gizi = 'Gizi Baik';
			} elseif ($val->total >= 1.00) {
				$gizi = 'Gizi Lebih';
			}

			$tgl = date('d-m-Y', $val->created_at);
			$row = [];
			$row[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
			$row[] = htmlspecialchars($val->nama_ot, ENT_QUOTES, 'UTF-8');
			$row[] = htmlspecialchars($val->name . ' ' . $val->lastname, ENT_QUOTES, 'UTF-8');
			$row[] = htmlspecialchars($val->alamat, ENT_QUOTES, 'UTF-8');
			$row[] = htmlspecialchars($val->umur, ENT_QUOTES, 'UTF-8');
			$row[] = htmlspecialchars($val->total, ENT_QUOTES, 'UTF-8');
			$row[] = htmlspecialchars($gizi, ENT_QUOTES, 'UTF-8');
			$row[] = htmlspecialchars($tgl, ENT_QUOTES, 'UTF-8');
			array_push($data, $row);
		}

		$output['draw']	= intval($this->input->get('draw'));
		$output['recordtotalal'] = $this->HomeModel->hi_count_all();
		$output['recordsFiltered'] = $this->HomeModel->count_filtered();
		$output['data'] = $data;

		echo json_encode($output);
	}
}

/* End of file Homepage.php */

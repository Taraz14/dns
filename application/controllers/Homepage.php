<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
class Homepage extends CI_Controller {

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
	  	$valid->set_rules('name','Nama','trim|required');
	  	if(!$valid->run()) {
		 	return $this->pageHome();
	  	}

	 	return $this->createHasil();
   	}

   /**
	* Create Hasil function
	* 
	*/
   private function createHasil()
   {
	  var_dump($this->input->post());die();
   }

	/**
	 * Page Home
	 * 
	 * @return void
	 */
	public function pageHome() : void
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
	public function getQuestion() : void
	{
		$view = $this->load->view("homepage/pages/question",[
			"content" => HomeModel::findQuestion(["kriteria_id" => (int) $this->input->get('id')])
		],TRUE);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode([
				"question" => $view
			])
		);
	}

	/**
	 * Ambil Hasil Jawaban
	 * 
	 * @return void
	 */
	public function getHasil() : void
	{
		if(is_array($this->input->post('jawaban'))) {
			$count = count($this->input->post('jawaban'));
			$temp  = [];
			for ($i=0; $i < $count; $i++) { 
				$temp[] = HomeModel::findQuestionAndAnswer($this->input->post('jawaban')[$i])->row_array();
			}
		}else{
			$temp = HomeModel::findQuestionAndAnswer($this->input->post('jawaban'))->result_array();
		}
		$view = $this->load->view('homepage/pages/hasil',[
			'pertanyaan' => $temp,
			// 'kriteria'	 => HomeModel::findKriteria($this->input->post('kriteria_id')),
			'user' 		 => $this->input->post(), 
		],TRUE);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode([
				"hasil" => $view
			])
		);
	}
}

/* End of file Homepage.php */

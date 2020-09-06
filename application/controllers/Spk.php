<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Spk Class
 * 
 * Class untuk mengatur data alternatif
 *
 * @package     DNS
 * @subpackage  Controller
 * @category    Spk
 * @author      Semarsite
 */
class Spk extends CI_Controller {
   /**
	* Magic constructor
	*/
   public function __construct()
   {
      parent::__construct();
      // /** Load model kriteria */
      // $this->load->model('KriteriaModel');
      // /** Load model Home */
      // $this->load->model('HomeModel');
   }

   /**
	* Default function Home Page
	* 
	* @return void
	*/
   public function index(){
		$input = $this->input->post();
		// var_dump($input['hu']);die();
		$data = [
			'content' => 'homepage/pages/spk_print',
			'title'    => 'Print',
			'nama' => $input['nama'].' '.$input['lastnama'],
			'nama_ot' => $input['nama_ot'],
			'umur' => $input['umur'],
			'bb' => $input['bb'],
			'tb' => $input['tb'],
			'tlp' => $input['tlp'],
			'quest' => $input['pertanyaan'],
			'kpb' => $input['kpb'],
			'bobot' => $input['bobot'],
			'hasil' => $input['hasil'],
			'hu' => $input['hu'],
			'tot' => $input['tot'],
			'gizi' => $input['gizi']
		];
		// var_dump($input['hu']);
		$this->load->view('homepage/layouts/header_script.php', $data);
		// $this->load->view('homepage/layouts/navbar.php', $data);
		$this->load->view('homepage/layouts/content.php', $data);
		// $this->load->view('homepage/layouts/footer.php', $data);
		$this->load->view('homepage/layouts/end_script.php', $data);
   }

}

/* End of file Spk.php */

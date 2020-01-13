<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Alternatif Class
 * 
 * Class untuk mengatur alternatif data
 *
 * @package		DNS
 * @subpackage	Controller
 * @category	Alternatif
 * @author  	Semar Site
 */
class Alternatif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		/** apakah admin sudah login ? */
		$this->isSingIn();

		/** Load model alternatif */
		$this->load->model('AlternatifModel');
	}

	/**
	 * Default Function Alternatif
	 * 
	 * @return void
	 */
	public function index()
	{
		$this->load->view('admin/layouts/wrapper', [
			'content'    => 'admin/pages/alternatif/home',
			'title'      => 'Alternatif',
			'alternatif' => AlternatifModel::findAll()
		]);
	}

	/**
	 * Create Function
	 * 
	 */
	public function create()
	{
		$valid = $this->form_validation;
		$valid->set_rules('name','Nama Alternatif','trim|required|max_length[255]',[
			"required"   => '%s tidak boleh dikosongkan',
			"max_length" => '%s maximal karakter adalah 255',
		]);
		if(!$valid->run()) {
			return $this->pageCreate();
		}
		$this->createAction();
	}

	/**
	 * Page Create
	 * 
	 * @return void
	 */
	private function pageCreate() : void
	{
		$this->load->view('admin/layouts/wrapper', [
			'content'  => 'admin/pages/alternatif/create',
			'title'    => 'Alternatif'
		]);
	}

	/**
	 * Action Create Alternatif
	 * 
	 * @return void
	 */
	private function createAction()
	{
		$attributes = [
			"alternatif_name"  => $this->input->post('name'),
			"created_at"	 => time()
		];

		if(!AlternatifModel::set($attributes)) {
			$this->session->set_flashdata('message', 'Data gagal diinputkan.');
			redirect('0/alternatif','refresh');
		}

		$this->session->set_flashdata('message', 'Data berhasil diinputkan.');
		redirect('0/alternatif','refresh');
	}

	/**
	 * Update Function
	 * 
	 */
	public function update(int $id)
	{
		$data = AlternatifModel::show(["alternatif_id" => $id]);
		if($data->num_rows() !== 1) {
			$this->session->set_flashdata('message', 'Data tidak ditemukan.');
			redirect('0/alternatif','refresh');
		}
		return $this->validUpdate($data->row_array());
	}

	/**
	 * Update validation
	 * 
	 * @return void
	 */
	private function validUpdate(array $data)
	{
		$valid = $this->form_validation;
		$valid->set_rules('name','Nama Alternatif','trim|required|max_length[255]',[
			"required"   => '%s tidak boleh dikosongkan',
			"max_length" => '%s maximal karakter adalah 255',
		]);
		if(!$valid->run()) {
			return $this->pageUpdate($data);
		}
		$this->updateAction($data['alternatif_id']);
	}

	/**
	 * Page Create
	 * 
	 * @return void
	 */
	private function pageUpdate(array $data) : void
	{
		$this->load->view('admin/layouts/wrapper', [
			'content'  => 'admin/pages/alternatif/update',
			'title'    => 'Alternatif',
			'alternatif' => $data
		]);
	}

	/**
	 * Action Update Alternatif
	 * 
	 * @return void
	 */
	private function updateAction(int $id)
	{
		$attributes = [
			"alternatif_name"  => $this->input->post('name')
		];
		$params = [
			"alternatif_id" => $id
		];
		if(!AlternatifModel::update($attributes, $params)) {
			$this->session->set_flashdata('message', 'Data gagal diubah.');
			redirect('0/alternatif','refresh');
		}

		$this->session->set_flashdata('message', 'Data berhasil diubah.');
		redirect('0/alternatif','refresh');
	}

	/**
	 * Delete alternatif
	 * 
	 * @return json
	 */
	public function delete()
	{
		if(empty($this->input->get('id'))) {
			return $this->jsonOutput(false, "Data gagal dihapus.");
		}
		$params = [
			"alternatif_id" => $this->input->get('id')
		];
		if(!AlternatifModel::delete($params)) {
			return $this->jsonOutput(false, "Data gagal dihapus.");
		}
		$this->session->set_flashdata('message', 'Data berhasil dihapus.');
		return $this->jsonOutput(true, "Data berhasil dihapus.");
	}

	/**
	 * Set Output json
	 * 
	 * @param  bool   $status  
	 * @param  string $message 
	 * @return void
	 */
	private function jsonOutput(bool $status, string $message) : void
	{
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode([
				"status"  => $status,
				"message" => $message 
			]));
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

/* End of file Alternatif.php */
/* Location: ./application/controllers/admin/Alternatif.php */
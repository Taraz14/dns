<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Kriteria Class
 * 
 * Class untuk mengatur authentikasi admin 
 *
 * @package		DNS
 * @subpackage	Controller
 * @category	Kriteria
 * @author  	Semar Site
 */
class Kriteria extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		/** apakah admin sudah login ? */
		$this->isSingIn();

		/** Load model kriteria */
		$this->load->model('KriteriaModel');
	}

	/**
	 * Default Function Kriteria
	 * 
	 * @return void
	 */
	public function index()
	{
		$this->load->view('admin/layouts/wrapper', [
			'content'  => 'admin/pages/kriteria/home',
			'title'    => 'Kriteria',
			'kriteria' => KriteriaModel::findAll()
		]);
	}

	/**
	 * Create Function
	 * 
	 */
	public function create()
	{
		$valid = $this->form_validation;
		$valid->set_rules('name', 'Nama Kriteria', 'trim|required|max_length[255]', [
			"required"   => '%s tidak boleh dikosongkan',
			"max_length" => '%s maximal karakter adalah 255',
		]);
		$valid->set_rules('bobot', 'Bobot Kriteria', 'trim|required|max_length[4]|numeric', [
			"required"   => '%s tidak boleh dikosongkan',
			"max_length" => '%s maximal karakter adalah 4 angka',
			"numeric" 	 => '%s hanya boleh diisi angka',
		]);
		if (!$valid->run()) {
			return $this->pageCreate();
		}
		$this->createAction();
	}

	/**
	 * Page Create
	 * 
	 * @return void
	 */
	private function pageCreate(): void
	{
		$this->load->view('admin/layouts/wrapper', [
			'content'  => 'admin/pages/kriteria/create',
			'title'    => 'Kriteria'
		]);
	}

	/**
	 * Action Create Kriteria
	 * 
	 * @return void
	 */
	private function createAction()
	{
		$attributes = [
			"kriteria_name"  => $this->input->post('name'),
			"kriteria_bobot" => $this->input->post('bobot'),
			"created_at"	 => time()
		];

		if (!KriteriaModel::set($attributes)) {
			$this->session->set_flashdata('message', 'Data gagal diinputkan.');
			redirect('0/kriteria', 'refresh');
		}

		$this->session->set_flashdata('message', 'Data berhasil diinputkan.');
		redirect('0/kriteria', 'refresh');
	}

	/**
	 * Update Function
	 * 
	 */
	public function update(int $id)
	{
		$data = KriteriaModel::show(["kriteria_id" => $id]);
		if ($data->num_rows() !== 1) {
			$this->session->set_flashdata('message', 'Data tidak ditemukan.');
			redirect('0/kriteria', 'refresh');
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
		$valid->set_rules('name', 'Nama Kriteria', 'trim|required|max_length[255]', [
			"required"   => '%s tidak boleh dikosongkan',
			"max_length" => '%s maximal karakter adalah 255',
		]);
		$valid->set_rules('bobot', 'Bobot Kriteria', 'trim|required|max_length[4]|numeric', [
			"required"   => '%s tidak boleh dikosongkan',
			"max_length" => '%s maximal karakter adalah 4 angka',
			"numeric" 	 => '%s hanya boleh diisi angka',
		]);
		if (!$valid->run()) {
			return $this->pageUpdate($data);
		}
		$this->updateAction($data['kriteria_id']);
	}

	/**
	 * Page Create
	 * 
	 * @return void
	 */
	private function pageUpdate(array $data): void
	{
		$this->load->view('admin/layouts/wrapper', [
			'content'  => 'admin/pages/kriteria/update',
			'title'    => 'Kriteria',
			'kriteria' => $data
		]);
	}

	/**
	 * Action Update Kriteria
	 * 
	 * @return void
	 */
	private function updateAction(int $id)
	{
		$attributes = [
			"kriteria_name"  => $this->input->post('name'),
			"kriteria_bobot" => $this->input->post('bobot')
		];
		$params = [
			"kriteria_id" => $id
		];
		if (!KriteriaModel::update($attributes, $params)) {
			$this->session->set_flashdata('message', 'Data gagal diubah.');
			redirect('0/kriteria', 'refresh');
		}

		$this->session->set_flashdata('message', 'Data berhasil diubah.');
		redirect('0/kriteria', 'refresh');
	}

	/**
	 * Delete kriteria
	 * 
	 * @return json
	 */
	public function delete()
	{
		if (empty($this->input->get('id'))) {
			return $this->jsonOutput(false, "Data gagal dihapus.");
		}
		$params = [
			"kriteria_id" => $this->input->get('id')
		];
		if (!KriteriaModel::delete($params)) {
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
	private function jsonOutput(bool $status, string $message): void
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
		if ($this->session->isLoggon && $this->session->isAdmin) {
			return true;
		}
		redirect('service/sign-out', 'refresh');
	}
}

/* End of file Kriteria.php */
/* Location: ./application/controllers/admin/Kriteria.php */
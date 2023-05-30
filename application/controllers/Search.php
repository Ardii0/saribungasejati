<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'form', 'html', 'slug', 'indonesian_date', 'text', 'main_helper']);
		$this->load->library(['template', 'session', 'form_validation']);
		$this->load->model('Main_model');
	}

	public function index()
	{
        $nama_produk = $this->input->post('nama_produk');

		$query = $this->db->query("SELECT * from produk where nama_produk = '$nama_produk' ORDER BY created_at ASC");
		$this->data['search'] = $query;
		$this->data['produk'] = $this->Main_model->get_data('produk')->result();
		$this->data['kontak'] = $this->Main_model->get_data('kontak')->row_array();
		
		$this->data['title'] = 'Search';
		$this->data['content'] = 'interface/home/home';
		$this->template->_render_page('layout/landingpagePanel', $this->data);
	}

	public function byname()
	{
        $nama_produk = $this->input->post('nama_produk');
        $this->data['hasil'] = $this->input->post('nama_produk');

		$query = $this->db->query("SELECT * from produk where nama_produk like '%$nama_produk%' ORDER BY created_at ASC")->result();
		$this->data['search'] = $query;
		$this->data['produk'] = $this->Main_model->get_data('produk')->result();
		$this->data['kontak'] = $this->Main_model->get_data('kontak')->row_array();
		
		$this->data['title'] = 'Search';
		$this->data['content'] = 'interface/search/index';
		$this->template->_render_page('layout/landingpagePanel', $this->data);
	}
}
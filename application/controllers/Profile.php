<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'form', 'html', 'main_helper']);
		$this->load->library(['template', 'session', 'form_validation']);
		$this->load->model(['Auth_model', 'Main_model']);
		if ($this->session->userdata('is_Logged') == FALSE) {
			redirect('auth/login', 'refresh');
		}
	}

	public function index()
	{
		$where = array('id_user' => $this->session->userdata('id_user'));
		$this->data['user'] = $this->Main_model->where_data($where, 'users')->row_array();
		$user = $this->Main_model->where_data($where, 'users')->row_array();
		$this->data['foto'] = array(
			'id'    => 'foto',
			'name'  => 'foto',
			'type'  => 'file',
			'value' => $this->form_validation->set_value('foto', $user['foto']),
		);

		$this->data['content'] = 'auth/profile';
		$this->template->_render_page('layout/landingpagePanel', $this->data);
	}
	
	public function upload_foto()
	{
		$where = array('id_user' => $this->session->userdata('id_user'));
		$user = $this->Main_model->where_data($where, 'users')->row_array();
		$data = [];
		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']          = './uploads/foto-profil/';
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['max_size']             = 2000000;
			$config['file_name']            = $_FILES['foto']['name'];

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('profile', 'refresh');
			} else {
				$image_data = $this->upload->data();
				$data['foto'] = $image_data['file_name'];
				if ($this->Main_model->update_data($where, $data, 'users')) {
					if (!empty($user['foto'])) {
						unlink('./uploads/foto-profil/' . $user['foto']);
					}
					$this->session->set_flashdata('success', 'Foto berhasil diubah!');
					redirect('profile', 'refresh');
				}
			}
		} else {
			if ($this->Main_model->update_data($where, $data, 'user')) {
				$this->session->set_flashdata('success', 'Data berhasil diubah!');
				redirect('user', 'refresh');
			}
		}
	}

// Alamat
    public function alamat()
    {
		$where = array('id_user' => $this->session->userdata('id_user'));
		$data = $this->Main_model->where_data($where, 'alamat')->row_array();
		$this->data['data'] = $this->Main_model->where_data($where, 'alamat')->row_array();

        $this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'trim|required');
        $this->form_validation->set_rules('nomor_hp', 'No HP', 'trim|required');
        $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['nama_penerima'] = array(
                'id'    => 'nama_penerima',
                'name'  => 'nama_penerima',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('nama_penerima', $data['nama_penerima']),
            );
            $this->data['nomor_hp'] = array(
                'id'    => 'nomor_hp',
                'name'  => 'nomor_hp',
                'type'  => 'number',
                'value' => $this->form_validation->set_value('nomor_hp', $data['nomor_hp']),
            );
            $this->data['kota'] = array(
                'id'    => 'kota',
                'name'  => 'kota',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('kota', $data['kota']),
            );
            $this->data['alamat'] = array(
                'name'  => 'alamat',
                'value' => $this->form_validation->set_value('alamat', $data['alamat']),
            );
            $this->data['kode_pos'] = array(
                'id'    => 'kode_pos',
                'name'  => 'kode_pos',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('kode_pos', $data['kode_pos']),
            );
            $this->data['content'] = 'auth/alamat';
            $this->template->_render_page('layout/landingpagePanel', $this->data);
        } else {
            $nama_penerima = $this->input->post('nama_penerima', true);
            $nomor_hp = $this->input->post('nomor_hp', true);
            $kota = $this->input->post('kota', true);
            $alamat = $this->input->post('alamat', true);
            $kode_pos = $this->input->post('kode_pos', true);
            $data = [
                'id_user'   		=> $this->session->userdata('id_user'),
                'nama_penerima'   	=> $nama_penerima,
                'nomor_hp'         	=> $nomor_hp,
                'kota'     			=> $kota,
                'alamat'         	=> $alamat,
                'kode_pos'         	=> $kode_pos,
            ];
			if ($this->Main_model->insert_data($data, 'alamat')) {
				$this->session->set_flashdata('success', 'Alamat berhasil ditambahkan!');
				redirect('profile', 'refresh');
			}
        }
    }
	
    public function update_alamat()
    {
		$where = array('id_user' => $this->session->userdata('id_user'));
		$nama_penerima = $this->input->post('nama_penerima', true);
		$nomor_hp = $this->input->post('nomor_hp', true);
		$kota = $this->input->post('kota', true);
		$alamat = $this->input->post('alamat', true);
		$kode_pos = $this->input->post('kode_pos', true);
		$data = [
			'nama_penerima'   	=> $nama_penerima,
			'nomor_hp'         	=> $nomor_hp,
			'kota'     			=> $kota,
			'alamat'         	=> $alamat,
			'kode_pos'         	=> $kode_pos,
		];
		if ($this->Main_model->update_data($where, $data, 'alamat')) {
			$this->session->set_flashdata('success', 'Alamat berhasil diubah!');
			redirect('profile', 'refresh');
		}
	}
	
// History
	public function history()
	{
		$where = array('id_user' => $this->session->userdata('id_user'));
		$this->data['history'] = $this->Main_model->where_data($where, 'pembayaran')->result();

		$this->data['content'] = 'interface/history_pembayaran/index';
		$this->template->_render_page('layout/landingpagePanel', $this->data);
	}
}

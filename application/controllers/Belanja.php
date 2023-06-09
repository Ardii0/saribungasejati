<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'form', 'html', 'main_helper']);
		$this->load->library(['template', 'session', 'form_validation']);
		$this->load->model(['Auth_model', 'Main_model']);
        $this->kontak();
	}

	public function detail($id)
	{
        $where = array('id_produk' => $id);
        $row = $this->Main_model->where_data($where, 'produk')->row_array();
        $this->data['produk'] = $this->Main_model->where_data($where, 'produk')->row_array();
        if (isset($row['id_produk'])) {
            $this->data['nama_produk'] = array(
                'id'    => 'nama_produk',
                'name'  => 'nama_produk',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('nama_produk', $row['nama_produk']),
            );
            $this->data['foto'] = array(
                'id'    => 'foto',
                'name'  => 'foto',
                'type'  => 'file',
                'value' => $this->form_validation->set_value('foto', $row['foto']),
            );
            $this->data['id_produk'] = array(
                'id'    => 'id_produk',
                'name'  => 'id_produk',
                'value' => $this->form_validation->set_value('id_produk', $row['id_produk']),
            );
            $this->data['jumlah'] = array(
                'id'    => 'jumlah',
                'name'  => 'jumlah',
                'type'  => 'number',
                'value' => 1,
            );
            $this->data['content'] = 'interface/detail_produk/detail';
            $this->template->_render_page('layout/landingpagePanel', $this->data);
        }
	}


    public function belanja_add()
    {
        $where = array('id_user' => $this->session->userdata('id_user'));
        $this->Main_model->delete_data($where, 'beli_langsung');
        $jumlah = $this->input->post('jumlah', true);
        $id_produk = $this->input->post('id_produk', true);
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_produk' => $id_produk,
            'jumlah' => $jumlah,
        ];
        $this->Main_model->insert_data($data, 'beli_langsung');
        redirect(base_url('belanja/bayar'));
    }

// Bayar
    public function bayar()
    {
        $where = array('id_produk' => $this->Main_model->getone());
        $row = $this->Main_model->where_data($where, 'produk')->row_array();
        $bayarow = $this->Main_model->where_data(array('id_produk' => $this->Main_model->getone()), 'beli_langsung')->row_array();
        $this->data['produk'] = $this->Main_model->where_data($where, 'produk')->row_array();
        $this->data['bayar'] = $bayarow;
        $this->data['alamat'] = $this->Main_model->where_data(array('id_user' => $this->session->userdata('id_user')), 'alamat')->row_array();
        if (isset($row['id_produk']) || isset($row['id_user'])) {
            $this->data['nama_produk'] = array(
                'id'    => 'nama_produk',
                'name'  => 'nama_produk',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('nama_produk', $row['nama_produk']),
            );
            $this->data['foto'] = array(
                'id'    => 'foto',
                'name'  => 'foto',
                'type'  => 'file',
                'value' => $this->form_validation->set_value('foto', $row['foto']),
            );
            $this->data['jumlah'] = array(
                'id'    => 'jumlah',
                'name'  => 'jumlah',
                'type'  => 'number',
                'value' => $this->form_validation->set_value('jumlah', $bayarow['jumlah']),
            );
            $this->data['subtotal'] = array(
                'id'    => 'subtotal',
                'name'  => 'subtotal',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('subtotal'),
            );
            $this->data['bukti_pembayaran'] = array(
                'id'    => 'bukti_pembayaran',
                'name'  => 'bukti_pembayaran',
                'type'  => 'file',
                'value' => $this->form_validation->set_value('bukti_pembayaran'),
            );
            $this->data['id_produk'] = array(
                'id'    => 'id_produk',
                'name'  => 'id_produk',
                'value' => $this->form_validation->set_value('id_produk', $row['id_produk']),
            );
            $this->data['additional_head'] = '<link rel="stylesheet" href="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/css/bootstrap-select.css" />
                                              <link rel="stylesheet" href="' . base_url() . 'assets/landing-page/css/detail_produk.css" />';
            $this->data['additional_body'] = '<script src="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/js/bootstrap-select.js"></script>';
            $this->data['content'] = 'interface/produk/bayar/detail';
            $this->template->_render_page('layout/landingpagePanel', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Pastikan Anda Memilih Barang Terlebih Dahulu');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
    public function pembayaran()
    {
        $id_produk = $this->input->post('id_produk', true);
        $id_alamat = $this->input->post('id_alamat', true);
        $jumlah = $this->input->post('jumlah', true);
        $subtotal = $this->Main_model->subtotal($id_produk)*$jumlah;
        $data = [
            'kode_pembayaran'   => date('ymd').$this->randomize(8),
            'id_produk'     	=> $id_produk,
            'id_user'     	    => $this->session->userdata('id_user'),
            'jumlah'     	    => $jumlah,
            'subtotal'     	    => $subtotal,
            'id_alamat'     	=> $id_alamat,
            'date'       	    => date('y-m-d'),
        ];
        $stok = [
            'stok'   => $this->input->post('sisa', true),
        ];
        if (!empty($_FILES['bukti_pembayaran']['name'])) {
            $config['upload_path']          = './uploads/bukti_pembayaran/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 2000000;
            $config['max_width']            = 3600;
            $config['max_height']           = 3600;
            $config['file_name']            = $_FILES['bukti_pembayaran']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti_pembayaran')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('belanja/bayar', 'refresh');
            } else {
                $image_data = $this->upload->data();
                $data['bukti_pembayaran'] = $image_data['file_name'];
                if ($this->Main_model->insert_data($data, 'pembayaran')) {
                    $this->Main_model->update_data(array('id_produk' => $id_produk), $stok, 'produk');
                    $this->Main_model->delete_data(array('id_user' => $this->session->userdata('id_user')), 'beli_langsung');
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                    redirect('', 'refresh');
                }
            }
        } else {
            if ($this->Main_model->insert_data($data, 'pembayaran')) {
                $this->Main_model->update_data(array('id_produk' => $id_produk), $stok, 'produk');
                $this->Main_model->delete_data(array('id_user' => $this->session->userdata('id_user')), 'beli_langsung');
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                redirect('', 'refresh');
            }
        }
    }
    

// Other Stuff
	public function kontak()
	{
		$this->data['kontak'] = $this->Main_model->get_data('kontak')->row_array();
	}

	public function randomize($long)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0987654321';
		$string = '';
		for ($i=0; $i < $long; $i++) { 			
			$pos = rand(0, strlen($char)-1);
			$string .= $char[$pos];
		}
		return $string;
	}

}

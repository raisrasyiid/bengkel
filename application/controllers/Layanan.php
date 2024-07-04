<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Model_auth');
    }

    public function index(){
        $data['layanan'] = $this->Model_auth->get_all_data('layanan')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layanan/tampilLayanan', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add(){
        $this->load->view('admin/layout/header');
		$this->load->view('admin/layanan/tambahLayanan');
		$this->load->view('admin/layout/footer');
    }

    public function save(){
        $idServices = $this->input->post('id_layanan');
        $Snama = $this->input->post('nama_layanan');
        $Sdeskripsi = $this->input->post('deskripsi_layanan');
        $Sharga = $this->input->post('harga_layanan');
        $config['upload_path'] = './assets/foto_layanan/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto_layanan')){
            $data_file = $this->upload->data();
            $data_insert=array(
                               'id_layanan' => $id_layanan,
                               'nama_layanan' => $Snama,
                               'foto_layanan' => $data_file['file_name'],
                               'deskripsi_layanan' => $Sdeskripsi,
                               'harga_layanan' => $Sharga);
            $this->Model_auth->insert('layanan', $data_insert);
            redirect('layanan');
        } else {
            redirect('layanan/add');
        }
    }

    public function get_by_id($id){
        $data['id_layanan'] = $id;
        $dataWhere = array('id_layanan' => $id);
        $data['layanan'] = $this->Model_auth->get_by_id('layanan', $dataWhere)->row_object();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layanan/editLayanan', $data);
		$this->load->view('admin/layout/footer');
    }

    public function edit($id_layanan){
        $data['layanan'] = $this->Model_auth->get_by_id('layanan', array('id_layanan' => $id_layanan))->row();
        $Snama = $this->input->post('nama_layanan');
        $Sdeskripsi = $this->input->post('deskripsi_layanan');
        $Sharga = $this->input->post('harga_layanan');
        $gambar_lama = $this->input->post('gambar_lama'); // Mendapatkan nama gambar yang sudah ada
        
        $config['upload_path'] = './assets/foto_layanan/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 1000; // kilobytes
        $this->load->library('upload', $config);
    
        // Inisialisasi $gambar_baru
        $gambar_baru = NULL;
    
        // Jika ada file yang diunggah
        if(!empty($_FILES['foto_layanan']['name'])) {
            if($this->upload->do_upload('foto_layanan')){
                $data_file = $this->upload->data();
                $gambar_baru = $data_file['file_name'];
            } else {
                // Penanganan jika gagal mengunggah gambar baru
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('layanan/get_by_id/'.$id_layanan);
            }
        } else {
            // Jika tidak ada file yang diunggah, gunakan gambar lama
            $gambar_baru = $gambar_lama;
        }
        
        $dataUpdate= array(
            'nama_layanan' => $Snama,
            'foto_layanan' => $gambar_baru ? $gambar_baru : $gambar_lama,
            'deskripsi_layanan' => $Sdeskripsi,
            'harga_layanan' => $Sharga
        );
    
        $this->Model_auth->update('layanan', $dataUpdate, 'id_layanan', $id_layanan);
        $this->session->set_flashdata('success', 'Layanan berhasil diupdate.');
        redirect('layanan');
    }
    

    public function delete($id){
        $this->Model_auth->delete('layanan', 'id_layanan', $id);
        redirect('layanan');
    }
}
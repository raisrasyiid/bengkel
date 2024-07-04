<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Model_auth');
    }

    public function index(){
        $data['gallery'] = $this->Model_auth->get_all_data('gallery')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/gallery/tampilGallery', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add(){
        $this->load->view('admin/layout/header');
		$this->load->view('admin/gallery/tambahGallery');
		$this->load->view('admin/layout/footer');
    }

    public function save(){
        $idServices = $this->input->post('id_gallery');
        $Snama = $this->input->post('nama_gallery');
        $Sdeskripsi = $this->input->post('deskripsi_gallery');
        $config['upload_path'] = './assets/foto_gallery/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto_gallery')){
            $data_file = $this->upload->data();
            $data_insert=array(
                'id_gallery' => $id_gallery,
                'nama_gallery' => $Snama,
                'foto_gallery' => $data_file['file_name'],
                'deskripsi_gallery' => $Sdeskripsi,
            );
            $this->Model_auth->insert('gallery', $data_insert);
            redirect('gallery');
        } else {
            redirect('gallery/add');
        }
    }

    public function get_by_id($id){
        $data['id_gallery'] = $id;
        $dataWhere = array('id_gallery' => $id);
        $data['gallery'] = $this->Model_auth->get_by_id('gallery', $dataWhere)->row_object();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/gallery/editGallery', $data);
		$this->load->view('admin/layout/footer');
    }

    public function edit($id_gallery){
        $data['gallery'] = $this->Model_auth->get_by_id('gallery', array('id_gallery' => $id_gallery))->row();
        $Snama = $this->input->post('nama_gallery');
        $Sdeskripsi = $this->input->post('deskripsi_gallery');
        $gambar_lama = $this->input->post('gambar_lama'); 
        
        $config['upload_path'] = './assets/foto_gallery/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 1000; 
        $this->load->library('upload', $config);
    
        $gambar_baru = NULL;
    
        if(!empty($_FILES['foto_gallery']['name'])) {
            if($this->upload->do_upload('foto_gallery')){
                $data_file = $this->upload->data();
                $gambar_baru = $data_file['file_name'];
            } else {
                // Penanganan jika gagal mengunggah gambar baru
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('gallery/get_by_id/'.$id_gallery);
            }
        } else {
            // Jika tidak ada file yang diunggah, gunakan gambar lama
            $gambar_baru = $gambar_lama;
        }
        
        $dataUpdate= array(
            'nama_gallery' => $Snama,
            'deskripsi_gallery' => $Sdeskripsi,
            'foto_gallery' => $gambar_baru ? $gambar_baru : $gambar_lama,
        );
    
        $this->Model_auth->update('gallery', $dataUpdate, 'id_gallery', $id_gallery);
        $this->session->set_flashdata('success', 'gallery berhasil diupdate.');
        redirect('gallery');
    }
    

    public function delete($id){
        $this->Model_auth->delete('gallery', 'id_gallery', $id);
        redirect('gallery');
    }
}
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

    public function delete($id){
        $this->Madmin->delete('tbl_customer', 'idCustomer', $id);
        redirect('user');
    }
}
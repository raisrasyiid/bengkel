<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Model_auth');
    }

    public function index(){
        $data['users'] = $this->Model_auth->get_all_data('users')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/user/tampilUser', $data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id){
        $this->Model_auth->delete('users', 'id_user', $id);
        redirect('user');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_auth');
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function login()
{
    $this->load->model('Model_auth');
    $data_session = array();
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Ambil data pengguna berdasarkan username
    $admin = $this->Model_auth->get_where('admin', array('username' => $username));

    if ($admin !== false) {
        $user = $admin[0]; // Mengambil baris pertama dari hasil query
        // Verifikasi password
        if (password_verify($password, $user->password)) {
            $data_session = array(
                'id_admin' => $user->id_admin,
                'username' => $user->username,
            );
            $this->session->set_userdata($data_session);
            redirect('admin/dashboard');
        } else {
            var_dump($user);
            die();
            $this->session->set_flashdata('error', 'Password salah.');
            redirect('admin');
        }
    } else {
        $this->session->set_flashdata('error', 'Username tidak ditemukan.');
        redirect('admin');
    }
}
    

    public function registerView() {
        $this->load->view('admin/register');
    }

    //logic register
    public function registerAccount() {
        $this->load->model('Model_auth');
        //validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password-confirm', 'Password Konfirmasi', 'required');
    
        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password_confirm = $this->input->post('password-confirm');
    
            // Cek apakah username sudah ada di database
            $existing_user = $this->Model_auth->get_where('admin', array('username' => $username));
    
            if ($existing_user) {
                $this->session->set_flashdata('error', 'Username sudah digunakan.');
                redirect('admin/registerView');
                return;
            }
    
            // Cek konfirmasi password
            if ($password != $password_confirm) {
                $this->session->set_flashdata('error', 'Password dan konfirmasi password tidak cocok.');
                redirect('admin/registerView');
                return;
            }
    
            // Hashing password 
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
            $data_input = array(
                'username' => $username,
                'password' => $password_hashed,
            );
                if($this->Model_auth->insertRegister('admin', $data_input)){
                    redirect('admin');
                }else{
                    redirect('admin/registerView');
                }
        }
    }

    public function dashboard() {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        } 
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/footer');
    }

    //logout
    public function logout(){
        $this->session->sess_destroy();
        redirect('admin');
    }

    //logout
    public function showTableUser(){
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        } 
        $this->load->view('admin/layout/header');
        $this->load->view('admin/user/tampilUser');
        $this->load->view('admin/layout/footer');
    }

    public function profile() {
        $id = $this->session->userdata('id_admin');
        if (empty($id)) {
            redirect('admin');
        }
        $dataWhere = array('id_admin' => $id);
        $data['admin'] = $this->Model_auth->get_by_id('admin', $dataWhere);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/layout/footer');
    }

    public function editProfile() {
        $id = $this->session->userdata('id_admin');
        if (empty($id)) {
            redirect('admin');
        }
        $dataWhere = array('id_admin' => $id);
        $data['admin'] = $this->Model_auth->get_by_id('admin', $dataWhere);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/editProfile', $data);
        $this->load->view('admin/layout/footer');
    }

    public function saveEditProfile() {
        $id = $this->session->userdata('id_admin');
        if (empty($id)) {
            redirect('admin');
        }
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password-confirm', 'Password Konfirmasi', 'required|matches[password]');
        
        if ($this->form_validation->run() == false) {
            $data['admin'] = $this->Model_auth->get_by_id('admin', array('id_admin' => $id));
            $this->load->view('admin/layout/header');
            $this->load->view('admin/profile', $data);
            $this->load->view('admin/layout/footer');
        } else {
            $id = $this->input->post('id_admin');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
        
            // Cek apakah username sudah ada di database, kecuali username saat ini
            $existing_user = $this->Model_auth->get_where('admin', array('username' => $username));
            if ($existing_user && $existing_user->id_admin != $id) {
                $this->session->set_flashdata('error', 'Username sudah digunakan.');
                redirect('admin/editProfile');
                return;
            }
        
            // Hashing password 
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
            $data_input = array(
                'username' => $username,
                'password' => $password_hashed,
            );
    
            $this->Model_auth->update('admin', $data_input, 'id_admin', $id);
                $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
                redirect('admin/profile');
        }
    }
    
    





}
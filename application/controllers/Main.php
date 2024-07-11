<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_auth');
        $this->load->library('form_validation');
    }

    public function index() {
        // Ambil username pengguna dari session
        $userId = $this->session->userdata('username');
        
        if ($userId) {
            $this->db->select('username, nama_user, no_hp_user');
            $this->db->from('users');
            $this->db->where('username', $userId);
            $user = $this->db->get()->row();
            $data['user'] = $user;
        } else {
            $data['user'] = null;
        }
    
        $data['feedback'] = $this->Model_auth->get_all_data('feedback')->result();
        $data['gallery'] = $this->Model_auth->get_all_data('gallery')->result();
        $data['layanan'] = $this->Model_auth->get_all_data('layanan')->result();
        $this->load->view('home/layout/header');
        $this->load->view('home/layout/menu', $data);
        $this->load->view('home/layout/footer');
    }
    
    
    public function viewLogin(){
        $this->load->view('home/login');
    }

    public function viewRegister(){
        $this->load->view('home/register');
    }

    public function login() {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password_user', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the login page with error messages
            $this->load->view('home/login');
        } else {
            $u = $this->input->post('username');
            $p = $this->input->post('password_user');
    
            // Cek login user dan ambil data pengguna
            $user = $this->Model_auth->cek_login_user($u, $p);
    
            if ($user) {
                $data_session = array(
                    'id_user' => $user->id_user, // Pastikan id_user diambil dari hasil query
                    'username' => $u,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                redirect('main');
            } else {
                $this->session->set_flashdata('error', 'Username or password is incorrect');
                redirect('main/viewLogin');
            }
        }
    }
    

    public function register() {
        // Load form validation library
        $this->load->library('form_validation');
            
        // Set validation rules
        $this->form_validation->set_rules('nama_user', 'nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password_user', 'Password', 'required');
        $this->form_validation->set_rules('email_user', 'Email', 'required');
        $this->form_validation->set_rules('no_hp_user', 'Phone Number', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the registration page with error messages
            $data['validation_errors'] = validation_errors('<div class="alert alert-danger">', '</div>');
            $this->load->view('home/register', $data);
        } else {
            $nama = $this->input->post('nama_user');
            $username = $this->input->post('username');
            $password = $this->input->post('password_user');
            $email = $this->input->post('email_user');
            $tlpn = $this->input->post('no_hp_user');

            $data_input = array(
                'nama_user' => $nama,
                'username' => $username,
                'password_user' => $password,
                'email_user' => $email,
                'no_hp_user' => $tlpn,
            );

            // Insert data into database
            $this->Model_auth->insert('users', $data_input);
            redirect('main/viewLogin');
        }
    }

    //logout
	public function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}

    public function profile(){
        $this->load->view('home/layout/header');
        $this->load->view('home/profile');
        $this->load->view('home/layout/footer');
    }

    


}
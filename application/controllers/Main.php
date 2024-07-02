<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Model_auth');
    }

    public function index() {
        $this->load->view('home/layout/header');
        $this->load->view('home/layout/menu');
        $this->load->view('home/layout/footer');
    }
}
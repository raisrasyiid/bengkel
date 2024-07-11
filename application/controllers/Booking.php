<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('Model_auth');
    }

    public function index(){
        $data['booking'] = $this->Model_auth->get_all_booking_data('booking');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/booking/tampilBooking', $data);
        $this->load->view('admin/layout/footer');
    }

    public function ubah_status($id){
        $dataWhere = array('id_book'=>$id);
        $result = $this->Model_auth->get_by_id('booking', $dataWhere)->row_object();
        $status = $result->status;

        if ($status == 'Menunggu'){
            $dataUpdate = array('status'=>"Berhasil");
        } else if($status=="Berhasil"){
            $dataUpdate = array('status'=>"Dibatalkan");
        }else{
            $dataUpdate = array('status'=> "Menunggu");
        }

        $this->Model_auth->update('booking', $dataUpdate, 'id_book', $id);
        redirect('booking');
    }

    public function reservasi(){
        $Btanggal = $this->input->post('tgl_book');
        $Bjam = $this->input->post('waktu_book');
        $keluhan = $this->input->post('keluhan');
        $userId = $this->session->userdata('username'); 
        
        // Ambil data customer berdasarkan username
        $customer = $this->db->get_where('users', array('username' => $userId))->row();
        
        // Pastikan data customer ditemukan
        if (!$customer) {
            show_error('Customer not found.', 404);
        }
    
        $data = array(
            'id_user' => $customer->id_user,
            'keluhan' => $keluhan,
            'tgl_book' => $Btanggal,
            'waktu_book' => $Bjam,
            'status' => 'Menunggu',
            'created_at' => date('Y-m-d H:i:s'),
        );

        // Simpan data ke tbl_booking
        if ($this->db->insert('booking', $data)) {
            $this->session->set_flashdata('success_message', 'Booking berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error_message', 'Terjadi kesalahan, booking gagal disimpan.');
        }
        
        // Debugging
        log_message('debug', 'Redirecting to main/profile with flashdata: ' . $this->session->flashdata('success_message'));

        redirect('main');
    }

    public function delete($id){
        $this->Model_auth->delete('booking', 'id_book', $id);
        redirect('booking');
    }
}
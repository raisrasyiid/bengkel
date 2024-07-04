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

    // public function delete($id){
    //     $this->Madmin->delete('tbl_customer', 'idCustomer', $id);
    //     redirect('user');
    // }
}
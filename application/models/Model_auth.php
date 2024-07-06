<?php
class Model_auth extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //login 
    public function cek_login_user($u, $p){
        $q = $this->db->get_where('users', array('username'=>$u, 'password_user'=>$p));
        return $q;
    }


    //get all data
    public function get_all_data($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }

    // insert register
    public function insertRegister($table, $data) {
        if ($this->db->insert($table, $data)) {
            return true;
        } else {
            return false;
        }
    }

    //insert data
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_where($table, $conditions)
{
    $this->db->where($conditions);
    $query = $this->db->get($table);

    if ($query->num_rows() > 0) {
        return $query->result(); // Mengembalikan semua baris yang ditemukan
    } else {
        return false; // Mengembalikan false jika tidak ada baris yang ditemukan
    }
}

    //get by id
    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }

    //delete data
    public function delete($tabel, $id, $val)
    {
        $this->db->delete($tabel, array($id => $val));
    }

    //update data
    public function update($table, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($table, $data);
    }

    #ambil data booking 
    public function get_all_booking_data() {
        $this->db->select('booking.*, users.nama_user as nama_user, users.no_hp_user as no_hp_user');
        $this->db->from('booking');
        $this->db->join('users', 'booking.id_user = users.id_user');
        $this->db->order_by('tgl_book', 'ASC'); // Order by date
        $query = $this->db->get();
        return $query->result();
    }

    #insert data booking
    // public function insert_data_booking() {
    //     $this->db->select('*');
    //     $this->db->from('tbl_booking');
    //     $this->db->join('tbl_customer', 'tbl_booking.idCustomer = tbl_customer.idCustomer');
    //     $query = $this->db->insert();
    //     return $query->result();
    // }
}
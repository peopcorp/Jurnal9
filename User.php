<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    public function Register() {
        // Nomor 5
        // Pastikan password yang di insert ke database sudah di enkripsi dengan MD5
        // Pastikan tanggal dan jam yang dimasukkan ke database sudah sesuai saat login
        $data = array(
            "Username" => "asd"
            "Email" => "asd@asd"
            "Pass" => 123
            "RegisTime" => 
        );
        // Panggil Fungsi isExist
        // Jika isExist mengembalikan True, maka Register return False
        // Jika tidak maka masukkan data ke database
        if() {
            return false;
        } else {
            // Masukkan data ke table Register
            $this->db->insert($this->Register, $data);
            // Masukkan data ke table login
            $this->db->insert($this->login, $data);
        }
    }

    public function isExist(USERNAME) {
        // Menerima masukkan Username yang akan dicek
        $this->db->from('login');
        $this->db->where('Username', $username);
        return $this->db->get()->row()
    }

    public function findUser() {
        // Nomor 7
        // Ambil data yang diinputkan user
        // Cari apakah data ada pada table login
        // Kembalikan hasil dari pencarian
        $this->db->where('Username', $username);
        $this->db->where('Username !=', $this->session->userdata('Username'));
        $query = $this->db->get('users', $data);
        $returnData = $query->result_array();
    }

    public function imageUpload($imgName) {
        $this->db->insert('image_path', array('ImgName' => $imgName));
    }

    public function getImage() {
        // Nomor 8
        // Mengambil data dari table 'image_path' dan mengembalikan data berupa array
        $this->db->where('image_path', $imgName);
        $query = $this->db->get('image_path');
        return $query->result_array();
    }
}
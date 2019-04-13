<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	public function Register()
	{
        // Nomor 4
        // Jika Password dan Re-Enter Password sama, maka:
        if($data['password'] = $pass){   
            // Panggil fungsi Register pada model User
            $this->load->model('User/Register', $data);
            if($this->form_validation->run() == true) {
                // Jika Berhasil Register
                // Buat Flashdata dan arahkan kembali ke Landing
                $insert = $this->user->insert($userData);
                $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                redirect('Landing');
            } else {
                // Jika gagal
                // Buat Flashdata dan arahkan kembali ke Landing/Register
                $data['error_msg'] = 'Some problems occured, please try again.';
                redirect('Landing/Register');
            }
        } else {
            // Jika Password berbeda
            // Buat flashdata
            // Arahkan kembali ke Landing/Register
            $data['error_msg'] = 'Wrong email or password, please try again.';
        }
    }

    public function Signin() {
        // Nomor 7
        // Panggil fungsi findUser
        $this->load->model('User/findUser', $data);
        // Jika User ditemukan
        if($data['cookie'] = $userData){
            // Jika rememberme dicentang
            if($$userData = array('username', 'password')) {
                // Buatkan cookie dengan isi username
                $this->session->setcookie('username');
                // Arahkan kembali ke Landing
                redirect('Landing');
            } else {
                // Buatkan session dengan isi username
                $this->session->input->post('username');
                // Arahkan kembali ke Landing
                redirect('Landing');
            }
        } else {
            // Jika data tidak ditemukan
            // maka buat flashdata yang menandakan data tidak ditemukan
            $data['error_msg'] = 'Data Tidak ditemukan';
        }
    }

    public function Logout() {
        $cookie = $this->input->cookie(NAMA_COOKIE);
        if(isset($cookie)) {
            delete_cookie(NAMA_COOKIE);
            redirect('Landing');
        } else {
            session_destroy();
            redirect('Landing');
        }
    }
}
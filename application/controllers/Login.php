<?php

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    function index()
    {
        $this->load->view('v_login');
    }

    function login_gagal()
    {
        $this->load->view('v_login_gagal');
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->M_login->cek_login("user_far", $where)->num_rows();
        if ($cek > 0) {

            $data_session = array(
                'nama' => $username,
                'status' => "Login"
            );

            $this->session->set_userdata($data_session);

            redirect(base_url("Obat"));
        } else {
            redirect(base_url("Login/login_gagal"));
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "Login") {
			redirect(base_url("Login"));
		}

		$this->load->helper('url');
		$this->load->model('M_user', 'user');
	}

    public function ur()
	{
		$this->load->view('v_user');
	}

    //ajax resep obat
	public function ajax_list_ur()
	{
		$list = $this->user->get_datatables_user();
		$data = array();
		$no = 1;
		foreach ($list as $user) {
			$row = array();
			$row[] = $no++;
			$row[] = $user->username;
			$row[] = $user->nama;
            $row[] = $user->role;
			$data[] = $row;
		}

		$output = array(
			// "draw" => $_POST['draw'],
			"recordsTotal" => $this->user->count_all_user(),
			"recordsFiltered" => $this->user->count_filtered_user(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

}

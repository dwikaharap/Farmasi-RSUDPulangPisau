<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResepObat extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "Login") {
			redirect(base_url("Login"));
		}

		$this->load->helper('url');
		$this->load->model('M_resep_obat', 'resep_obat');
	}

	public function ro()
	{
		$this->load->view('v_resep_obat');
	}

	//ajax resep obat
	public function ajax_list_ro()
	{
		$list = $this->resep_obat->get_datatables_resep_obat();
		$data = array();

		foreach ($list as $resep_obat) {
			$row = array();
			$row[] = $resep_obat->no_resep;
			$row[] = $resep_obat->no_rkm_medis;
			$row[] = $resep_obat->nm_pasien;
			$row[] = $resep_obat->nm_dokter;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" title="Detail" onclick="detail_resep(' . "'" . $resep_obat->no_resep . "'" . ')">Detail</a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->resep_obat->count_all_resep_obat(),
			"recordsFiltered" => $this->resep_obat->count_filtered_resep_obat(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
}

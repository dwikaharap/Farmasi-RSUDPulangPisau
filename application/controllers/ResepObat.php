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


	public function ajax_edit($id)
	{
		$data = $this->resep_obat->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'no_resep' => $this->input->post('no_resep'),
				'no_rkm_medis' => $this->input->post('no_rkm_medis'),
				'nm_pasien' => $this->input->post('nm_pasien'),
				'nm_dokter' => $this->input->post('nm_dokter'),
				'nm_poli' => $this->input->post('nm_poli'),
			);
		$this->resep_obat->update(array('no_resep' => $this->input->post('no_resep')), $data);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('no_resep') == '')
		{
			$data['inputerror'][] = 'no_resep';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('no_rkm_medis') == '')
		{
			$data['inputerror'][] = 'no_rkm_medis';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nm_poli') == '')
		{
			$data['inputerror'][] = 'nm_poli';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('nm_pasien') == '')
		{
			$data['inputerror'][] = 'nm_pasien';
			$data['error_string'][] = 'Please select nm_pasien';
			$data['status'] = FALSE;
		}

		if($this->input->post('nm_dokter') == '')
		{
			$data['inputerror'][] = 'nm_dokter';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


}

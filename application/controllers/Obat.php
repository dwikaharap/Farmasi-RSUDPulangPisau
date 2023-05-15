<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "Login") {
			redirect(base_url("Login"));
		}

		$this->load->helper('url');
		$this->load->model('M_obat', 'obat');
	}

	public function index()
	{
		$this->load->view('v_all');
	}

	public function ap()
	{
		$this->load->view('v_apotek');
	}

	public function far()
	{
		$this->load->view('v_far');
	}

	public function expired()
	{
		$this->load->view('v_expired');
	}

	public function obatkeluar()
	{
		$this->load->view('v_obatkeluar');
	}

	//ajax untuk pilihan semua
	public function ajax_list()
	{
		$list = $this->obat->get_datatables();
		$data = array();
		$tgl_skrng = date("Y-m-d");
		//$no = $_POST['start'];
		foreach ($list as $obat) {

			if (empty($obat->expire)) {
				$tgl_exp = "-";
			} elseif ($obat->expire == '0000-00-00') {
				$tgl_exp = "-";
			} /*elseif ($obat->expire <= $tgl_skrng) {
				$tgl_exp = '<p style="color:red">' . date("d-m-Y", strtotime($obat->expire));
				'</p>';
			} */ else {
				$tgl_exp = $obat->expire;
			}

			//$no++;
			$row = array();
			$row[] = $obat->kode_brng;
			$row[] = $obat->nama_brng;
			//$row[] = $obat->stok;
			//untuk number format awalnya urutan = "," lalu "."
			$row[] = number_format($obat->stok, 0, '.', ',');
			//$row[] = $obat->expire;
			$row[] = $tgl_exp;
			//$row[] = $obat->dasar*1.2;
			$row[] = number_format($obat->dasar * 1.2, 0, '.', ',');
			$row[] = $obat->nm_bangsal;


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->obat->count_all(),
			"recordsFiltered" => $this->obat->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	//ajax apotek
	public function ajax_list_ap()
	{
		$list = $this->obat->get_datatables_apotek();
		$data = array();
		//$no = $_POST['start'];
		foreach ($list as $obat) {

			if (empty($obat->expire)) {
				$tgl_exp = "-";
			} elseif ($obat->expire == '0000-00-00') {
				$tgl_exp = "-";
			} else {
				$tgl_exp = $obat->expire;
			}

			//$no++;
			$row = array();
			$row[] = $obat->kode_brng;
			$row[] = $obat->nama_brng;
			//$row[] = $obat->stok;
			//untuk number format awalnya urutan = "," lalu "."
			$row[] = number_format($obat->stok, 0, '.', ',');
			//$row[] = $obat->expire;
			$row[] = $tgl_exp;
			$row[] = number_format($obat->dasar * 1.2, 0, '.', ',');
			$row[] = $obat->nm_bangsal;


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->obat->count_all_apotek(),
			"recordsFiltered" => $this->obat->count_filtered_apotek(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	//ajax gudang farmasi
	public function ajax_list_far()
	{
		$list = $this->obat->get_datatables_far();
		$data = array();
		//$no = $_POST['start'];
		foreach ($list as $obat) {

			if (empty($obat->expire)) {
				$tgl_exp = "-";
			} elseif ($obat->expire == '0000-00-00') {
				$tgl_exp = "-";
			} else {
				$tgl_exp = $obat->expire;
			}

			//$no++;
			$row = array();
			$row[] = $obat->kode_brng;
			$row[] = $obat->nama_brng;
			//$row[] = $obat->stok;
			//untuk number format awalnya urutan = "," lalu "."
			$row[] = number_format($obat->stok, 0, '.', ',');
			//$row[] = $obat->expire;
			$row[] = $tgl_exp;
			$row[] = number_format($obat->dasar * 1.2, 0, '.', ',');
			$row[] = $obat->nm_bangsal;


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->obat->count_all_far(),
			"recordsFiltered" => $this->obat->count_filtered_far(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function rangeDates()
	{
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];

		$return = $this->ion_auth->rangeDate($start_date, $end_date);

		echo json_encode($return);
	}

	//ajax obat expired
	public function ajax_list_expired()
	{
		$list = $this->obat->get_datatables_expired();
		$data = array();
		//$no = $_POST['start'];
		foreach ($list as $obat) {

			if (empty($obat->expire)) {
				$tgl_exp = "-";
			} elseif ($obat->expire == '0000-00-00') {
				$tgl_exp = "-";
			} else {
				$tgl_exp = $obat->expire;
			}

			//$no++;
			$row = array();
			$row[] = $obat->kode_brng;
			$row[] = $obat->nama_brng;
			//$row[] = $obat->stok;
			//untuk number format awalnya urutan = "," lalu "."
			$row[] = number_format($obat->stok, 0, '.', ',');
			//$row[] = $obat->expire;
			$row[] = $tgl_exp;
			$row[] = number_format($obat->dasar * 1.2, 0, '.', ',');
			$row[] = $obat->nm_bangsal;


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->obat->count_all_expired(),
			"recordsFiltered" => $this->obat->count_filtered_expired(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	//ajax obat keluar
	public function ajax_list_obatkeluar()
	{
		$list = $this->obat->get_datatables_obatkeluar();
		$data = array();
		//$no = $_POST['start'];
		foreach ($list as $obat) {

			//$no++;
			$row = array();
			$row[] = $obat->kode_brng;
			$row[] = $obat->nama_brng;
			$row[] = date("m", strtotime($obat->tgl_perawatan));
			$row[] = date("Y", strtotime($obat->tgl_perawatan));
			$row[] = number_format($obat->jml);

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->obat->count_all_obatkeluar(),
			"recordsFiltered" => $this->obat->count_filtered_obatkeluar(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
}

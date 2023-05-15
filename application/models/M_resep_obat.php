<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_resep_obat extends CI_Model
{


    var $table = 'resep_obat';
    // URUTKAN BERSARKAN ASC / DESC
    var $column_order = array('resep_obat.no_resep', 'resep_obat.no_resep', 
    'resep_obat.tgl_peresepan',
    'pasien.no_rkm_medis', 'pasien.nm_pasien', 
    'dokter.nm_dokter', 'poliklinik.nm_poli');
    // URUTKAN BERSARKAN ASC / DESC
    var $column_search = array('resep_obat.no_resep', 'resep_obat.no_resep', 
    'resep_obat.tgl_peresepan',
    'pasien.no_rkm_medis', 'pasien.nm_pasien', 
    'dokter.nm_dokter', 'poliklinik.nm_poli');    
    var $order = array('resep_obat.tgl_peresepan' => 'DESC');
    


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('pagination');
    }


    //untuk resep obat
    private function _get_datatables_query_resep_obat()
    {
        $this->db->select('resep_obat.*, dokter.nm_dokter, poliklinik.nm_poli, pasien.no_rkm_medis, pasien.nm_pasien,');
        $this->db->from($this->table);
        $this->db->join('reg_periksa', 'resep_obat.no_rawat=reg_periksa.no_rawat');
        $this->db->join('pasien', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis');
        $this->db->join('poliklinik', 'reg_periksa.kd_poli=poliklinik.kd_poli');
        $this->db->join('dokter', 'resep_obat.kd_dokter=dokter.kd_dokter');
        
        // SEARCH BERDASARKAN column_search
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        
    }

    function get_datatables_resep_obat()
    {
        $this->_get_datatables_query_resep_obat();
        if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_resep_obat()
    {
        $this->_get_datatables_query_resep_obat();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_resep_obat()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // akhir untuk pilihan resep obat


}

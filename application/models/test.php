

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_resep extends CI_Model
{

    var $table = 'resep_obat';
    var $column_search = array('pasien.no_rkm_medis');

    public function __construct()
    {
        parent::__construct();
    }


    function get_all_resep_obat()
    {
        $this->db->select('resep_obat.*, dokter.nm_dokter, poliklinik.nm_poli, pasien.no_rkm_medis, pasien.nm_pasien,');
        $this->db->from('resep_obat');
        $this->db->join('reg_periksa', 'resep_obat.no_rawat=reg_periksa.no_rawat');
        $this->db->join('pasien', 'reg_periksa.no_rkm_medis=pasien.no_rkm_medis');
        $this->db->join('dokter', 'resep_obat.kd_dokter=dokter.kd_dokter');
        $this->db->join('poliklinik', 'reg_periksa.kd_poli=poliklinik.kd_poli');
        $this->db->where('resep_obat.tgl_peresepan', '2023-04-03');
        $this->db->order_by('resep_obat.tgl_peresepan DESC, resep_obat.jam_peresepan DESC');
        $query = $this->db->get();
    }
}

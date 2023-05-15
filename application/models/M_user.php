<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{


    var $table = 'user_far';
    var $column_order = array('user_far.username', 'user_far.nama', 'user_far.role'); //set column field database for datatable orderable
    var $column_search = array('user_far.username'); //set column field database for datatable searchable 
    var $order = array('user_far.username' => 'DESC');


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('pagination');
    }


    //untuk resep obat
    private function _get_datatables_query_user()
    {

        $this->db->select('user_far.*');
        $this->db->from($this->table);

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

    function get_datatables_user()
    {
        $this->_get_datatables_query_user();
        if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_user()
    {
        $this->_get_datatables_query_user();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_user()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // akhir untuk pilihan resep obat


}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_obat extends CI_Model
{

    var $table = 'databarang';
    var $column_order = array('kode_brng', 'nama_brng', 'gudangbarang.stok', 'expire', 'dasar', 'bangsal.nm_bangsal'); //set column field database for datatable orderable
    var $column_search = array('nama_brng'); //set column field database for datatable searchable 
    var $order = array('nama_brng' => 'ASC'); // default order 

    //obat keluar
    var $table_ok = 'databarang';
    var $column_order_ok = array(
        'databarang.kode_brng', 'nama_brng', 'detail_pemberian_obat.tgl_perawatan', 'detail_pemberian_obat.tgl_perawatan', 'detail_pemberian_obat.jml'
    );
    var $column_search_ok = array('nama_brng');
    var $order_ok = array(
        'nama_brng' => 'ASC'
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //untuk semua
        private function _get_datatables_query()
        {
            $this->db->select('databarang.kode_brng, databarang.nama_brng, gudangbarang.stok, 
                            databarang.expire, databarang.dasar, bangsal.nm_bangsal, databarang.status');
            $this->db->from($this->table);
            $this->db->join('gudangbarang', 'databarang.kode_brng=gudangbarang.kode_brng', 'LEFT');
            $this->db->join('bangsal', 'gudangbarang.kd_bangsal=bangsal.kd_bangsal', 'LEFT');
            $this->db->where('databarang.kode_brng >=', 'B000008011');
            $this->db->where('databarang.status', '1');
            //$this->db->where("(bangsal.kd_bangsal='AP' OR bangsal.kd_bangsal='Far1')", NULL, FALSE);
            $this->db->group_start();
            $this->db->or_where('bangsal.kd_bangsal', 'AP');
            $this->db->or_where('bangsal.kd_bangsal', 'Far1');
            $this->db->group_end();

            $i = 0;

            foreach ($this->column_search as $item) // loop column 
            {
                if ($_POST['search']['value']) // if datatable send POST for search
                {

                    if ($i === 0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if (count($this->column_search) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
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

        function get_datatables()
        {
            $this->_get_datatables_query();
            if ($_POST['length'] != -1)
                $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }

        function count_filtered()
        {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function count_all()
        {
            $this->db->from($this->table);
            return $this->db->count_all_results();
        }
    // akhir untuk pilihan semua


    //untuk apotek
        private function _get_datatables_query_apotek()
        {
            $this->db->select('databarang.kode_brng, databarang.nama_brng, gudangbarang.stok, 
                            databarang.expire, databarang.dasar,   .nm_bangsal, databarang.status');
            $this->db->from($this->table);
            $this->db->join('gudangbarang', 'databarang.kode_brng=gudangbarang.kode_brng', 'LEFT');
            $this->db->join('bangsal', 'gudangbarang.kd_bangsal=bangsal.kd_bangsal', 'LEFT');
            $this->db->where('databarang.kode_brng >=', 'B000008011');
            $this->db->where('databarang.status', '1');
            //$this->db->where("(bangsal.kd_bangsal='AP' OR bangsal.kd_bangsal='Far1')", NULL, FALSE);
            $this->db->group_start();
            $this->db->or_where('bangsal.kd_bangsal', 'AP');
            $this->db->group_end();

            $i = 0;

            foreach ($this->column_search as $item) // loop column 
            {
                if ($_POST['search']['value']) // if datatable send POST for search
                {

                    if ($i === 0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if (count($this->column_search) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
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

        function get_datatables_apotek()
        {
            $this->_get_datatables_query_apotek();
            if ($_POST['length'] != -1)
                $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }

        function count_filtered_apotek()
        {
            $this->_get_datatables_query_apotek();
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function count_all_apotek()
        {
            $this->db->from($this->table);
            return $this->db->count_all_results();
        }
    // akhir untuk pilihan apotek

    //untuk Gudang Farmasi
    private function _get_datatables_query_far()
    {
        $this->db->select('databarang.kode_brng, databarang.nama_brng, gudangbarang.stok, 
                         databarang.expire, databarang.dasar, bangsal.nm_bangsal, databarang.status');
        $this->db->from($this->table);
        $this->db->join('gudangbarang', 'databarang.kode_brng=gudangbarang.kode_brng', 'LEFT');
        $this->db->join('bangsal', 'gudangbarang.kd_bangsal=bangsal.kd_bangsal', 'LEFT');
        $this->db->where('databarang.kode_brng >=', 'B000008011');
        $this->db->where('databarang.status', '1');
        //$this->db->where("(bangsal.kd_bangsal='AP' OR bangsal.kd_bangsal='Far1')", NULL, FALSE);
        $this->db->group_start();
        $this->db->or_where('bangsal.kd_bangsal', 'Far1');
        $this->db->group_end();

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
 
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
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

    function get_datatables_far()
    {
        $this->_get_datatables_query_far();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_far()
    {
        $this->_get_datatables_query_far();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_far()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function rangeDate($start_date, $end_date)
    {
 
        $query = $this->db->select('databarang.kode_brng, databarang.nama_brng, gudangbarang.stok, 
        databarang.expire, databarang.dasar, bangsal.nm_bangsal, databarang.status');
        $this->db->from($this->table);
        $this->db->join('gudangbarang', 'databarang.kode_brng=gudangbarang.kode_brng', 'LEFT');
        $this->db->join('bangsal', 'gudangbarang.kd_bangsal=bangsal.kd_bangsal', 'LEFT');
        $this->db->where('databarang.kode_brng >=', 'B000008011');
        $this->db->where('databarang.status', '1');
        //$this->db->where("(bangsal.kd_bangsal='AP' OR bangsal.kd_bangsal='Far1')", NULL, FALSE);
        $this->db->group_start();
        $this->db->or_where('bangsal.kd_bangsal', 'Far1');
        $this->db->group_end();

        return $query;
    }


    // akhir untuk pilihan Gudang Farmasi

    //untuk obat expired
    private function _get_datatables_query_expired()
    {
        //$date = new DateTime("now");
        // $sekarang = $date->format('Y-m-d ');
        $this->db->select('databarang.kode_brng, databarang.nama_brng, gudangbarang.stok, 
        databarang.expire, databarang.dasar, bangsal.nm_bangsal, databarang.status');
        $this->db->from($this->table);
        $this->db->join('gudangbarang', 'databarang.kode_brng=gudangbarang.kode_brng', 'LEFT');
        $this->db->join('bangsal', 'gudangbarang.kd_bangsal=bangsal.kd_bangsal', 'LEFT');
        $this->db->where('databarang.kode_brng >=', 'B000008011');
        $this->db->where('databarang.status', '1');
        $this->db->where('databarang.expire <=', 'CURDATE()', FALSE);
        //$this->db->where("(bangsal.kd_bangsal='AP' OR bangsal.kd_bangsal='Far1')", NULL, FALSE);
        $this->db->group_start();
        $this->db->or_where('bangsal.kd_bangsal', 'AP');
        $this->db->or_where('bangsal.kd_bangsal', 'Far1');
        $this->db->group_end();

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
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

    function get_datatables_expired()
    {
        $this->_get_datatables_query_expired();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_expired()
    {
        $this->_get_datatables_query_expired();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_expired()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // akhir untuk pilihan Obat Expired

    //untuk Obat Keluar
    private function _get_datatables_query_obatkeluar()
    {
        $this->db->select('*');
        $this->db->from($this->table_ok);
        $this->db->join('detail_pemberian_obat', 'databarang.kode_brng=detail_pemberian_obat.kode_brng', 'LEFT');
        $this->db->select_sum('detail_pemberian_obat.jml');
        $this->db->where('detail_pemberian_obat.tgl_perawatan IS NOT NULL', null, false);
        //  $this->db->where('MONTH(detail_pemberian_obat.tgl_perawatan)');
        //  $this->db->where('YEAR(detail_pemberian_obat.tgl_perawatan)');
        //$this->db->where("(bangsal.kd_bangsal='AP' OR bangsal.kd_bangsal='Far1')", NULL, FALSE);
        $this->db->group_by('databarang.kode_brng');
        $this->db->group_by('MONTH(detail_pemberian_obat.tgl_perawatan)');
        //$this->db->order_by('databarang.nama_brng', 'ASC');
        //$this->db->order_by('MONTH(detail_pemberian_obat.tgl_perawatan)', 'ASC');


        $i = 0;

        foreach ($this->column_search_ok as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_ok) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_ok[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_ok)) {
            $order_ok = $this->order_ok;
            $this->db->order_by(key($order_ok), $order_ok[key($order_ok)]);
        }
    }

    function get_datatables_obatkeluar()
    {
        $this->_get_datatables_query_obatkeluar();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_obatkeluar()
    {
        $this->_get_datatables_query_obatkeluar();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_obatkeluar()
    {
        $this->db->from($this->table_ok);
        return $this->db->count_all_results();
    }
    // akhir untuk pilihan Obat Keluar
}

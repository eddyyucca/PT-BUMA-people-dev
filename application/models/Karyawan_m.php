<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_m extends CI_Model
{

    public function get_all_kar()
    {
        $query = $this->db->get('karyawan');
        return $query->result();
    }
    public function get_row_kar($id_kar)
    {
        $this->db->where('id_kar', $id_kar);
        $query = $this->db->get('karyawan');
        return $query->row();
    }
}

/* End of file karyawan_m.php */

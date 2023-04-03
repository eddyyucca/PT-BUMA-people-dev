<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_m extends CI_Model
{
    public function get_all_jab()
    {
        $query = $this->db->get('jabatan');
        return $query->result();
    }
    public function get_row_jab($id_jab)
    {
        $this->db->where('id_jab', $id_jab);
        $query = $this->db->get('jabatan');
        return $query->row();
    }
    public function jumlah_jabatan()
    {
        $query = $this->db->get('jabatan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}

/* End of file jabatan_m.php */

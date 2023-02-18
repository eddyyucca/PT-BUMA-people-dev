<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi_m extends CI_Model
{

    public function get_all_kom()
    {
        $query = $this->db->get('kompetensi');
        return $query->result();
    }
    public function get_row_kom($id_kom)
    {
        $this->db->where('id_kom', $id_kom);
        $query = $this->db->get('kompetensi');
        return $query->row();
    }
}

/* End of file Kompetensi_m.php */

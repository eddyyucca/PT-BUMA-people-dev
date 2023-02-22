<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assessment_m extends CI_Model
{

    public function get_all_am()
    {
        $query = $this->db->get('assessment');
        return $query->result();
    }
    public function get_row_am($id_am)
    {
        $this->db->where('id_am', $id_am);
        $query = $this->db->get('assessment');
        return $query->row();
    }
    public function jumlah_assessment()
    {
        $query = $this->db->get('assessment');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}

/* End of file Assessment_m.php */

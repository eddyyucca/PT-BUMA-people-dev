<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Training_m extends CI_Model
{

    public function get_all_tra()
    {
        $query = $this->db->get('training');
        return $query->result();
    }
    public function get_row_tra($id_training)
    {
        $this->db->where('id_training', $id_training);
        $query = $this->db->get('training');
        return $query->row();
    }
    public function jumlah_training()
    {
        $query = $this->db->get('training');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}

/* End of file Training_m.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grade_m extends CI_Model
{

    public function get_all_grade()
    {
        $query = $this->db->get('grade');
        return $query->result();
    }
    public function get_row_grade($id_grade)
    {
        $this->db->where('id_grade', $id_grade);
        $query = $this->db->get('grade');
        return $query->row();
    }
    public function jumlah_grade()
    {
        $query = $this->db->get('grade');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}

/* End of file grade_m.php */

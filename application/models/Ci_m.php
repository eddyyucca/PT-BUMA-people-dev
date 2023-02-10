<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ci_m extends CI_Model
{

    public function get_all_ci()
    {
        $query = $this->db->get('continuesimprovement');
        return $query->result();
    }
    public function get_row_ci($id_ci)
    {
        $this->db->where('id_ci', $id_ci);
        $query = $this->db->get('continuesimprovement');
        return $query->row();
    }
}

/* End of file departement_m.php */

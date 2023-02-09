<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departement_m extends CI_Model
{

    public function get_all_dep()
    {
        $query = $this->db->get('departement');
        return $query->result();
    }
    public function get_row_dep($id_dep)
    {
        $this->db->where('id_dep', $id_dep);
        $query = $this->db->get('departement');
        return $query->row();
    }
    public function jumlah_departement()
    {
        $query = $this->db->get('departement');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}

/* End of file departement_m.php */

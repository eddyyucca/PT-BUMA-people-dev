<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ci_m extends CI_Model
{

    public function get_all_ci()
    {
        $query = $this->db->get('continuesimprovement');
        return $query->result();
    }
    public function get_row_ci($nik)
    {
        $this->db->where('pembuat', $nik);
        $query = $this->db->get('continuesimprovement');
        return $query->row();
    }
    public function get_tim_ci($kode_tim)
    {
        $this->db->where('kode_tim', $kode_tim);
        $query = $this->db->get('citt');
        return $query->result();
    }
}

/* End of file departement_m.php */

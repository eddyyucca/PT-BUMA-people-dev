<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{

    public function login($nik, $password)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where('nik', $nik);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    public function cek_nik($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->limit(1);
        $query = $this->db->get('karyawan');

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

/* End of file Auth_m.php */

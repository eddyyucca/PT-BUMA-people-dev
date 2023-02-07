<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_m extends CI_Model
{

    public function get_all_kar()
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->order_by('jabatan', 'DESC');
        return   $this->db->get('karyawan')->result();
    }
    public function get_row_kar($id_kar)
    {
        $this->db->where('id_kar', $id_kar);
        $query = $this->db->get('karyawan');
        return $query->row();
    }
    public function get_view_kar($id_kar)
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_jab = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_jab = karyawan.departement', 'left');
        $this->db->order_by('jabatan', 'DESC');
        return   $this->db->get('karyawan')->result();
    }
}

/* End of file karyawan_m.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grade_m extends CI_Model
{

    public function get_all_grade()
    {
        $query = $this->db->get('grade');
        return $query->result();
    }
    public function get_all_grade_kom()
    {
        $this->db->join('karyawan', 'karyawan.nik = grade_kom.nik', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $query = $this->db->get('grade_kom');
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

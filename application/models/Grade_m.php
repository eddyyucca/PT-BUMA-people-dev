<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grade_m extends CI_Model
{

    public function get_all_grade()
    {

        $this->db->join('departement', 'departement.id_dep = grade.grade_section', 'left');
         $this->db->order_by('id_dep', 'ASC');
        $query = $this->db->get('grade');
        return $query->result();
    }
    public function get_all_grade_section($grade_sc)
    {
        $this->db->where('grade_section', $grade_sc);
           $query = $this->db->get('grade');
        return $query->result();
    }
    public function get_sc_grade($grade_kode)
    {
        // $this->db->join('departement', 'departement.id_dep = grade.grade_section', 'left');
        $this->db->where('grade_kode', $grade_kode);   
        //  $this->db->order_by('id_dep', 'ASC');
        $query = $this->db->get('nilai_grade');
        return $query->result();
    }
    public function get_grade_sec($sec_grade)
    {
        $this->db->join('departement', 'departement.id_dep = grade.grade_section', 'left');
        $this->db->where('grade_section', $sec_grade);
         $this->db->order_by('level_grade', 'ASC');
        $query = $this->db->get('grade');
        return $query->result();
    }
    public function get_sec($sec_grade)
    {
        $this->db->join('departement', 'departement.id_dep = grade.grade_section', 'left');
        $this->db->where('grade_section', $sec_grade);
         $this->db->order_by('level_grade', 'ASC');
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
    public function get_row_grade_sc($grade_sc)
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
    public function get_row_grade_kom($grade_kode)
    {
        $this->db->join('grade', 'grade.id_grade = nilai_grade.grade', 'left');
        $this->db->where('grade_kode', $grade_kode);
        $query = $this->db->get('nilai_grade');
        return $query->result();
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

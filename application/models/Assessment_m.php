<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assessment_m extends CI_Model
{

    public function get_all_am()
    {
        $this->db->join('karyawan', 'karyawan.nik = assessment.karyawan', 'left');
        $this->db->join('kompetensi_user', 'kompetensi_user.id_kompetensi = assessment.kompetensi', 'left');
        $this->db->join('kompetensi', 'kompetensi.id_kom = assessment.kompetensi', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');

        $this->db->order_by('id_am', 'DESC');
        return   $this->db->get('assessment')->result();
    }
    public function get_all_am_user($nik)
    {
        $this->db->join('karyawan', 'karyawan.nik = assessment.karyawan', 'left');
        $this->db->join('kompetensi_user', 'kompetensi_user.id_kompetensi = assessment.kompetensi', 'left');
        $this->db->join('kompetensi', 'kompetensi.id_kom = assessment.kompetensi', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->where('nik', $nik);

        $this->db->order_by('id_am', 'DESC');
        return   $this->db->get('assessment')->result();
    }
    public function get_row_am($id_am)
    {
        $this->db->where('id_am', $id_am);
        $query = $this->db->get('assessment');
        return $query->row();
    }
    public function get_assessment($nik)
    {
        $this->db->where('karyawan', $nik);
        $query = $this->db->get('assessment');
        return $query->result();
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

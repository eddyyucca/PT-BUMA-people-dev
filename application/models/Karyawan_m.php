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

    public function view_kompetensi_row($nik)
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->order_by('jabatan', 'DESC');
        return   $this->db->get('karyawan')->result();
    }
    public function get_all_ar()
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->where('level', 'asesor');
        
        $this->db->order_by('jabatan', 'DESC');
        return   $this->db->get('karyawan')->result();
    }
    public function get_row_kar($id_kar)
    {
        $this->db->where('id_kar', $id_kar);
        $query = $this->db->get('karyawan');
        return $query->row();
    }
    public function get_row_nik($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('karyawan');
        return $query->row();
    }
    public function get_view_kar($nik)
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->where('nik', $nik);
        return   $this->db->get('karyawan')->row();
    }

    // cek user saat upload data excel
    public function cek_nik($nik)
    {

        $this->db->where('nik', $nik);
        $query = $this->db->get('karyawan');

        if ($query->num_rows > 1) {
            return true;
        } else {
            return false;
        }
    }
    public function jumlah_karyawan()
    {
        $query = $this->db->get('karyawan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->order_by('id_kar', 'ASC');

        return $this->db->get();
    }
    public function getAll_user()
    {
        $this->db->where('level', 'user');
        $this->db->order_by('id_kar', 'ASC');
        $query = $this->db->get('karyawan');

        return $query->result();
    }
    public function get_allassesor()
    {
        $this->db->select('*');
        $this->db->where('level', 'asesor');

        $this->db->from('karyawan');
        $this->db->order_by('id_kar', 'ASC');

        return $this->db->get();
    }
    public function get_data($limit, $offset)
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');

        // $this->db->from('karyawan');
        $query = $this->db->get('karyawan', $limit, $offset);
        $this->db->order_by('id_kar', 'DESC');

        return $query;
    }

     public function get_data_level()
    {
        $this->db->order_by('id_kar', 'DESC');
        $this->db->or_like('karyawan.level', 'admin');
        $this->db->or_like('karyawan.level', 'asesor');
        return $this->db->get('karyawan')->result();
    }
     public function get_data_level_row($nik)
    {
        
        $this->db->where('nik', $nik);
        
        return $this->db->get('karyawan')->row();
    }
    public function get_data_asesor($limit, $offset)
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->where('karyawan.level', 'asesor');
        $this->db->order_by('id_kar', 'DESC');
        // $this->db->from('karyawan');
        $query = $this->db->get('karyawan', $limit, $offset);

        return $query;
    }
    public function cari_data($limit, $offset, $cari)
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->from('karyawan');
        $this->db->limit($limit, $offset);
        $this->db->order_by('id_kar', 'ASC');
        $this->db->like('nama', $cari);

        return $this->db->get();
    }
    public function getRow($cari)
    {
        // $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->like('nama', $cari);
        $this->db->order_by('id_kar', 'ASC');

        return $this->db->get();
    }


    public function cek_pass($password, $nik)
    {
        $this->db->where('nik', $nik);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get('karyawan');

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

/* End of file karyawan_m.php */

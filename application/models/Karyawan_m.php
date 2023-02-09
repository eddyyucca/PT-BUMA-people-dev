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
            return false;
        } else {
            return $query->row();
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
    public function get_data($limit, $offset)
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');

        $this->db->from('karyawan');
        $this->db->order_by('id_kar', 'ASC');
        $this->db->limit($limit, $offset);

        return $this->db->get();
    }
    public function cari_data($limit, $offset, $cari)
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->from('karyawan');
        $this->db->order_by('id_kar', 'ASC');
        $this->db->limit($limit, $offset);
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
}

/* End of file karyawan_m.php */

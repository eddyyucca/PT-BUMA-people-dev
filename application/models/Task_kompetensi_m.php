<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_kompetensi_m extends CI_Model
{

    public function get_all_tk()
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        return   $this->db->get('karyawan')->result();
    }
    public function get_row_tk($id_kompetensi)
    {
        $this->db->where('id_kompetensi', $id_kompetensi);
        $query = $this->db->get('kompetensi_user');
        return $query->row();
    }

    function plan($id_kom)
    {
        //ambil data kabupaten berdasarkan id provinsi yang dipilih
        $this->db->where('kompetensi', $id_kom);
        // $this->db->order_by('name', 'ASC');
        $query = $this->db->get('plan');

        $output = '<option value="">-- Pilih Sub Plan --</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_plan . '">' . $row->nama_plan . '</option>';
        }
        //return data kabupaten
        return $output;
    }
}

/* End of file task_kompetensi_m.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_kompetensi_m extends CI_Model
{

    public function get_all_tk()
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->join('kompetensi_user', 'kompetensi_user.nik_kar = karyawan.nik', 'left');
        $this->db->order_by('id_kom_user', 'DESC');

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
      
        return $output;
    }
    function get_jabatan($id_jab)
    {
        $this->db->where('nama_jab', $id_jab);
        $query = $this->db->get('jabatan');
        //looping data
        foreach ($query->result() as $row) {
            $output = '<option value="' . $row->id_jab . '">' . $row->nama_jab . '</option>';
        }
      
        return $output;
    }
    function plan_kom($plan_t)
    {
        //ambil data kabupaten berdasarkan id provinsi yang dipilih
        $this->db->where('plan_t', $plan_t);
        // $this->db->order_by('name', 'ASC');
        $query = $this->db->get('plan_kom');

        $output = '<option value="">-- Pilih Target Plan Kompetensi--</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id_plan_t . '">' . $row->target_p . '</option>';
        }
      
        return $output;
    }
}

/* End of file task_kompetensi_m.php */

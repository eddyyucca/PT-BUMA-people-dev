<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suggestionsystem_m extends CI_Model
{

    public function get_all_ss()
    {
        $this->db->join('section', 'section.id_sec = suggestionsystem.section_ss', 'left');
        $this->db->join('karyawan', 'karyawan.nik = suggestionsystem.pembuat_ss', 'left');
        $this->db->order_by('id_ss', 'DESC');
        return   $this->db->get('suggestionsystem')->result();
    }
    public function get_all_ss_user($nik)
    {
        $this->db->join('section', 'section.id_sec = suggestionsystem.section_ss', 'left');
        $this->db->join('karyawan', 'karyawan.nik = suggestionsystem.pembuat_ss', 'left');
        $this->db->where('nik', $nik);
        $this->db->order_by('id_ss', 'DESC');
        return   $this->db->get('suggestionsystem')->result();
    }
    public function get_row_ss($id_ss)
    {
        $this->db->where('id_ss', $id_ss);
        $query = $this->db->get('suggestionsystem');
        return $query->row();
    }
}

/* End of file suggestionsystem_m.php */

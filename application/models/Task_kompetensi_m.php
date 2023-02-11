<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_kompetensi_m extends CI_Model
{

    public function get_all_tk()
    {
        $this->db->join('jabatan', 'jabatan.id_jab = kompetensi_user.jabatan', 'left');
        $this->db->join('kompetensi', 'kompetensi.id_kom = kompetensi_user.kompetensi', 'left');
        $this->db->order_by('id_kompetensi', 'DESC');
        return   $this->db->get('kompetensi_user')->result();
    }
    public function get_row_tk($id_kompetensi)
    {
        $this->db->where('id_kompetensi', $id_kompetensi);
        $query = $this->db->get('kompetensi_user');
        return $query->row();
    }
}

/* End of file task_kompetensi_m.php */

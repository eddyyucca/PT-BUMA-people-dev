<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section_m extends CI_Model
{

    public function get_all_sec()
    {
        $query = $this->db->get('section');
        return $query->result();
    }
    public function get_row_sec($id_section)
    {
        $this->db->where('id_section', $id_section);
        $query = $this->db->get('section');
        return $query->row();
    }
}

/* End of file section_m.php */

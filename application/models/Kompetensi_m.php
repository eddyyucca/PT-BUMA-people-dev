<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi_m extends CI_Model
{

    public function get_all_kom()
    {
        $query = $this->db->get('kompetensi');
        return $query->result();
    }
    public function get_row_level($id_lp)
    {
        
        $this->db->where('id_lp', $id_lp);
        
        $query = $this->db->get('level_kom');
        return $query->row();
    }
    public function get_all_level()
    {
        $this->db->join('plan_kom', 'plan_kom.id_plan_t = level_kom.pk_level', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = level_kom.lvl_jab', 'left');
        $this->db->order_by('lvl_jab', 'DESC');
        $query = $this->db->get('level_kom');
        return $query->result();
    }
    public function get_row_level_kar($id_jab)
    {
        $this->db->join('plan_kom', 'plan_kom.id_plan_t = level_kom.pk_level', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = level_kom.lvl_jab', 'left');
        $this->db->join('plan', 'plan.id_plan = plan_kom.plan_t', 'left');
        $this->db->order_by('lvl_jab', 'DESC');
        
        $this->db->where('id_jab', $id_jab);
        
        $query = $this->db->get('level_kom');
        return $query->result();
    }
    public function get_kom($id_plan_t)
    {
        $this->db->where('id_plan_t', $id_plan_t);
        $query = $this->db->get('plan_kom');
        return $query->row();
    }
    public function get_row_plan_kom($id_plan_t)
    {
        $this->db->where('id_plan_t', $id_plan_t);
        $query = $this->db->get('plan_kom');
        return $query->row();
    }
    public function get_all_plan()
    {
        $this->db->join('kompetensi', 'kompetensi.id_kom = plan.kompetensi', 'left');
        $query = $this->db->get('plan');
        return $query->result();
    }
    public function get_all_pk()
    {
        // $this->db->join('kompetensi', 'kompetensi.id_kom = plan.kompetensi', 'left');
        $this->db->join('plan', 'plan.id_plan = plan_kom.plan_t', 'left');

        $query = $this->db->get('plan_kom');
        return $query->result();
    }
    public function get_all_pk_sub($id_p)
    {
        $this->db->join('kompetensi', 'kompetensi.id_kom = sub_kom.target_p', 'left');
        $this->db->where('id_p', $id_p);
        $query = $this->db->get('sub_kom');
        return $query->result();
    }
    public function get_row_kom($id_kom)
    {
        $this->db->where('id_kom', $id_kom);
        $query = $this->db->get('kompetensi');
        return $query->row();
    }
    public function get_row_plan($id_plan)
    {
        $this->db->where('id_plan', $id_plan);
        $query = $this->db->get('plan');
        return $query->row();
    }


    function plan($id_kom)
    {
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
    function plan_kom($plan_t)
    {

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
    function get_jab_opt($nik)
    {
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->where('nik', $nik);
        $query = $this->db->get('karyawan')->row();

        $output = '<option value="' . $query->id_jab . '">' . $query->nama_jab . '</option>';
        return $output;
    }
    function get_sec_opt($nik)
    {
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->where('nik', $nik);
        $query = $this->db->get('karyawan')->row();

        $output = '<option value="' . $query->id_dep . '">' . $query->nama_dep . '</option>';
        return $output;
    }
}

/* End of file Kompetensi_m.php */

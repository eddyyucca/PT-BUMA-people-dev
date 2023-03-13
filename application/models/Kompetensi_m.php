<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi_m extends CI_Model
{

    public function get_all_kom()
    {
        $query = $this->db->get('kompetensi');
        return $query->result();
    }
    public function get_all_plan()
    {
        // $this->db->join('kompetensi', 'kompetensi.id_kom = plan.kompetensi', 'left');
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

    function getkec($id_kab, $searchTerm = "")
    {
        $this->db->select('id_kec, nama');
        $this->db->where('id_kab', $id_kab);
        $this->db->where("nama like '%" . $searchTerm . "%' ");
        $this->db->order_by('id_kec', 'asc');
        $fetched_records = $this->db->get('kecamatan');
        $datakec = $fetched_records->result_array();

        $data = array();
        foreach ($datakec as $kec) {
            $data[] = array("id" => $kec['id_kec'], "text" => $kec['nama']);
        }
        return $data;
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
        //return data kabupaten
        return $output;
    }
}

/* End of file Kompetensi_m.php */

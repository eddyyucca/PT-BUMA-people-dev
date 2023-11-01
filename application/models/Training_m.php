<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Training_m extends CI_Model
{

    public function get_all_tra()
    {
        $this->db->join('karyawan', 'karyawan.nik = training.karyawan', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');

        $query = $this->db->get('training');
        return $query->result();
    }
    public function get_all_tra_user($nik)
    {
        $this->db->join('karyawan', 'karyawan.nik = training.karyawan', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');

$this->db->where('karyawan', $nik);

        $query = $this->db->get('training');
        return $query->result();
    }
    public function get_row_tra($id_training)
    {
        $this->db->where('id_training', $id_training);
        $query = $this->db->get('training');
        return $query->row();
    }
    public function jumlah_training()
    {
        $query = $this->db->get('training');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // training optional

     public function get_all_topt()
    {
        $query = $this->db->get('training_opt');
        return $query->result();
    }
     public function get_row_topt($id_topt)
    {
       $this->db->where('id_topt', $id_topt);
        $query = $this->db->get('training_opt');
        return $query->row();
    }

    // training internal
     public function get_all_training_int()
    {
        $this->db->join('karyawan', 'karyawan.nik = training_int.karyawan', 'left');
        $this->db->join('training_opt', 'training_opt.id_topt = training_int.training', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->order_by('id_training_int', 'DESC');
        $query = $this->db->get('training_int');
        return $query->result();
    }
     public function get_row_training_int_kar($nik)
    {
        $this->db->join('karyawan', 'karyawan.nik = training_int.karyawan', 'left');
        $this->db->join('training_opt', 'training_opt.id_topt = training_int.training', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');

        $this->db->where('karyawan', $nik);
 $this->db->order_by('id_training_int', 'DESC');
        $query = $this->db->get('training_int');
        return $query->result();
    }
     public function get_f_trainer_int($nik)
    {
        $this->db->join('karyawan', 'karyawan.nik = training_int.karyawan', 'left');
        $this->db->join('training_opt', 'training_opt.id_topt = training_int.training', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');

         $this->db->where('p_materi', $nik);
          $this->db->order_by('id_training_int', 'DESC');
        $query = $this->db->get('training_int');
        return $query->result();
    }
     public function get_f_training_int($id_training)
    {
        $this->db->join('karyawan', 'karyawan.nik = training_int.karyawan', 'left');
        $this->db->join('training_opt', 'training_opt.id_topt = training_int.training', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');

         $this->db->where('training', $id_training);
          $this->db->order_by('id_training_int', 'DESC');
        $query = $this->db->get('training_int');
        return $query->result();
    }
     public function get_f_training_bt($bulan,$tahun)
    {
        $this->db->join('karyawan', 'karyawan.nik = training_int.karyawan', 'left');
        $this->db->join('training_opt', 'training_opt.id_topt = training_int.training', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');

        $this->db->where('MONTH(mulai_t)',$bulan);
        $this->db->where('YEAR(mulai_t)',$tahun);
 $this->db->order_by('id_training_int', 'DESC');
        $query = $this->db->get('training_int');
        return $query->result();
    }
     public function get_row_training_int($id_training_int)
    {
        $this->db->join('karyawan', 'karyawan.nik = training_int.karyawan', 'left');
        $this->db->join('training_opt', 'training_opt.id_topt = training_int.training', 'left');
        $this->db->join('jabatan', 'jabatan.id_jab = karyawan.jabatan', 'left');
        $this->db->join('section', 'section.id_sec = karyawan.section', 'left');
        $this->db->join('departement', 'departement.id_dep = karyawan.departement', 'left');
        $this->db->where('id_training_int', $id_training_int);
        $query = $this->db->get('training_int');
        return $query->row();
    }
}

/* End of file Training_m.php */

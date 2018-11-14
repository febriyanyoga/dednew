<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beranda_model extends CI_Model
{

    public $table = 'tbl_ded';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatablesget_all_ded
    function json() {
        $this->datatables->select('id,nama_peraturan,unit,tupoksi,jml_database,file_pdf');
        $this->datatables->from('tbl_ded');
        $this->datatables->add_column('action', anchor(site_url('beranda/read/$1'),'<i class="icon-eye" aria-hidden="true"></i>', array('class' => 'btn-fab btn-fab-sm btn-success r-5'))." 
            ", 'id');
        return $this->datatables->generate();
    }
    
    function get_all_ded(){
        $this->db->select('*');
        $this->db->from('tbl_skpa');
        $this->db->order_by('id_skpa', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function get_all_org(){
        $this->db->select('*');
        $this->db->from('tbl_organisasi');
        $this->db->order_by('id_organisasi', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function get_all_org_by_id_skpa($id_skpa){
        $this->db->select('*');
        $this->db->from('tbl_organisasi');
        $this->db->where('id_skpa', $id_skpa);
        $this->db->order_by('id_organisasi', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function get_all_suborg(){
        $this->db->select('*');
        $this->db->from('tbl_suborganisasi');
        $this->db->order_by('id_suborganisasi', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function get_all_data($id_skpa){
        $this->db->select('*');
        $this->db->from('tbl_parameter P');
        $this->db->join('tbl_objek_data D','P.id_objek_data = D.id_objek_data');
        $this->db->join('tbl_suborganisasi S','D.id_suborganisasi = S.id_suborganisasi');
        $this->db->join('tbl_organisasi O','S.id_organisasi = O.id_organisasi');
        $this->db->join('tbl_skpa K','O.id_skpa = K.id_skpa');
        $this->db->where('K.id_skpa', $id_skpa);
        $this->db->order_by('K.id_skpa');
        return $this->db->get();
    }

    function get_all_data_skpa($id_skpa){
        $this->db->select('*');
        $this->db->from('tbl_parameter P');
        $this->db->join('tbl_objek_data D','P.id_objek_data = D.id_objek_data');
        $this->db->join('tbl_suborganisasi S','D.id_suborganisasi = S.id_suborganisasi');
        $this->db->join('tbl_organisasi O','S.id_organisasi = O.id_organisasi');
        $this->db->join('tbl_skpa K','O.id_skpa = K.id_skpa');
        $this->db->where('K.id_skpa', $id_skpa);
        // $this->db->order_by('K.id_skpa');
        return $this->db->get();
    }

    function get_all_data_org($id_organisasi){
        $this->db->select('*');
        $this->db->from('tbl_parameter P');
        $this->db->join('tbl_objek_data D','P.id_objek_data = D.id_objek_data');
        $this->db->join('tbl_suborganisasi S','D.id_suborganisasi = S.id_suborganisasi');
        $this->db->where('S.id_organisasi', $id_organisasi);
        return $this->db->get();
    }

    function get_all_data_objek($id_objek_data){
        $this->db->select('*');
        $this->db->from('tbl_parameter P');
        $this->db->where('p.id_objek_data', $id_objek_data);
        return $this->db->get();
    }

    function get_all_suborg_by_id_skpa($id_skpa){
        $this->db->select('*');
        $this->db->from('tbl_suborganisasi S');
        $this->db->join('tbl_organisasi O','S.id_organisasi = O.id_organisasi');
        $this->db->where('O.id_skpa', $id_skpa);
        $this->db->order_by('id_suborganisasi', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function get_all_obj(){
        $this->db->select('*');
        $this->db->from('tbl_objek_data');
        $this->db->order_by('id_objek_data', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function get_all_obj_by_id_skpa($id_skpa){
        $this->db->select('*');
        $this->db->from('tbl_objek_data O');
        $this->db->join('tbl_suborganisasi S', 'S.id_suborganisasi = O.id_suborganisasi');
        $this->db->join('tbl_organisasi R', 'R.id_organisasi = S.id_organisasi');
        $this->db->where('R.id_skpa', $id_skpa);
        $this->db->order_by('id_objek_data', 'ASC');
        $query = $this->db->get();
        return $query;
    }



    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}


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

    // datatables
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


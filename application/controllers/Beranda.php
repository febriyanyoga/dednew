<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model(array('Beranda_model','Ded_m'));
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->helper('form', 'url');

    }
    public function index()
    {
        $data = array();
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Beranda_model->get_all_ded()->result();
        $data['jumlah_skpa'] = $this->Beranda_model->get_all_ded()->num_rows();
        $this->template->load('template','auth/beranda', $data);
    } 

    public function read($id_ded){
        $data['nama_regulasi'] = $this->Ded_m->get_all_ded_by_id($id_ded)->result()[0]->regulasi;
        $data['ded'] = $this->Ded_m->get_all_ded($id_ded)->result();
        $this->template->load('template','auth/beranda_read', $data);
    }
}

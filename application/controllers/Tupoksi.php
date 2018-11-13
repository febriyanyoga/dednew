<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tupoksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model(['Tbl_ded_model','Ded_m']);
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->helper('form', 'url');
        $data = array();

    }

    public function index(){
        // $this->data['MemberM'] = $this->MemberM;
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','tupoksi/skpalist', $data);
    }

    public function organisasi(){
        // $this->data['MemberM'] = $this->MemberM;
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','tupoksi/tupoksiorg', $data);
    }

    public function suborganisasi(){
        // $this->data['MemberM'] = $this->MemberM;
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','tupoksi/tupoksisuborg', $data);
    }

    public function obyekdata(){
        // $this->data['MemberM'] = $this->MemberM;
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','tupoksi/obyekdata', $data);
    }

    public function tabeldata(){
        // $this->data['MemberM'] = $this->MemberM;
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','tupoksi/tabeldata', $data);
    }


}
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dedaceh extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model(['Ded_m']);
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->helper('form', 'url');

        $data = array();
    }

    public function index()
    {
        $data = array();
        $data['ded'] = $this->Ded_m->get_all_ded_()->result();
        $this->template->load('template','ded/dedlist', $data);
    } 
    

    public function deddetail($id) 
    {   
        $data['skpa'] = $this->Ded_m->get_all_ded_by_id($id)->row();
        $data['id_ded'] = $id;
        $data['all_ded'] = $this->Ded_m->get_all_ded($id)->result();
        $this->template->load('template','ded/deddetail', $data);
    }

    public function post_ded(){
        $this->form_validation->set_rules('bidang','Bidang');
        $this->form_validation->set_rules('biro','Biro');
        $this->form_validation->set_rules('bagian','Bagian');
        $this->form_validation->set_rules('subag','Sub bag');
        $this->form_validation->set_rules('basisdata','Basisdata');
        $this->form_validation->set_rules('parameter','Parameter');
        $this->form_validation->set_rules('tipe','Tipe');
        $this->form_validation->set_rules('panjang','Panjang');
        $this->form_validation->set_rules('id_ded','ID DED','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'id_ded'        => $this->input->post('id_ded'), 
                'bidang'        => $this->input->post('bidang'), 
                'biro'          => $this->input->post('biro'), 
                'bagian'        => $this->input->post('bagian'), 
                'subag'         => $this->input->post('subag'), 
                'basisdata'     => $this->input->post('basisdata'), 
                'parameter'     => $this->input->post('parameter'), 
                'tipe'          => $this->input->post('tipe'), 
                'panjang'       => $this->input->post('panjang'), 
            );

            if($this->Ded_m->post_data_ded($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back(); 
            }
        }
    }

    public function hapus_ded($id_detail){
        if($this->Ded_m->hapus_detail($id_detail)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }

    public function post_update_ded(){
        $this->form_validation->set_rules('bidang','Bidang');
        $this->form_validation->set_rules('biro','Biro');
        $this->form_validation->set_rules('bagian','Bagian');
        $this->form_validation->set_rules('subag','Sub bag');
        $this->form_validation->set_rules('basisdata','Basisdata');
        $this->form_validation->set_rules('parameter','Parameter');
        $this->form_validation->set_rules('tipe','Tipe');
        $this->form_validation->set_rules('panjang','Panjang');
        $this->form_validation->set_rules('id_ded','ID DED','required');
        $this->form_validation->set_rules('id_detail','ID Detail','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'id_ded'        => $this->input->post('id_ded'), 
                'bidang'        => $this->input->post('bidang'), 
                'biro'          => $this->input->post('biro'), 
                'bagian'        => $this->input->post('bagian'), 
                'subag'         => $this->input->post('subag'), 
                'basisdata'     => $this->input->post('basisdata'), 
                'parameter'     => $this->input->post('parameter'), 
                'tipe'          => $this->input->post('tipe'), 
                'panjang'       => $this->input->post('panjang'), 
            );

            $id_detail = $this->input->post('id_detail');

            if($this->Ded_m->post_update_ded($id_detail, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil diubah');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil diubah');
                redirect_back(); 
            }
        }
    }

    public function post_skpa(){
        $this->form_validation->set_rules('nama_peraturan','Nama Peraturan','required');
        $this->form_validation->set_rules('unit','Unit');
        $this->form_validation->set_rules('tupoksi','Tupoksi');
        $this->form_validation->set_rules('jml_database','Jumlah Database');
        $this->form_validation->set_rules('regulasi','Regulasi','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'nama_peraturan'    => $this->input->post('nama_peraturan'), 
                'unit'              => $this->input->post('unit'), 
                'tupoksi'           => $this->input->post('tupoksi'), 
                'jml_database'      => $this->input->post('jml_database'), 
                'regulasi'          => $this->input->post('regulasi'), 
            );

            if($this->Ded_m->post_data_skpa($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back(); 
            }
        }
    }

    public function post_update_skpa(){
        $this->form_validation->set_rules('nama_peraturan','Nama Peraturan','required');
        $this->form_validation->set_rules('unit','Unit');
        $this->form_validation->set_rules('tupoksi','Tupoksi');
        $this->form_validation->set_rules('jml_database','Jumlah Database');
        $this->form_validation->set_rules('regulasi','Regulasi','required');
        $this->form_validation->set_rules('id','ID','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'nama_peraturan'    => $this->input->post('nama_peraturan'), 
                'unit'              => $this->input->post('unit'), 
                'tupoksi'           => $this->input->post('tupoksi'), 
                'jml_database'      => $this->input->post('jml_database'), 
                'regulasi'          => $this->input->post('regulasi'), 
            );
            $id = $this->input->post('id');
            if($this->Ded_m->post_data_update_skpa($id, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back(); 
            }
        }
    }

    public function hapus_skpa($id){
        if($this->Ded_m->hapus_ded($id)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }

}



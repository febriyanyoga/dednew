<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Monitoring extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ded_m');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->helper('form', 'url');

        $data = array();
    }

    public function index()
    {
        $data['ded'] = $this->Ded_m->get_all_ded_()->result();
        $this->template->load('template','monitor/monitor_list', $data);
    } 

    public function skpanote($id_ded){
        $data['skpa'] = $this->Ded_m->get_all_ded_by_id($id_ded)->row();
        $data['note'] = $this->Ded_m->get_all_note_by_skpa($id_ded)->result();
        $data['id_ded'] = $id_ded;
        $this->template->load('template','monitor/skpanote', $data);
    }

    public function post_note(){
        $this->form_validation->set_rules('judul','Judul','required');
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('note','Note','required');
        $this->form_validation->set_rules('id_ded','ID Ded', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'judul'    => $this->input->post('judul'), 
                'tanggal'  => $this->input->post('tanggal'), 
                'note'     => $this->input->post('note'), 
                'id_ded'   => $this->input->post('id_ded'),
            );

            if($this->Ded_m->post_data_note($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back(); 
            }
        }
    }

    public function post_ubah_note(){
        $this->form_validation->set_rules('judul','Judul','required');
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('note','Note','required');
        $this->form_validation->set_rules('id_ded','ID Ded', 'required');
        $this->form_validation->set_rules('id_note','ID note', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'judul'    => $this->input->post('judul'), 
                'tanggal'  => $this->input->post('tanggal'), 
                'note'     => $this->input->post('note'), 
                'id_ded'   => $this->input->post('id_ded'),
            );
            $id_note = $this->input->post('id_note');
            if($this->Ded_m->post_ubah_data_note($id_note, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back(); 
            }
        }
    }

    public function hapus_note($id_note){
        if($this->Ded_m->hapus_note($id_note)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }
}
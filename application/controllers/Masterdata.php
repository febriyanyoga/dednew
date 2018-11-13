<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Masterdata extends CI_Controller
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
        $this->template->load('template','masterdata/skpalist', $data);
    }


    public function organisasi(){
        // $this->data['MemberM'] = $this->MemberM;
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','masterdata/organisasi_v', $data);
    }

    public function suborganisasi(){
        // $this->data['MemberM'] = $this->MemberM;
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','masterdata/suborganisasi_v', $data);
    }

    public function obyekdata(){
        // $this->data['MemberM'] = $this->MemberM;
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','masterdata/obyekdata', $data);
    }

    public function tabeldata(){
        // $this->data['MemberM'] = $this->MemberM;
        $data['Ded_m'] = $this->Ded_m;
        $data['ded'] = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','masterdata/tabeldata', $data);
    }


    public function post_dokumen(){
        $this->form_validation->set_rules('nama_dokumen','Nama Dokumen');
        $this->form_validation->set_rules('id_ded','ID Ded','required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil diunggah, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $id_ded         = $this->input->post('id_ded');
            $nama_dokumen   = $this->input->post('nama_dokumen');
            if($upload = $this->Ded_m->upload()){ 
                if($upload['result'] == "success"){
                    if($this->Ded_m->save($upload,$id_ded, $nama_dokumen)){
                        $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                        redirect_back(); 
                    }else{
                        $this->session->set_flashdata('error','Data anda tidak berhasil diunggah 1');
                        redirect_back(); 
                    }
                }else{
                    $this->session->set_flashdata('error','Data anda tidak berhasil diunggah 2');
                    redirect_back(); 
                }
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil diunggah 3');
                redirect_back(); 
            }
        }
    }

    public function delete($id_dokumen){
        define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
        define('PUBPATH',str_replace(SELF,'',FCPATH));

        $this->db->where('id_dokumen',$id_dokumen);
        $file = $this->db->get('tbl_dokumen')->row()->nama_file;

        if(unlink(PUBPATH."./uploads/".$file)){
            if($this->Ded_m->hapus_dokumen($id_dokumen)){
                $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
                redirect_back();
            }
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back();
        }
    }
}



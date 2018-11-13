<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ded_m');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {   
        $data['data_user'] = $this->Ded_m->get_all_user()->result();
        $data['user_level'] = $this->Ded_m->get_all_user_level()->result();
        $this->template->load('template','user/tbl_user_list', $data);
    } 

    public function post_user(){
        $this->form_validation->set_rules('full_name','Full Name','required');
        $this->form_validation->set_rules('email','Email','required|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('password','Password','trim|required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password','Konfirmasi password','trim|required');
        $this->form_validation->set_rules('images','Images');
        $this->form_validation->set_rules('id_user_level','Id User Level','required');
        $this->form_validation->set_rules('is_aktif','Aktif','required');
        $this->form_validation->set_message('is_unique', 'Data %s sudah dipakai'); 

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'full_name'     => $this->input->post('full_name'), 
                'email'         => $this->input->post('email'), 
                'password'      => md5($this->input->post('password')), 
                'images'        => $this->input->post('images'), 
                'id_user_level' => $this->input->post('id_user_level'), 
                'is_aktif'      => $this->input->post('is_aktif'), 
            );

            if($this->Ded_m->post_data_user($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back(); 
            }
        }
    }

    public function post_update_user(){
        $this->form_validation->set_rules('full_name','Full Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','trim|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password','Konfirmasi password','trim');
        $this->form_validation->set_rules('images','Images');
        $this->form_validation->set_rules('id_user_level','Id User Level','required');
        $this->form_validation->set_rules('is_aktif','Aktif','required');
        $this->form_validation->set_rules('id_users','id users','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'full_name'     => $this->input->post('full_name'), 
                'email'         => $this->input->post('email'), 
                'password'      => md5($this->input->post('password')), 
                'images'        => $this->input->post('images'), 
                'id_user_level' => $this->input->post('id_user_level'), 
                'is_aktif'      => $this->input->post('is_aktif'), 
            );

            $id_users = $this->input->post('id_users');

            if($this->Ded_m->post_update_data_user($id_users, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back(); 
            }
        }
    }

    public function hapus_user($id_users){
        if($this->Ded_m->hapus_user($id_users)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }
}

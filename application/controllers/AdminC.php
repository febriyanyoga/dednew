<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminC extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model(array('Beranda_model','Ded_m','Tbl_ded_model'));
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->helper('form', 'url');

    }

    public function index(){
        $data = array();
        $data['Ded_m'] = $this->Ded_m;
        $data['Beranda_model'] = $this->Beranda_model;
        $data['ded'] = $this->Beranda_model->get_all_ded()->result();


        $data['jumlah_org'] = $this->Beranda_model->get_all_org()->num_rows();
        $data['jumlah_suborg'] = $this->Beranda_model->get_all_suborg()->num_rows();
        $data['jumlah_obj'] = $this->Beranda_model->get_all_obj()->num_rows();
        $data['jumlah_skpa'] = $this->Beranda_model->get_all_ded()->num_rows();
        $this->template->load('template','auth/beranda', $data);
    } 

    public function read($id_skpa){
        $data['Beranda_model'] = $this->Beranda_model;
        $data['skpa'] = $this->Ded_m->get_all_ded_by_id($id_skpa)->result()[0];
        $data['ded'] = $this->Ded_m->get_all_ded($id_skpa)->result();
        $data['all'] = $this->Beranda_model->get_all_data($id_skpa)->result();
        $this->template->load('template','auth/beranda_read', $data);
    }

    public function masterdata(){
        $data['Ded_m']  = $this->Ded_m;
        $data['ded']    = $this->Tbl_ded_model->get_all_ded()->result();
        $this->template->load('template','masterdata/skpalist', $data);
    }


    // SKPA
    public function post_skpa(){
        $this->form_validation->set_rules('nama_skpa','Nama SKPA','required');
        $this->form_validation->set_rules('regulasi','Regulasi','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'nama_skpa'         => $this->input->post('nama_skpa'), 
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
        $this->form_validation->set_rules('nama_skpa','Nama SKPA','required');
        $this->form_validation->set_rules('regulasi','Regulasi','required');
        $this->form_validation->set_rules('id_skpa','ID','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'nama_skpa'         => $this->input->post('nama_skpa'), 
                'regulasi'          => $this->input->post('regulasi'), 
            );
            $id_skpa = $this->input->post('id_skpa');
            if($this->Ded_m->post_data_update_skpa($id_skpa, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back(); 
            }
        }
    }

    public function hapus_skpa($id_skpa){
        if($this->Ded_m->hapus_ded($id_skpa)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }

    public function post_dokumen_skpa(){
        $this->form_validation->set_rules('nama_dokumen','Nama Dokumen');
        $this->form_validation->set_rules('id_skpa','ID SKPA','required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil diunggah, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $id_skpa        = $this->input->post('id_skpa');
            $nama_dokumen   = $this->input->post('nama_dokumen');
            if($upload = $this->Ded_m->upload()){ 
                if($upload['result'] == "success"){
                    if($this->Ded_m->save($upload,$id_skpa, $nama_dokumen)){
                        $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                        redirect_back(); 
                    }else{
                        $this->session->set_flashdata('error','Data anda tidak berhasil diunggah');
                        redirect_back(); 
                    }
                }else{
                    $this->session->set_flashdata('error','Data anda tidak berhasil diunggah');
                    redirect_back(); 
                }
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil diunggah 3');
                redirect_back(); 
            }
        }
    }

    public function delete_dokumen_skpa($id_dokumen){
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

    // ORGANISASI
    public function organisasi($id_skpa){
        $data['skpa']   = $this->Ded_m->get_all_ded_by_id($id_skpa)->result();
        
        $id_skpa        = $this->Ded_m->get_all_ded_by_id($id_skpa)->result()[0]->id_skpa;
        $data['skpa']   = $this->Ded_m->get_all_ded_by_id($id_skpa)->result();

        $data['Ded_m']  = $this->Ded_m;
        $data['organisasi']    = $this->Ded_m->get_all_organisasi($id_skpa)->result();
        $this->template->load('template','masterdata/organisasi_v', $data);
    }

    public function post_organisasi(){
        $this->form_validation->set_rules('id_skpa','ID SKPA','required');
        $this->form_validation->set_rules('nama_organisasi','Nama Organisasi','required');
        $this->form_validation->set_rules('tugas','Tugas');
        $this->form_validation->set_rules('fungsi','Fungsi');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $data = array(
                'id_skpa'           => $this->input->post('id_skpa'), 
                'nama_organisasi'   => $this->input->post('nama_organisasi'), 
                'tugas'             => $this->input->post('tugas'), 
                'fungsi'            => $this->input->post('fungsi'), 
            );

            if($this->Ded_m->post_data_organisasi($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_update_organisasi(){
        $this->form_validation->set_rules('id_skpa','ID SKPA','required');
        $this->form_validation->set_rules('id_organisasi','ID Organisasi','required');
        $this->form_validation->set_rules('nama_organisasi','Nama Organisasi','required');
        $this->form_validation->set_rules('tugas','Tugas');
        $this->form_validation->set_rules('fungsi','Fungsi');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $data = array(
                'id_skpa'           => $this->input->post('id_skpa'), 
                'nama_organisasi'   => $this->input->post('nama_organisasi'), 
                'tugas'             => $this->input->post('tugas'), 
                'fungsi'            => $this->input->post('fungsi'), 
            );
            $id_organisasi = $this->input->post('id_organisasi');

            if($this->Ded_m->post_update_data_organisasi($id_organisasi, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil diubah');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil diubah');
                redirect_back();
            }
        }
    }

    public function hapus_organisasi($id_organisasi){
        if($this->Ded_m->hapus_organisasi($id_organisasi)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }

    // SUB ORGANISASI
    public function sub_organisasi($id_organisasi){
        $data['organisasi']     = $this->Ded_m->get_all_organisasi_by_id($id_organisasi)->result();

        $id_organisasi          = $this->Ded_m->get_all_organisasi_by_id($id_organisasi)->result()[0]->id_organisasi;
        $data['organisasi']     = $this->Ded_m->get_all_organisasi_by_id($id_organisasi)->result();

        $id_skpa                = $this->Ded_m->get_all_organisasi_by_id($id_organisasi)->result()[0]->id_skpa;
        $data['skpa']           = $this->Ded_m->get_all_ded_by_id($id_skpa)->result();

        $data['Ded_m']          = $this->Ded_m;
        $data['sub_organisasi'] = $this->Ded_m->get_all_sub_organisasi_by_id($id_organisasi)->result();
        $this->template->load('template','masterdata/suborganisasi_v', $data);
    }

    public function post_sub_organisasi(){
        $this->form_validation->set_rules('id_organisasi','ID Organisasi','required');
        $this->form_validation->set_rules('nama_suborganisasi','Nama subOrganisasi','required');
        $this->form_validation->set_rules('tugas','Tugas');
        $this->form_validation->set_rules('fungsi','Fungsi');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $data = array(
                'id_organisasi'         => $this->input->post('id_organisasi'), 
                'nama_suborganisasi'    => $this->input->post('nama_suborganisasi'), 
                'tugas'                 => $this->input->post('tugas'), 
                'fungsi'                => $this->input->post('fungsi'), 
            );

            if($this->Ded_m->post_data_sub_organisasi($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_update_sub_organisasi(){
        $this->form_validation->set_rules('id_organisasi','ID Organisasi','required');
        $this->form_validation->set_rules('id_suborganisasi','ID Sub Organisasi','required');
        $this->form_validation->set_rules('nama_suborganisasi','Nama subOrganisasi','required');
        $this->form_validation->set_rules('tugas','Tugas');
        $this->form_validation->set_rules('fungsi','Fungsi');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $data = array(
                'id_organisasi'         => $this->input->post('id_organisasi'), 
                'nama_suborganisasi'    => $this->input->post('nama_suborganisasi'), 
                'tugas'                 => $this->input->post('tugas'), 
                'fungsi'                => $this->input->post('fungsi'), 
            );
            $id_suborganisasi = $this->input->post('id_suborganisasi');

            if($this->Ded_m->post_update_data_sub_organisasi($id_suborganisasi, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function hapus_suborganisasi($id_suborganisasi){
        if($this->Ded_m->hapus_suborganisasi($id_suborganisasi)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }

    // OBYEK DATA
    public function obyek_data($id_suborganisasi){
        $data['sub_organisasi'] = $this->Ded_m->get_all_suborganisasi_by_id($id_suborganisasi)->result();

        $id_organisasi          = $this->Ded_m->get_all_suborganisasi_by_id($id_suborganisasi)->result()[0]->id_organisasi;
        $data['organisasi']     = $this->Ded_m->get_all_organisasi_by_id($id_organisasi)->result();

        $id_skpa        = $this->Ded_m->get_all_organisasi_by_id($id_organisasi)->result()[0]->id_skpa;
        $data['skpa']   = $this->Ded_m->get_all_ded_by_id($id_skpa)->result();


        $data['Ded_m']          = $this->Ded_m;
        $data['obyek_data']     = $this->Ded_m->get_all_obyek_data_by_id($id_suborganisasi)->result();
        $this->template->load('template','masterdata/obyekdata', $data);
    }

    public function post_objek_data(){
        $this->form_validation->set_rules('id_suborganisasi','ID Organisasi','required');
        $this->form_validation->set_rules('objek_data','Objek Data','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $data = array(
                'id_suborganisasi'  => $this->input->post('id_suborganisasi'), 
                'objek_data'        => $this->input->post('objek_data'), 
            );

            if($this->Ded_m->post_data_objek_data($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_update_objek_data(){
        $this->form_validation->set_rules('id_suborganisasi','ID Organisasi','required');
        $this->form_validation->set_rules('id_objek_data','ID Objek Data','required');
        $this->form_validation->set_rules('objek_data','Objek Data','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $data = array(
                'id_suborganisasi'  => $this->input->post('id_suborganisasi'), 
                'objek_data'        => $this->input->post('objek_data'), 
            );

            $id_objek_data = $this->input->post('id_objek_data');

            if($this->Ded_m->post_update_objek_data($id_objek_data, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function hapus_objek_data($id_objek_data){
        if($this->Ded_m->hapus_objek_data($id_objek_data)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }

    // TABEL DATA
    public function parameter($id_objek_data){
        $data['obyek_data']     = $this->Ded_m->get_all_obyek_data($id_objek_data)->result();

        $id_suborganisasi       = $this->Ded_m->get_all_obyek_data($id_objek_data)->result()[0]->id_objek_data;
        $data['sub_organisasi'] = $this->Ded_m->get_all_suborganisasi_by_id($id_suborganisasi)->result();

        $id_organisasi          = $this->Ded_m->get_all_suborganisasi_by_id($id_suborganisasi)->result()[0]->id_organisasi;
        $data['organisasi']     = $this->Ded_m->get_all_organisasi_by_id($id_organisasi)->result();

        $id_skpa        = $this->Ded_m->get_all_organisasi_by_id($id_organisasi)->result()[0]->id_skpa;
        $data['skpa']   = $this->Ded_m->get_all_ded_by_id($id_skpa)->result();


        $data['Ded_m']          = $this->Ded_m;
        $data['parameter']      = $this->Ded_m->get_all_parameter_by_obj($id_objek_data)->result();
        $this->template->load('template','masterdata/Parameter', $data);
    }

    public function post_parameter(){
        $this->form_validation->set_rules('id_objek_data','ID Objek Data','required');
        $this->form_validation->set_rules('nama_parameter','Nama Parameter','required');
        $this->form_validation->set_rules('tipe_data','Tipe Data','required');
        $this->form_validation->set_rules('panjang_data','Panjang Data','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $data = array(
                'id_objek_data'  => $this->input->post('id_objek_data'), 
                'nama_parameter' => $this->input->post('nama_parameter'), 
                'tipe_data'      => $this->input->post('tipe_data'), 
                'panjang_data'   => $this->input->post('panjang_data'), 
            );

            if($this->Ded_m->post_data_parameter($data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_update_parameter(){
        $this->form_validation->set_rules('id_parameter','ID Parameter','required');
        $this->form_validation->set_rules('nama_parameter','Nama Parameter','required');
        $this->form_validation->set_rules('tipe_data','Tipe Data','required');
        $this->form_validation->set_rules('panjang_data','Panjang Data','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{
            $data = array(
                'nama_parameter' => $this->input->post('nama_parameter'), 
                'tipe_data'      => $this->input->post('tipe_data'), 
                'panjang_data'   => $this->input->post('panjang_data'), 
            );

            $id_parameter = $this->input->post('id_parameter');

            if($this->Ded_m->post_update_data_parameter($id_parameter, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function hapus_parameter($id_parameter){
        if($this->Ded_m->hapus_parameter($id_parameter)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }

    // SKPA NOTE
    public function skpa_note(){
        $data['ded'] = $this->Ded_m->get_all_ded_()->result();
        $this->template->load('template','monitor/monitor_list', $data);
    } 

    public function skpanote($id_skpa){
        $data['skpa'] = $this->Ded_m->get_all_ded_by_id($id_skpa)->row();
        $data['note'] = $this->Ded_m->get_all_note_by_skpa($id_skpa)->result();
        $data['id_skpa'] = $id_skpa;
        $this->template->load('template','monitor/skpanote', $data);
    }

    public function post_note(){
        $this->form_validation->set_rules('judul','Judul','required');
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('note','Note','required');
        $this->form_validation->set_rules('id_skpa','ID SKPA', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'judul'    => $this->input->post('judul'), 
                'tanggal'  => $this->input->post('tanggal'), 
                'note'     => $this->input->post('note'), 
                'id_skpa'  => $this->input->post('id_skpa'),
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
        $this->form_validation->set_rules('id_skpa','ID SKPA', 'required');
        $this->form_validation->set_rules('id_note','ID note', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'judul'    => $this->input->post('judul'), 
                'tanggal'  => $this->input->post('tanggal'), 
                'note'     => $this->input->post('note'), 
                'id_skpa'  => $this->input->post('id_skpa'),
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

    // USER
    public function user_data(){   
        $data['data_user']  = $this->Ded_m->get_all_user()->result();
        $this->template->load('template','user/tbl_user_list', $data);
    } 

    public function post_user(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','trim|required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password','Konfirmasi password','trim|required');
        $this->form_validation->set_rules('level','Level','required');
        $this->form_validation->set_rules('status','Status','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'username'  => $this->input->post('username'), 
                'password'  => md5($this->input->post('password')), 
                'level'     => $this->input->post('level'), 
                'status'    => $this->input->post('status'), 
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
        $this->form_validation->set_rules('id_skpa','ID skpa','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','trim|required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password','Konfirmasi password','trim|required');
        $this->form_validation->set_rules('level','Level','required');
        $this->form_validation->set_rules('status','Status','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, cek data yang Anda masukkan');
            redirect_back();  
        }else{

            $data = array(
                'username'  => $this->input->post('username'), 
                'password'  => md5($this->input->post('password')), 
                'level'     => $this->input->post('level'), 
                'status'    => $this->input->post('status'), 
            );

            $id_skpa = $this->input->post('id_skpa');

            if($this->Ded_m->post_update_data_user($id_skpa, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect_back(); 
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back(); 
            }
        }
    }

    public function hapus_user($id_skpa){
        if($this->Ded_m->hapus_user($id_skpa)){
            $this->session->set_flashdata('sukses','Data anda berhasil dihapus');
            redirect_back(); 
        }else{
            $this->session->set_flashdata('error','Data anda tidak berhasil dihapus');
            redirect_back(); 
        }
    }
}

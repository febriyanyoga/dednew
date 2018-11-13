<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ded_m extends CI_Model
{

    public $table = 'tbl_ded';
    public $id = 'id';
    public $order = 'DESC';
    function __construct()
    {
        parent::__construct();

    }

    function make_captcha(){ //membuat captcha
        $this->load->helper('captcha');
        $vals = array(
            'img_path' => './/assets/img/captcha/',
            'img_url' => base_url().'/assets/img/captcha/',
            'img_width' => '250',
            'img_height' => '50',
            'pool'      => '0123456789',
            'font_path' => '../system/fonts/texb.ttf',
            'expiration' => 3600
        );

        $cap = create_captcha($vals);

        if($cap){
            $data = array(
                'captcha_id' => '',
                'captcha_time' => $cap['time'],
                'ip_address' => $this -> input -> ip_address(),
                'word' => $cap['word']
            );
            $query = $this -> db -> insert_string('captcha', $data);
            $this -> db -> query($query);
        }else{
            return "captcha not work";
        }
        return $cap['image'];
    }

    function check_captcha(){  //post captcha
        $expiration = time()-3600;
        $sql = "DELETE FROM captcha WHERE captcha_time < ?";
        $binds = array($expiration);
        $query = $this->db->query($sql, $binds);

        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if($row -> count > 0){
            return true;
        }
        return false;
    }

    public function get_all_ded_(){
        $this->db->select('*');
        $this->db->from('tbl_skpa');
        return $this->db->get();
    }

    public function get_all_organisasi($id_skpa){
        $this->db->select('*');
        $this->db->where('id_skpa', $id_skpa);
        $this->db->from('tbl_organisasi');
        return $this->db->get();
    }

    public function get_all_ded_by_id($id_skpa){
        $this->db->select('*');
        $this->db->from('tbl_skpa');
        $this->db->where('id_skpa', $id_skpa);
        return $this->db->get();
    }

    public function get_all_organisasi_by_id($id_organisasi){
        $this->db->select('*');
        $this->db->from('tbl_organisasi');
        $this->db->where('id_organisasi', $id_organisasi);
        return $this->db->get();
    }

    public function get_all_sub_organisasi_by_id($id_organisasi){
        $this->db->select('*');
        $this->db->from('tbl_suborganisasi');
        $this->db->where('id_organisasi', $id_organisasi);
        return $this->db->get();
    }

    public function get_all_suborganisasi_by_id($id_suborganisasi){
        $this->db->select('*');
        $this->db->from('tbl_suborganisasi');
        $this->db->where('id_suborganisasi', $id_suborganisasi);
        return $this->db->get();
    }

    public function get_all_obyek_data_by_id($id_suborganisasi){
        $this->db->select('*');
        $this->db->from('tbl_objek_data');
        $this->db->where('id_suborganisasi', $id_suborganisasi);
        return $this->db->get();
    }

    public function get_all_obyek_data($id_objek_data){
        $this->db->select('*');
        $this->db->from('tbl_objek_data');
        $this->db->where('id_objek_data', $id_objek_data);
        return $this->db->get();
    }

    public function get_all_parameter_by_obj($id_objek_data){
        $this->db->select('*');
        $this->db->from('tbl_parameter');
        $this->db->where('id_objek_data', $id_objek_data);
        return $this->db->get();
    }

    // datatables
    public function get_all_ded($id){
        $this->db->select('*');
        $this->db->from('tbl_detail T');
        $this->db->join('tbl_ded D','T.id_ded = D.id');
        $this->db->where('T.id_ded',$id);
        $this->db->order_by('T.id_detail', 'ASC');
        return $this->db->get();
    }

    public function post_data_ded($data){
        $this->db->insert('tbl_detail',$data);
        return TRUE;
    }

    public function post_data_parameter($data){
        $this->db->insert('tbl_parameter',$data);
        return TRUE;
    }

    public function post_data_objek_data($data){
        $this->db->insert('tbl_objek_data',$data);
        return TRUE;
    }

    public function post_data_sub_organisasi($data){
        $this->db->insert('tbl_suborganisasi',$data);
        return TRUE;
    }

    public function post_data_organisasi($data){
        $this->db->insert('tbl_organisasi',$data);
        return TRUE;
    }

    public function post_update_data_organisasi($id_organisasi, $data){
        $this->db->where('id_organisasi', $id_organisasi);
        $this->db->update('tbl_organisasi', $data);
        return TRUE;
    }

    public function post_update_data_sub_organisasi($id_suborganisasi, $data){
        $this->db->where('id_suborganisasi', $id_suborganisasi);
        $this->db->update('tbl_suborganisasi', $data);
        return TRUE;
    }

    public function post_update_objek_data($id_objek_data, $data){
        $this->db->where('id_objek_data', $id_objek_data);
        $this->db->update('tbl_objek_data', $data);
        return TRUE;
    }

    public function post_update_data_parameter($id_parameter, $data){
        $this->db->where('id_parameter', $id_parameter);
        $this->db->update('tbl_parameter', $data);
        return TRUE;
    }

    public function hapus_detail($id_detail){
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('tbl_detail');
        return TRUE;
    }

    public function hapus_parameter($id_parameter){
        $this->db->where('id_parameter', $id_parameter);
        $this->db->delete('tbl_parameter');
        return TRUE;
    }

    public function hapus_objek_data($id_objek_data){
        $this->db->where('id_objek_data', $id_objek_data);
        $this->db->delete('tbl_objek_data');
        return TRUE;
    }

    public function post_update_ded($id_detail, $data){
        $this->db->where('id_detail', $id_detail);
        $this->db->update('tbl_detail', $data);
        return TRUE;
    }

    public function post_data_skpa($data){
        $this->db->insert('tbl_skpa',$data);
        return TRUE;
    }

    public function post_data_update_skpa($id_skpa, $data){
        $this->db->where('id_skpa', $id_skpa);
        $this->db->update('tbl_skpa', $data);
        return TRUE;
    }

    public function hapus_ded($id_skpa){
        $this->db->where('id_skpa', $id_skpa);
        $this->db->delete('tbl_skpa');
        return TRUE;
    }

    public function hapus_organisasi($id_organisasi){
        $this->db->where('id_organisasi', $id_organisasi);
        $this->db->delete('tbl_organisasi');
        return TRUE;
    }

    public function hapus_suborganisasi($id_suborganisasi){
        $this->db->where('id_suborganisasi', $id_suborganisasi);
        $this->db->delete('tbl_suborganisasi');
        return TRUE;
    }

    public function get_dokumen_by_id_skpa($id_skpa){
        $this->db->select('*');
        $this->db->from('tbl_dokumen');
        $this->db->where('id_skpa', $id_skpa);
        return $this->db->get();
    }


    public function upload(){ // Fungsi untuk upload file ke folder
        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'pdf|doc|docx|zip|xlx|xlsx';
        $config['max_size']         = '50048';
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file_upload')){ 
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function save($upload,$id_skpa, $nama_dokumen){
        $data = array(
            'id_skpa'           => $id_skpa,
            'nama_dokumen'      => $nama_dokumen,
            'nama_file'         => $upload['file']['file_name'],
        );
        
        if($this->db->insert('tbl_dokumen', $data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function hapus_dokumen($id_dokumen){
        $this->db->where('id_dokumen', $id_dokumen);
        $this->db->delete('tbl_dokumen');
        return TRUE;
    }


    // skpa note
    public function get_all_note_by_skpa($id_skpa){
        $this->db->where('id_skpa', $id_skpa);
        return $this->db->get('tbl_note');
    }


    public function post_data_note($data){
        $this->db->insert('tbl_note', $data);
        return TRUE;
    }

    public function post_ubah_data_note($id_note, $data){
        $this->db->where('id_note', $id_note);
        $this->db->update('tbl_note', $data);
        return TRUE;
    }

    public function hapus_note($id_note){
        $this->db->where('id_note', $id_note);
        $this->db->delete('tbl_note');
        return TRUE;
    }


    // user
    public function get_all_user_level(){
        return $this->db->get('tbl_user_level');
    }

    public function post_data_user($data){
        $this->db->insert('tbl_skpa', $data);
        return TRUE;
    }

    public function get_all_user(){
        $this->db->select('*');
        $this->db->from('tbl_skpa');
        return $this->db->get();
    }

    public function post_update_data_user($id_skpa, $data){
        $this->db->where('id_skpa', $id_skpa);
        $this->db->update('tbl_skpa', $data);
        return TRUE;
    }

    public function hapus_user($id_skpa){
        $this->db->where('id_skpa', $id_skpa);
        $this->db->delete('tbl_skpa');
        return TRUE;
    }
    // end user

}


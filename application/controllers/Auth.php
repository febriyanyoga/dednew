<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Auth extends CI_Controller{
    var $data = array();
    
    public function __construct()
    {
        parent::__construct();  
        $this->load->model(['Ded_m']);
        $this->load->helper('url');

    }
    
    function index(){
        $data['cap_img'] = $this->Ded_m->make_captcha();
        $this->load->view('auth/login', $data);
    }
    
    function cheklogin(){
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        // query chek users
        $this->db->where('username',$username);
        $this->db->where('password',  md5($password));
        $user = $this->db->get('tbl_skpa');

        if($this->Ded_m->check_captcha() == TRUE){
            if($user->num_rows()>0){
                if($user->row()->status == 'aktif'){
                    if($user->row()->level == 'admin'){
                        $userData       = array(
                            'username'  => $user->row()->username,
                            'level'     => $user->row()->level,
                            'status'    => $user->row()->status,
                            'logged_in' => TRUE,
                        );
                        $this->session->set_userdata($userData);
                        redirect('Admin');
                    }elseif ($user->row()->level == 'user'){
                        $userData       = array(
                            'username'  => $user->row()->username,
                            'level'     => $user->row()->level,
                            'status'    => $user->row()->status,
                            'logged_in' => TRUE,
                        );
                        $this->session->set_userdata($userData);
                        redirect('User');
                    }else{
                        $this->session->set_flashdata('status_login','anda bukan user');
                        redirect('auth');
                    }
                }else{
                    $this->session->set_flashdata('status_login','akun anda belum aktif');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('status_login','email atau password yang anda input salah');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('status_login','Captcha salah');
            redirect('auth');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}

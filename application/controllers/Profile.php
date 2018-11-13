<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_profil');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'profile/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'profile/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'profile/index.html';
            $config['first_url'] = base_url() . 'profile/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_profil->total_rows($q);
        $profile = $this->Tbl_profil->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'profile_data' => $profile,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','profile/tbl_profil_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_profil->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_sistem' => $row->nama_sistem,
		'alamat' => $row->alamat,
		'provinsi' => $row->provinsi,
		'kabupaten' => $row->kabupaten,
		'no_telp' => $row->no_telp,
		'logo' => $row->logo,
	    );
            $this->template->load('template','profile/tbl_profil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profile/create_action'),
	    'id' => set_value('id'),
	    'nama_sistem' => set_value('nama_sistem'),
	    'alamat' => set_value('alamat'),
	    'provinsi' => set_value('provinsi'),
	    'kabupaten' => set_value('kabupaten'),
	    'no_telp' => set_value('no_telp'),
	    'logo' => set_value('logo'),
	);
        $this->template->load('template','profile/tbl_profil_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_sistem' => $this->input->post('nama_sistem',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'logo' => $this->input->post('logo',TRUE),
	    );

            $this->Tbl_profil->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('profile'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_profil->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profile/update_action'),
		'id' => set_value('id', $row->id),
		'nama_sistem' => set_value('nama_sistem', $row->nama_sistem),
		'alamat' => set_value('alamat', $row->alamat),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'logo' => set_value('logo', $row->logo),
	    );
            $this->template->load('template','profile/tbl_profil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile'));
        }
    }
    
   function upload_foto(){
        $config['upload_path']          = './assets/foto_profil';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('logo');
        return $this->upload->data();
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
             if($foto['file_name']==''){
                 // update data tanpa logo
                 $data = array(
		'nama_sistem' => $this->input->post('nama_sistem',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
	    );
             }else{
                 // update data dengan logo
            $data = array(
		'nama_sistem' => $this->input->post('nama_sistem',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'logo' => $foto['file_name'],
	    );
             }

            $this->Tbl_profil->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profile/update/1'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_profil->get_by_id($id);

        if ($row) {
            $this->Tbl_profil->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profile'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profile/'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_sistem', 'nama rumah sakit', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telpon', 'trim|required');
	//$this->form_validation->set_rules('logo', 'logo', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();
        $this->output->enable_profiler(false);
    }

    public function index(){

    	$this->load->model('m_account');
    	if($this->m_account->is_admin()){
        	redirect('app');            
        }

    	$post = $this->input->post();
    	if($post['go']){

    		if ($this->m_account->do_login($post['usr'], $post['pwd'])) {                
                
                redirect('app');
                
            } else {
                $this->data['error'] = $this->m_account->umsg;                
            }


    	}else{

    		$error = $this->session->flashdata('error');
    		if(isset($error)) $this->data['error'] = $error;

    		$success = $this->session->flashdata('success');
    		if(isset($success)) $this->data['success'] = $success;   			

    	}

    	$this->load->view('v_login', $this->data);
    }

    public function map(){
        $this->load->view('v_map', $this->data);       
    }

}    
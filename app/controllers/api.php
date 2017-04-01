<?php
require(APPPATH.'libraries/REST_Controller.php');
 
class api extends REST_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->output->enable_profiler(false);

	}

	function resto_get(){

		if(!$this->get('id'))
        {
        	$this->response(array('error' => 'The field id is required'), 404);
        }

		$this->load->model('m_resto');
		$data = $this->m_resto->get_resto($this->get('id'));		

		if($data)
        {
            $this->response($data, 200); 
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }

	}

	function cats_get(){
		if(!$this->get('id'))
        {
        	$this->response(array('error' => 'The field id is required'), 404);
        }

        $this->load->model('m_category');		        
		$data = $this->m_category->get_category_by_resto($this->get('id'));		

		if($data)
        {
            $this->response($data, 200); 
        }

        else
        {
            $this->response(array('error' => 'Cats could not be found'), 404);
        }

	}

	function data_get(){
		if(!$this->get('id'))
        {
        	$this->response(array('error' => 'The field id is required'), 404);
        }

        $this->load->model('m_content');		        
		$data = $this->m_content->get_content_by_resto($this->get('id'));		

		if($data)
        {
            $this->response($data, 200); 
        }

        else
        {
            $this->response(array('error' => 'Content could not be found'), 404);
        }
	}

    function version_get(){
        if(!$this->get('id'))
        {
            $this->response(array('error' => 'The field id is required'), 404);
        }

        $this->load->model('m_resto');
        $data = $this->m_resto->get_version($this->get('id'));        

        if($data)
        {
            $this->response($data, 200); 
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }


    }

	function feedback_post(){

		$post['resto_id'] = $this->post('resto_id');
		$post['fullname'] = $this->post('fullname');
		$post['email'] 	  = $this->post('email');
		$post['comment']  = $this->post('comment');
        $post['phone']  = $this->post('phone');

		if(!$this->post('email') || !$this->post('fullname') || !$this->post('comment'))
        {
            // response to client
        	$this->response(array('error' => 'Nama, Email dan Komentar harus diisikan'), 404);
        }

		$this->load->model('m_feedback');
		$data = $this->m_feedback->add_feedback($post);

		if($data)
        {
            $this->response(array('success' => $this->m_feedback->get_msg()), 200); 
        }

        else
        {
            $this->response(array('error' => 'Data feedback gagal dikirim, silahkan coba kembali'), 404);
        }	

	}
 
}
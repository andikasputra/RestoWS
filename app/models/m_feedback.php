<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_feedback extends CoreModel {	

	public function get_feedback($id){

		$this->db->where('resto_id', $id);		
		$this->db->order_by('postdate','desc');
		return $this->db->get('tb_feedback')->result();
 
	}

	public function count_feedback($id){
		return count($this->get_feedback($id));
	}

	public function add_feedback($data = array()){

		$rules = array(
            array('field' => 'resto_id', 'label' => 'Id Resto', 'rules' => 'required|is_natural_no_zero'),  
            array('field' => 'fullname', 'label' => 'Nama Lengkap', 'rules' => 'required|trim'),  
            array('field' => 'email', 'label' => 'Email', 'rules' => 'trim'),  
            array('field' => 'phone', 'label' => 'Nomer Handphone', 'rules' => 'trim'),  
            array('field' => 'comment', 'label' => 'Komentar', 'rules' => 'required|trim')            
        );

		if (!$this->set_field($rules)) {			
            $this->umsg = $this->msg;
            return false;
        }

        $data['postdate'] = date('c');
        if ($this->db->insert('tb_feedback', $data)) {
            $this->umsg = 'Data feedback berhasil ditambah';
            return true;
        } else {
            $this->umsg = 'Data feedback gagal ditambah';
            return false;
        }

	}

}
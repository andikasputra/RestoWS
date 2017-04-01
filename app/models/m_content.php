<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_content extends CoreModel {	

	public function add_content($data = array()){
		$rules = array(
            array('field' => 'categories_id', 'label' => 'Kategori', 'rules' => 'required|is_natural_no_zero'),  
            array('field' => 'content_title', 'label' => 'Judul', 'rules' => 'required|trim'),  
            array('field' => 'content_desc', 'label' => 'Deskripsi', 'rules' => 'required|trim'),  
            array('field' => 'content_var1', 'label' => 'Variabel', 'rules' => 'trim'),
            array('field' => 'content_img', 'label' => 'Image', 'rules' => 'trim'),
            array('field' => 'content_thumb', 'label' => 'Thumbnail Image', 'rules' => 'trim')
        );

        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;
            return false;
        }

        $data['content_post'] = date('c');
        if ($this->db->insert('tb_content', $data)) {
            $this->umsg = 'Data content berhasil ditambah';
            return true;
        } else {
            $this->umsg = 'Data content gagal ditambah';
            return false;
        }

	}

    public function edit_content($id, $data = array()){
        $rules = array(
            array('field' => 'categories_id', 'label' => 'Kategori', 'rules' => 'required|is_natural_no_zero'),  
            array('field' => 'content_title', 'label' => 'Judul', 'rules' => 'required|trim'),  
            array('field' => 'content_desc', 'label' => 'Deskripsi', 'rules' => 'required|trim'),  
            array('field' => 'content_var1', 'label' => 'Variabel', 'rules' => 'trim'),
            array('field' => 'content_img', 'label' => 'Image', 'rules' => 'trim'),
            array('field' => 'content_thumb', 'label' => 'Thumbnail Image', 'rules' => 'trim')
        );

        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;
            return false;
        }
        
        $this->db->where('content_id', $id);
        if ($this->db->update('tb_content', $data)) {
            $this->umsg = 'Data content berhasil diubah';
            return true;
        } else {
            $this->umsg = 'Data content gagal diubah';
            return false;
        }
    }

	public function get_detail_content($id){

		$this->db->where('content_id', $id);
		$this->db->join('tb_categories','tb_categories.categories_id = tb_content.categories_id');

		return $this->db->get('tb_content')->row();
 
	}

    public function delete_content($id){
        $this->db->where('content_id', $id);
        return $this->db->delete('tb_content');

    }

	public function get_content_by_type($id){

		$this->db->where('tb_categories.categories_id', $id);		
		$this->db->join('tb_categories','tb_categories.categories_id = tb_content.categories_id');
		$this->db->order_by('content_post', 'desc');

		return $this->db->get('tb_content')->result();

	}

    public function get_content_by_cats($id, $cats){

        $this->db->where('tb_categories.category_type', $cats);       
        $this->db->where('resto_id', $id);
        $this->db->join('tb_categories','tb_categories.categories_id = tb_content.categories_id');
        $this->db->order_by('content_post', 'desc');

        return $this->db->get('tb_content')->result();

    }

    public function get_content_by_resto($id){

        $this->db->where('resto_id', $id);
        $this->db->join('tb_categories','tb_categories.categories_id = tb_content.categories_id');
        $this->db->order_by('content_post', 'desc');

        return $this->db->get('tb_content')->result();


    }

    public function count_content($id, $cats){
        return count($this->get_content_by_cats($id, $cats));
    }

	public function update_content($id, $data = array()){		

		$rules = array(
            array('field' => 'categories_id', 'label' => 'Kategori', 'rules' => 'is_natural_no_zero'),  
            array('field' => 'content_title', 'label' => 'Judul', 'rules' => 'trim'),  
            array('field' => 'content_desc', 'label' => 'Deskripsi', 'rules' => 'trim'),  
            array('field' => 'content_var1', 'label' => 'Variabel', 'rules' => 'trim'),
            array('field' => 'content_img', 'label' => 'Image', 'rules' => 'trim'),
            array('field' => 'content_thumb', 'label' => 'Thumbnail Image', 'rules' => 'trim')
        );

        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;
            return false;
        }

        $this->db->where('content_id', $id);
        if ($this->db->update('tb_content', $data)) {        
            $this->umsg = 'Data content berhasil diubah';
            return true;
        } else {        	
            $this->umsg = 'Data content gagal diubah';
            return false;
        }


	}

}	
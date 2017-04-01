<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_category extends CoreModel {	

	public function get_category_by_resto($id){

		$sql = "SELECT ct.categories_id,resto_id,category_name,category_desc,category_type, 
            SUM(cn.total) AS jml
            FROM tb_categories ct LEFT JOIN
            (SELECT categories_id,COUNT(*) AS total FROM tb_content GROUP BY categories_id) cn
            ON ct.categories_id = cn.categories_id
            WHERE resto_id = $id
            GROUP BY ct.categories_id,resto_id,category_name,category_desc,category_type";

        return $this->db->query($sql)->result();    

	}

    public function delete_category($id){
        $this->db->where('categories_id', $id);
        $rs = $this->db->delete('tb_categories');

        return $rs;
    }

    public function get_detail_category($id){
        $this->db->where('categories_id', $id);
        return $this->db->get('tb_categories')->row();
    }

	public function get_category_except_menu($id){

		$this->db->where('resto_id', $id);
		$this->db->where('category_type <> 1');

		return $this->db->get('tb_categories')->result();
	}

	public function add_category($data = array()){

		$rules = array(
            array('field' => 'resto_id', 'label' => 'Id Resto', 'rules' => 'is_natural_no_zero'),  
            array('field' => 'category_name', 'label' => 'Nama Kategori', 'rules' => 'required|trim'),  
            array('field' => 'category_desc', 'label' => 'Deskripsi', 'rules' => 'required|trim'),  
            array('field' => 'category_type', 'label' => 'Variabel', 'rules' => 'trim')            
        );

        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;
            return false;
        }

        if ($this->db->insert('tb_categories', $data)) {
            $this->umsg = 'Data kategori berhasil ditambah';
            return true;
        } else {
            $this->umsg = 'Data kategori gagal ditambah';
            return false;
        }

	}

    public function edit_category($id, $data = array()){
        $rules = array(            
            array('field' => 'category_name', 'label' => 'Nama Kategori', 'rules' => 'required|trim'),  
            array('field' => 'category_desc', 'label' => 'Deskripsi', 'rules' => 'required|trim')
        );

        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;
            return false;
        }

        $this->db->where('categories_id', $id);
        if ($this->db->update('tb_categories', $data)) {
            $this->umsg = 'Data kategori berhasil diubah';
            return true;
        } else {
            $this->umsg = 'Data kategori gagal diubah';
            return false;
        }
    }

}	
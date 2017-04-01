<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_account extends CoreModel {	

	public function do_login($usr, $pwd) {

        $rules = array(
            array(
                'field' => 'usr',
                'label' => 'Email atau Id Resto',
                'rules' => 'required'
            ),
            array(
                'field' => 'pwd',
                'label' => 'Password',
                'rules' => 'required'
            )
        );

        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;
            return false;
        }


        if ($this->_login($usr, $pwd)) {
            return true;
        } else {

            //$this->umsg = 'Login tidak berhasil, silahkan cek kembali user dan password anda';
            return false;
        }
    }

    public function do_logout(){
    	$this->_del_cookies();
    }

    public function is_admin(){
    	return $this->_valid_cookies();
    }

    public function get_admin(){
    	return $this->_get_cookies();
    }

    public function get_account($id){
        $this->db->where('resto_id', $id);
        return $this->db->get('tb_resto')->row();
    }

    private function _login($u, $p) {
        $p = md5($p);
        
        $this->db->where("(resto_id = '$u' or resto_email = '$u')");
        $this->db->where('resto_password', $p);
        $this->db->where('resto_status', 1);        
        $query = $this->db->get('tb_resto');
        
        $rs = $query->row_array();

        if ($this->db->affected_rows() > 0) {
            $usr_data['id'] = $rs['resto_id'];
            $usr_data['name'] = $rs['resto_name'];
            $usr_data['log'] = $rs['last_log'];          

            if(time()>strtotime($rs['valid']))
                $this->umsg = 'Account anda expired, Silahkan hubungi support kami';
            else{
                $this->_set_cookies($usr_data);

                $this->_update_log($rs['resto_id']);

                return true;
            } 

            
        } else {
            $this->umsg = 'Login tidak berhasil, silahkan cek kembali user dan password anda';
            return false;
        }
    }

    private function _update_log($id){
		
		$str = "update tb_resto set last_log = now() where resto_id = ".$id;
		$this->db->query($str);    	

    	//$this->db->where('resto_id', $id);
    	//$this->db->update(array('last_log' => date('c')), 'tb_resto');

    	if ($this->db->affected_rows() > 0) {
            return true;
        } else {
			return false;
        }

    }

    private function _set_cookies($usr_data) {
        $this->session->set_userdata($usr_data);
    }

    private function _get_cookies() {
        $sess = array();

        $sess['id'] = $this->session->userdata('id');
        $sess['name'] = $this->session->userdata('name');
        $sess['log'] = $this->session->userdata('log');     

        return $sess;
    }


    private function _valid_cookies() {
        if ($this->session->userdata('id') != '')
            return true;
        else
            return false;
    }

    private function _del_cookies() {
        $sess = array();

        $sess['id'] = '';
        $sess['name'] = '';
        $sess['log'] = '';        

        $this->session->unset_userdata($sess);        
    }

    public function edit_pass($id, $post){
        $rules = array(
            array('field' => 'old_pass', 'label' => 'Password Lama', 'rules' => 'required|trim'),
            array('field' => 'new_pass', 'label' => 'Password Baru', 'rules' => 'required|trim|min_length[6]|alpha_numeric'),
            array('field' => 'konf_pass', 'label' => 'Konfirmasi Password', 'rules' => 'matches[new_pass]'),            
        );    
        
        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;                        
            return false;
        }
        
        if(!$this->_check_pass($id, $post['old_pass'])){
            $this->umsg = "Password lama tidak sesuai";                        
            return false;
        }
        
        $this->db->where('resto_id', $id);
        return $this->db->update('tb_resto', array('resto_password'=>md5($post['new_pass'])));
    }

    private function _check_pass($id, $pass){
        $this->db->where('resto_id',$id);
        $que = $this->db->get('tb_resto');
        
        $rst = $que->row_array();
        if($rst['resto_password']==md5($pass))
            return true;
        else return false;
    }

    public function edit_account($id, $data = array()){
        $rules = array( 
            array('field' => 'resto_desc', 'label' => 'Deskripsi', 'rules' => 'required|trim'),
            array('field' => 'resto_address', 'label' => 'Alamat', 'rules' => 'required|trim'),  
            array('field' => 'resto_lat', 'label' => 'Koordinat Latitude', 'rules' => 'trim'),
            array('field' => 'resto_lon', 'label' => 'Koordinat Longitude', 'rules' => 'trim'),
            array('field' => 'resto_email', 'label' => 'Email', 'rules' => 'required|valid_email|trim'),
            array('field' => 'resto_phone', 'label' => 'Telephone', 'rules' => 'required|trim')
        );

        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;
            return false;
        }

        $this->db->where('resto_id', $id);
        if ($this->db->update('tb_resto', $data)) {
            $this->umsg = 'Data content berhasil ditambah';
            return true;
        } else {
            $this->umsg = 'Data content gagal ditambah';
            return false;
        }
    }

}

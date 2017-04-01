<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_resto extends CoreModel {	

	public function get_resto($id){

		$this->db->where('resto_id', $id);
		return $this->db->get('tb_resto')->row();

	}	

	public function get_version($id){

		$this->db->select('resto_version');
		$this->db->where('resto_id', $id);
		return $this->db->get('tb_resto')->row();

	}

	public function update_version($id){
		
		$sql = "UPDATE tb_resto SET resto_version = resto_version+1 WHERE resto_id = ".$id;
		
		$this->db->query($sql);
		return true;
	}

	public function send_mail($post = array()){

		$rules = array(
            array('field' => 'bank_from', 'label' => 'Bank Asal', 'rules' => 'required|trim'),  
            array('field' => 'bank_to', 'label' => 'Bank Tujuan', 'rules' => 'required|trim'),  
            array('field' => 'nominal', 'label' => 'Nominal', 'rules' => 'required|number|trim'),
            array('field' => 'desc', 'label' => 'Catatan', 'rules' => 'trim')
        );

        if (!$this->set_field($rules)) {
            $this->umsg = $this->msg;
            return false;
        }else{

        	$msg = "APP ID\t: $post[resto_id]\nAPP Name\t: $post[resto_name]\nAddress\t: $post[resto_address]\nEmail\t: $post[resto_email]\nPhone\t: $post[resto_phone]\nCatatan\t: $post[desc]\n\nPembayaran dilakukan dari $post[bank_from] ke Bank $post[bank_to] Sebesar IDR ".number_format($post['nominal'])."\n\n(c) WebApk";

        	$this->load->library('email');

			$this->email->from('apk@bytech.com', 'Aplikasi Webapk');
			$this->email->to('arif.laksito@gmail.com');

			$this->email->subject('Konfirmasi bayar '.$post['resto_id'].' - '.$post['resto_name']);
			$this->email->message($msg);	

			$this->email->send();

			$this->umsg = "Data konfirmasi berhasil dikirim";
			return true;

        }

	}

}
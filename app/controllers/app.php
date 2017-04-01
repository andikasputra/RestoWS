<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class app extends CI_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();
        $this->output->enable_profiler(false);

        $this->load->model('m_account');
        if(!$this->m_account->is_admin()){
            $this->session->set_flashdata('error', 'Anda tidak diperkenankan mengakses halaman ini');
            redirect('login');
        }

        $this->data['c'] = $this->m_account->get_admin();

    }

    public function index(){

        $this->load->model(array('m_feedback', 'm_content', 'm_category'));

        $this->data['title'] = 'Dashboard';
        $this->data['page']  = 'p_home';
        $this->data['feedback'] = $this->m_feedback->count_feedback($this->data['c']['id']);
        $this->data['news']  = $this->m_content->count_content($this->data['c']['id'], 2);
        $this->data['menu']  = $this->m_content->count_content($this->data['c']['id'], 4);
        $this->data['disc']  = $this->m_content->count_content($this->data['c']['id'], 3);
        $this->data['acc']   = $this->m_account->get_account($this->data['c']['id']);

        $this->data['cats']  = $this->m_category->get_category_by_resto($this->data['c']['id']);

        $this->load->view('v_dashboard', $this->data);
    
    }

    public function cats($mode='', $id=''){

        $this->load->model(array('m_category', 'm_resto'));
        $post = $this->input->post();

        if($mode==''){
            $this->data['title'] = 'Kategori';
            $this->data['page']  = 'p_cats';

            $success = $this->session->flashdata('success');
            if(isset($success)) $this->data['success'] = $success; 

            $error = $this->session->flashdata('error');
            if(isset($error)) $this->data['error'] = $error; 

            $this->data['cats']  = $this->m_category->get_category_by_resto($this->data['c']['id']);
        }else if($mode=='add'){
            $this->data['title'] = 'Tambah Kategori';
            $this->data['page']  = 'p_cats_new';            

            if($post['go']){
                unset($post['go']);
                $post['resto_id'] = $this->data['c']['id'];
                $post['category_type'] = 4;
                
                if(!$this->m_category->add_category($post)){
                    $this->data['error'] = $this->m_category->get_msg();                    
                }else{

                    $this->session->set_flashdata('success', $this->m_category->get_msg());
                    $this->m_resto->update_version($this->data['c']['id']);

                    redirect('app/cats');       

                }    

            }

            $this->data['post']  = $post;
        }else if($mode=='del' && $id!=''){
            $this->data['title'] = 'Hapus Kategori';
            $this->data['page']  = 'k_cats';   

            $this->data['cats']  = $this->m_category->get_detail_category($id);
            $this->data['id'] = $id;
        }else if($mode=='delf' && $id!=''){
            
            if(!$this->m_category->delete_category($id))                
                $this->session->set_flashdata('error', "Data Kategori gagal dihapus");
            else{
                $this->session->set_flashdata('success', "Data Kategori berhasil dihapus");                
                $this->m_resto->update_version($this->data['c']['id']);
            }    

            redirect('app/cats');          

        }else if($mode=='edit' && $id!=''){
            $this->data['title'] = 'Edit Kategori';
            $this->data['page']  = 'p_cats_new'; 

            $post = $this->m_category->get_detail_category($id);

            if($this->input->post('go')){

                $post = $this->input->post();
                unset($post['go']);
                if(!$this->m_category->edit_category($id, $post)){
                    $this->data['error'] = $this->m_category->get_msg();      
                }else{
                    $this->session->set_flashdata('success', $this->m_category->get_msg());
                    $this->m_resto->update_version($this->data['c']['id']);

                    redirect('app/cats'); 
                }
            }

            $this->data['post'] = (array)$post;
        }

        $this->load->view('v_dashboard', $this->data);    
    }

    public function write(){

        $this->load->model(array('m_category', 'm_content', 'm_resto'));
    
        $this->data['title'] = 'Tulis Content';
        $this->data['page']  = 'p_write';
        $this->data['cats']  = $this->m_category->get_category_except_menu($this->data['c']['id']);
        $p = array();

        $post = $this->input->post();
        if($post['go']){
                       
            unset($post['go']);

            if($post['var1']!='') $post['content_var1'] = $post['var1'];
            if($post['var2']!='') $post['content_var1'] = $post['var2'];

            //$post['content_var1'] = ($post['var1']!='')?$post['var1']:$post['var2']; 
            unset($post['var1']);
            unset($post['var2']);

            $dir = './image/'.date('Y').'/'.date('m');
            if (!is_dir($dir)) 
                mkdir($dir, 0777, true);

            $cfg['upload_path']   = $dir;
            $cfg['file_name']     = 'img_'.date('YmdHis');
            $cfg['allowed_types'] = 'png|jpg|jpeg';
            $cfg['max_size']      = '1024';                
            $cfg['overwrite']     = false;
            $cfg['remove_spaces'] = true;
            $this->load->library('upload', $cfg);

            if (!$this->upload->do_upload('content_img')) {
                $this->data['error'] = $this->upload->display_errors();
                
            } else {            
                $upload_data = $this->upload->data();
                $post['content_img'] = $dir.'/'.$upload_data['file_name'];                

                if(!$this->m_content->add_content($post)){
                    $this->data['error'] = $this->m_content->get_msg();
                    unlink($dir.'/'.$upload_data['file_name']);
                }else{                                            

                    $id = $this->db->insert_id();

                    $config['image_library'] = 'gd2';
                    $config['source_image']  = $dir.'/'.$upload_data['file_name'];
                    $config['create_thumb']  = false;
                    $config['maintain_ratio'] = true;
                    $config['width']    = 350;
                    $config['height']   = 350;          

                    $this->load->library('image_lib', $config); 
                    $this->image_lib->resize();

                    $this->session->set_flashdata('msg', $this->m_content->get_msg());
                    $this->m_resto->update_version($this->data['c']['id']);

                    redirect('app/crop/'.$id.'/do');                
                }
            }    
            
        }
        
        $this->data['post'] = $post;
        $this->load->view('v_dashboard', $this->data);    
    }

    public function crop($id, $do = ''){

        $this->load->model('m_content');
        $content = $this->m_content->get_detail_content($id);

        $config['image_library'] = 'gd2';
        $config['source_image']  = $content->content_img;                                                     
        $config['create_thumb']   = true;
        $config['maintain_ratio'] = false;

        $fn = explode('.', $content->content_img);
        $fl = count($fn)-1;            

        $fname = '';
        for($i=0; $i<$fl; $i++){
            $s = ($i>0)?'.':'';
            $fname .= $s.$fn[$i];
        }
        $fname .= '_thumb.'.$fn[$fl];      

        if($do == 'do'){

            $this->data['title'] = 'Crop Gambar';
            $this->data['page']  = 'p_crop';
            $this->data['content'] = $content;                                     

            $post = $this->input->post();
            if($post){
                $config['x_axis'] = $post['x'];
                $config['y_axis'] = $post['y'];
                $config['width']  = $post['w'];
                $config['height'] = $post['h'];          

                $this->load->library('image_lib', $config); 
                $this->image_lib->crop();

                $this->image_lib->clear();
                unset($config['x_axis']);
                unset($config['y_axis']);
                $config['source_image']  = $fname;   
                $config['create_thumb']  = false;
                $config['width']    = 120;
                $config['height']   = 120;                    

                $this->image_lib->initialize($config); 
                $this->image_lib->resize();   

                $this->m_content->update_content($id, array('content_thumb'=>$fname));
               
                $this->session->set_flashdata('success','Data content berhasil ditambah');
                redirect('app/content');  
            }

            $this->load->view('v_dashboard', $this->data);    
        }else{

            $config['width']    = 120;
            $config['height']   = 120;    

            $this->load->library('image_lib', $config); 
            $this->image_lib->resize();                 

            $this->m_content->update_content($id, array('content_thumb'=>$fname));                        

            $success = $this->session->flashdata('msg');        
            $this->session->set_flashdata('success', $success);

            redirect('app/content');
        }

    }

    public function content($mode='', $id=''){        
        $this->load->model(array('m_content', 'm_resto','m_category'));
        if($mode=='' && $id==''){
                    
            $this->data['title'] = 'Daftar Content';
            $this->data['page']  = 'p_content';

            $success = $this->session->flashdata('success');
            if(isset($success)) $this->data['success'] = $success;      

            $this->data['cats']  = $this->m_category->get_category_except_menu($this->data['c']['id']);
        }elseif($mode=='del' && $id!=''){            

            $this->data['title'] = 'Konfirmasi Hapus Content';
            $this->data['page']  = 'k_content';    
            $this->data['id']    = $id;            

            $this->data['content'] = $this->m_content->get_detail_content($id);
        }elseif($mode=='delf' && $id!=''){
            
            $con = $this->m_content->get_detail_content($id);

            if($con->resto_id == $this->data['c']['id']){

                unlink($con->content_img);
                unlink($con->content_thumb);                
                $this->m_content->delete_content($con->content_id);                

                $this->m_resto->update_version($this->data['c']['id']);
                $this->session->set_flashdata('success', "Data Content berhasil dihapus");
                redirect('app/content');            

            }
            
        }elseif($mode=='edit' && $id!=''){
            $this->data['title'] = 'Edit Content';
            $this->data['page']  = 'p_write';
            $this->data['cats']  = $this->m_category->get_category_except_menu($this->data['c']['id']);
            $post = $this->m_content->get_detail_content($id);           

            if($this->input->post('go')){

                $post = $this->input->post();
                unset($post['go']);

                if($post['var1']!='') $post['content_var1'] = $post['var1'];
                if($post['var2']!='') $post['content_var1'] = $post['var2'];
                
                unset($post['var1']);
                unset($post['var2']);                   

                if(!$this->m_content->edit_content($id, $post)){
                    $this->data['error'] = $this->m_content->get_msg();                 
                }else{   
                    $this->m_resto->update_version($this->data['c']['id']);
                    if($_FILES['content_img']['name']!=''){
                       
                        $dir = './image/'.date('Y').'/'.date('m');
                        if (!is_dir($dir)) 
                            mkdir($dir, 0777, true);

                        $cfg['upload_path']   = $dir;
                        $cfg['file_name']     = 'img_'.date('YmdHis');
                        $cfg['allowed_types'] = 'png|jpg|jpeg';
                        $cfg['max_size']      = '1024';                
                        $cfg['overwrite']     = false;
                        $cfg['remove_spaces'] = true;
                        $this->load->library('upload', $cfg);

                        if (!$this->upload->do_upload('content_img')) {
                            $this->data['error'] = $this->upload->display_errors();
                            
                        } else {            
                            $upload_data = $this->upload->data();                                                                       

                            $cn = $this->m_content->get_detail_content($id);
                            unlink($cn->content_img);
                            unlink($cn->content_thumb);   

                            $post['content_img'] = $dir.'/'.$upload_data['file_name']; 
                            $this->m_content->edit_content($id, $post);
                           
                            $config['image_library'] = 'gd2';
                            $config['source_image']  = $dir.'/'.$upload_data['file_name'];
                            $config['create_thumb']  = false;
                            $config['maintain_ratio'] = true;
                            $config['width']    = 350;
                            $config['height']   = 350;          

                            $this->load->library('image_lib', $config); 
                            $this->image_lib->resize();                                                

                            redirect('app/crop/'.$id.'/do');                
                            
                        }    

                    }else{
                        $this->session->set_flashdata('success', $this->m_content->get_msg());
                        redirect('app/content');            
                    }                    
                }    
            }

            $this->data['post'] = (array)$post;

        }
        
        $this->load->view('v_dashboard', $this->data);    
    }    

    public function load_content(){

        $id = $this->input->post('id');

        $this->load->model('m_content');
        $this->data['content'] = $this->m_content->get_content_by_type($id);

        $this->load->view('l_content', $this->data);    

    }

    public function feedback(){

        $this->load->model('m_feedback');
    
        $this->data['title'] = 'Feedback';
        $this->data['page']  = 'p_feedback';
        $this->data['feedback'] = $this->m_feedback->get_feedback($this->data['c']['id']);
        
        $this->load->view('v_dashboard', $this->data);    
    }  

    public function profile(){
    
        $this->data['title'] = 'Profile';
        $this->data['page']  = 'p_profile';        


        if($this->input->post()){

            $data = $this->input->post();
            $sts = $this->m_account->edit_account($this->data['c']['id'], $data);
            $this->data['sts'] = $sts;
            $this->data['msg'] = $this->m_account->get_msg();

            $this->load->model('m_resto');
            $this->m_resto->update_version($this->data['c']['id']);

            $post = $data;      
        }
        
        $post = $this->m_account->get_account($this->data['c']['id']);
        $this->data['post'] = $post; 
        $this->load->view('v_dashboard', $this->data);    
    }  

    public function pwd(){
    
        $this->data['title'] = 'Ganti Password';
        $this->data['page']  = 'p_pwd';

        $post  = $this->input->post();
        if($post){

            $sts = $this->m_account->edit_pass($this->data['c']['id'], $post);
            $this->data['sts'] = $sts;

            $this->data['msg'] = ($sts)?"Password berhasil diubah":$this->m_account->get_msg(); 

        }
        
        $this->load->view('v_dashboard', $this->data);    
    }  

    public function apk(){
        $this->data['title'] = 'Aplikasi Android';
        $this->data['page']  = 'p_apk';
        
        $this->load->view('v_dashboard', $this->data);    
    }

    public function support(){
        $this->data['title'] = 'Support/Bantuan';
        $this->data['page']  = 'p_support';
        
        $this->load->view('v_dashboard', $this->data);    
    }

    public function payment(){
        $this->data['title'] = 'Pembayaran';
        $this->data['page']  = 'p_payment';
        $this->load->model('m_resto');
        $post = $this->input->post();

        if($post){
            
            $sts = $this->m_resto->send_mail($post);

            $this->data['sts'] = $sts;
            $this->data['msg'] = $this->m_resto->get_msg();               

        }

        $this->data['resto'] = $this->m_resto->get_resto($this->data['c']['id']);
        $this->data['post'] = $post;     
        $this->load->view('v_dashboard', $this->data);    
    }

    public function logout(){
        $this->m_account->do_logout();
        $this->session->set_flashdata('success', 'Anda berhasil logout/keluar dari aplikasi');

        redirect('login');
    }

    public function tes(){
        $this->load->model(array('m_feedback','m_content'));
        $data = $this->m_feedback->add_feedback();

        $this->m_feedback->add_feedback();
        echo $this->m_feedback->get_msg();
    }

    public function map(){
        $this->load->view('v_map', $this->data);       
    }

}  
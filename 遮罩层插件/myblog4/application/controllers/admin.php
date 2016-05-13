<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this -> load -> model('admin_model');
        $this -> load -> model('blog_model');

    }

    public function login(){
        $this->load->view('admin/login');
    }

    public function logout(){
        $this -> session -> unset_userdata('admin');
        redirect('admin/login');
    }

    public function check_login(){
        //1. 接数据
        $admin_name = $this -> input -> post('admin_name');
        $admin_pwd = $this -> input -> post('admin_pwd');


        //2. 查数据
        $this -> load -> model('admin_model');
        $row = $this -> admin_model -> get_by_name_pwd($admin_name, $admin_pwd);

        //跳转
        if($row){
            $this -> session -> set_userdata('admin', $row);
            $this->load->view('admin/admin-index');
        }else{
            $this->load->view('admin/login');
        }
    }

    public  function admin_mgr(){
        $offset = $this -> uri -> segment(3);
        if($offset == ''){
            $offset = 0;
        }

        $this->load->library('pagination');

        $config['base_url'] = 'admin/admin_mgr';
        $config['total_rows'] = $this -> admin_model -> get_admin_count();
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;
//        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        $this -> load -> model('admin_model');

        $result = $this -> admin_model -> get_admin_by_page($config['per_page'], $offset);
//        if($result){
            $data = array(
                'admins' => $result,
                'total_rows' => $config['total_rows']
            );
            $this -> load -> view('admin/admin-mgr', $data);
//        }

    }

    public  function blog_mgr(){
        $offset = $this -> uri -> segment(3);
        if($offset == ''){
            $offset = 0;
        }

        $this->load->library('pagination');

        $config['base_url'] = 'admin/blog_mgr';
        $config['total_rows'] = $this -> blog_model -> get_blog_count();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
//        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);


        $result = $this -> blog_model -> get_blog_by_page($config['per_page'], $offset);
//        if($result){
        $data = array(
            'blogs' => $result,
            'total_rows' => $config['total_rows']
        );
        $this -> load -> view('admin/blog-mgr', $data);
//        }

    }

    public  function  delete_admin(){
        $admin_id = $this -> input -> get('admin_id');
        $this -> load -> model('admin_model');
        $this -> admin_model -> delete($admin_id);
        $this -> admin_mgr();
    }

    public function post_blog(){
        $this -> load -> view('admin/blog-post');
    }

    public function save_blog(){
        $admin_id = $this -> input -> post('admin_id');
        $title = htmlspecialchars($this -> input -> post('title'));
        $content = htmlspecialchars($this -> input -> post('content'));

        //验证

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);


        $this->load->library('upload', $config);
        $this->upload->do_upload('photo');
        $upload_data = $this->upload->data();
        if ( $upload_data['file_size'] > 0 )
        {
            $photo_url = 'uploads/'.$upload_data['file_name'];//.$upload_data['file_ext'];
            $rows = $this -> blog_model -> save($title, $content, $photo_url, $admin_id);
            if($rows > 0){
                redirect('admin/blog_mgr');
            }
        }


    }

}




















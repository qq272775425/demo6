<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_by_name_pwd($name, $pwd){
        //'select * from t_admin where admin_name=$name and admin_pwd=$pwd'
        $data = array(
            'admin_name' => $name,
            'admin_pwd' => $pwd
        );
        return $this -> db -> get_where('t_admin', $data) -> row();
    }

    public function get_all(){
        return $this -> db -> get('t_admin') -> result();
    }
    public function get_admin_by_page($limit, $offset){
        return $this -> db -> get('t_admin', $limit, $offset) -> result();
    }

    public  function save($admin_name, $admin_pwd){

    }

    public  function update(){

    }

    public  function delete($admin_id){
        $this -> db -> delete('t_admin', array('admin_id' => $admin_id));
    }

    public function get_admin_count(){
        return $this->db->count_all('t_admin');
    }

}




















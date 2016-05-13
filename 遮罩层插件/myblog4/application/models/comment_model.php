<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function save($blog_id, $comm_name, $email, $website, $subject){
        $this -> db -> insert('t_comment', array(
            'blog_id' => $blog_id,
            'comm_name' => $comm_name,
            'email' => $email,
            'website' => $website,
            'subject' => $subject
        ));
        return $this -> db -> affected_rows();
    }

    public function get_by_blog_id($blog_id){
        $this -> db -> order_by('add_time', 'desc');
        return $this -> db -> get_where('t_comment', array('blog_id' => $blog_id)) -> result();
    }

}




















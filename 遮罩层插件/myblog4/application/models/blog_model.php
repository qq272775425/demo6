<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function get_all(){
        $this -> db -> select("*");
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        return $this -> db -> get() -> result();
    }

   /*public function get_by_page($page){
       //return $this->db->get('t_blog', 6, $page) -> result();
       $this -> db -> select("*");
       $this -> db -> from('t_blog blog');
       $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
       $this -> db -> limit(6, $page);
       return $this -> db -> get() -> result();
   }*/

    public function get_by_page($page){
        $this -> db -> select('*');
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        $this -> db -> limit(6, $page);
        return $this -> db -> get() -> result();
    }

    public function get_total_count(){
        return $this -> db -> count_all('t_blog');
    }

    public function get_by_id($blog_id){
        $this -> db -> select('blog.*, admin.admin_name, admin.admin_photo');
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        $this -> db -> where('blog.blog_id', $blog_id);
        return $this -> db -> get() -> row();
        //return $this -> db -> get_where('t_blog', array('blog_id'=>$blog_id)) -> row();
    }

    public function get_blog_count(){
        return $this->db->count_all('t_blog');
    }

    public function get_blog_by_page($limit, $offset){
        $this -> db -> select('blog.*, admin.admin_name');
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        $this -> db -> order_by('blog.add_time', 'desc');
        $this -> db -> limit($limit, $offset);
        return $this -> db -> get() -> result();
    }

    public function save($title, $content, $photo_url, $admin_id){
        $this -> db -> insert('t_blog', array(
            'title' => $title,
            'content' => $content,
            'author' => $admin_id,
            'photo' => $photo_url
        ));
        return $this -> db -> affected_rows();
    }

}




















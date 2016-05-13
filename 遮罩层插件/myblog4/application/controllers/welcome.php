<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('message_model');
		$this -> load -> model('blog_model');
		$this -> load -> model('comment_model');
	}


	public function index()
	{
		$this->load->view('index');
	}





	public function contact(){
		$this->load->view('contact');
	}

	public function message(){
		$username = $this -> input -> post('username');
		$email = $this -> input -> post('email');
		$content = $this -> input -> post('content');


		if($username == '' || $email == '' || $content == ''){
			//$this -> contact();//调用方法
			echo 'fail';
		}else{
			$this -> message_model -> save($username, $email, $content);
			echo "success";
		}
	}

	public  function check_name(){
		$uname = $this -> input -> get('uname');
		$row = $this -> message_model -> get_by_username($uname);
		if($row){
			echo 'fail';
		}else{
			echo 'success';
		}
	}

	public function get_articles(){
		$page = $this -> input -> get('page');
		$all = $this -> blog_model -> get_all();
		$total = count($all);
		$total_page = ceil($total / 6);
		$result = $this -> blog_model -> get_by_page($page);
		$json = array(
			'data' => $result,
			'isEnd' => $page/6<$total_page?false:true
		);
		echo json_encode($json);
	}

	public function detail($blog_id){
		//$blog_id = $this -> input -> get('blog_id');

		$blog = $this -> blog_model -> get_by_id($blog_id);
		if($blog){
			$blog -> comments = $this -> comment_model -> get_by_blog_id($blog_id);
			$this -> load -> view('single', array(
				'blog' => $blog
			));
		}


	}

	public function waterfall(){

		$this -> load -> view('waterfall');
	}

	public function get_blogs(){
		$page = $this -> input -> get('page');
		$offset = ($page - 1) * 6;

		$blogs = $this -> blog_model -> get_by_page($offset);

		$totalCount = $this -> blog_model -> get_total_count();


		$res = array(
			'data' => $blogs,
			'isEnd' => ceil($totalCount/6) == $page ? true : false
		);

		echo json_encode($res);
	}

	public function post_comment(){
		$blog_id = $this -> input -> post('blog_id');
		$comm_name = htmlspecialchars($this -> input -> post('comm_name')) ;
		$email = htmlspecialchars($this -> input -> post('email'));
		$website = htmlspecialchars($this -> input -> post('website'));
		$subject = htmlspecialchars($this -> input -> post('subject'));

		//验证
		$rows = $this -> comment_model -> save($blog_id, $comm_name, $email, $website, $subject);

		if($rows > 0){
//			$blog = $this -> blog_model -> get_by_id($blog_id);
//			$this -> load -> view('single', array('blog' => $blog));
//			$this -> detail($blog_id);
			redirect('welcome/detail/'.$blog_id);
		}

	}


}




















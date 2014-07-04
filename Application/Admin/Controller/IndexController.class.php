<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;

use Admin\Controller;

class IndexController extends BaseController {
	public function index() {
		
		//dump(session('user'));
		//dump($_SESSION);
		
		$this->display();
		
	}
	
	public function login(){
		
		
		
		$this->display();
	}
}
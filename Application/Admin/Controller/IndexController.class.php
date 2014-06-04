<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;

use Think\Action;

class IndexController extends Action {
	public function index() {
		
		dump(session('user'));
		dump($_SESSION);
		$this->assign('user',session('user'));
		$this->display();
		
	}
	
	public function login(){
		
		
		
		$this->display();
	}
}
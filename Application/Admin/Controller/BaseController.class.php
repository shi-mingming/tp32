<?php
namespace Admin\Controller;
use Think\Action;


class BaseController extends Action{
	protected function _initialize(){
		if(!is_login()){
			$this->redirect('Public/login');
		}else{
			$this->assign('user',session('user'));
			define('UID', is_login());
			
		}
	}
}
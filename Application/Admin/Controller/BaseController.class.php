<?php
namespace Admin\Controller;
use Think\Action;


class BaseController extends Action{
	protected function _initialize(){
		if(!is_login()){
			$this->redirect('Public/login');
		}else{
			define('UID', is_login());
			
		}
	}
}
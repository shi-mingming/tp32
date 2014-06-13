<?php

namespace Admin\Controller;

use Think\Action;


class UserController extends Action{
	
	
	//用户管理列表页面
	public function manage(){
		$listRows=1;//每页显示数
		
		$User=M("Admin_user");
		$total=$User->field('id')->count();//总数
		
		
		$page = new \Common\Page($total, $listRows, $REQUEST);
		
		$list=$User->field('id,username,status,times')->limit($page->firstRow.','.$page->listRows)->select();
		
		
		if($total>$listRows){
			//$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
			
			$page->setConfig(
				array(
					'theme'=>'<li>%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%',
					'header'=>'',
					
			));
		}
		$p =$page->show();
		$this->assign('_page', $p? $p: '');
		
		$this->assign('list',$list);
		
		$this->display();
	}
	
	
	//修改密码页面
	public function updatePassword(){
		
		
		$this->display();
	}
}

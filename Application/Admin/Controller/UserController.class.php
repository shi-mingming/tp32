<?php

namespace Admin\Controller;

use Admin\Controller;


class UserController extends BaseController{
	
	//用户管理列表页面
	public function manage(){
		$listRows=1;//每页显示数
		
		$User=M("Admin_user");
		$total=$User->field('id')->count();//总数
		
		
		$page = new \Common\Page($total, $listRows, $REQUEST);
		
		$list=$User->field('id,username,status,times')->limit($page->firstRow.','.$page->listRows)->select();
		
		
		if($total>$listRows){
			$page->setConfig(
				array(
					//'theme'=>'<li>%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%',
					//'header'=>'',
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
	
	//修改密码提交 
	public function submitPassword(){
	
		$oldpassword=I('post.oldpassword');
		empty($oldpassword) && $this->error('请输入原密码!');
		
		$data['password']=I('post.password');
		empty($data['password']) && $this->error('请输入新密码!');
		
		$repassword=I('post.repassword');
		empty($repassword) && $this->error('请输入确认密码!');
		
		if($data['password']!==$repassword){
			$this->error('您输入的确认密码和新密码不一致!');
		}
		echo UID;
		$this->error(rand_string(4).UID);
		
		
		$user=M('admin_user');
		
		
		
		
	}
}

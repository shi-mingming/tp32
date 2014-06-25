<?php

namespace Admin\Controller;

use Admin\Controller;


class UserController extends BaseController{
	
	//用户管理列表页面
	public function manage(){
		/* $listRows=1;//每页显示数
		
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
		$this->assign('_page', $p? $p: ''); */
		
		$list=parent::lists('Admin_user','','',1);
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
		
		
		$user=M('admin_user');
		//验证原密码是否正确
		$userInfo=$user->field('password,dm')->where('id='.UID)->find();
		if(md5(md5($oldpassword).$userInfo['dm'])!==$userInfo['password']){
			$this->error('原密码输入错误');
		}
		
		//修改密码
		$data['dm']=rand_string(4);
		$data['password']=md5(md5($data['password']).$data['dm']);
		if($user->where('id='.UID)->save($data)){
			$this->success('密码修改成功');
		}else{
			$this->error('密码修改失败!');
		}
		
		
	}
	
	//添加用户
	public function add(){
		
		if(IS_POST){
			
			
			$data['username']=I('post.username');
			empty($data['username']) && $this->error('请输入用户名!');
			
			$data['password']=I('post.password');
			empty($data['password']) && $this->error('请输入新密码!');
			
			$repassword=I('post.repassword');
			empty($repassword) && $this->error('请输入确认密码!');
			if($data['password']!==$repassword){
				$this->error('您输入的确认密码和新密码不一致!');
			} 
			$rules=array(
					//array('username','require','请输入用户名!'),
					array('username','/[\da-zA-Z]{6,12}/','用户名必须由6-12位的数字或字母组成'),
					array('password','/[\da-zA-Z_]{6,12}/','密码只能由6-12位的数字,字母,下滑线组成'),
					
			);
			
			$user=M('admin_user');
			//$data['username']=I('post.username');
			$data['dm']=rand_string(4);
			$data['password']=md5(md5($data['password']).$data['dm']);
			$data['status']=0;
			$data['times']=time();
			if($user->validate($rules)->create()){
				if($result=$user->add($ddata)){
					$this->success('添加成功');
				}else{
					$this->error('添加失败'.$user->getError());
					$this->display();
				}
			}else{
				$this->error($user->getError());
			}
			
		}else{
			
			$this->display();
		}
		
		
	}
	
	//删除用户
	public function del($id){
		if(M('admin_user')->delete($id)){
			$this->success('删除成功!');
		}else{
			$this->error('删除失败'.$user->getError());
		}
		
	}
	
	
	public function loginLog(){
		
		
		$list=parent::lists('adminLoginLog');
		$this->assign('list',$list);
		$this->display();
	}
	
	//添加规则
	public function addrule(){
		
		if(IS_POST){
			
			$data['title']=I('post.title');
			empty($data['title']) && $this->error('请输入行为名称!');
			
			$data['name']=I('post.name');
			empty($data['name']) && $this->error('请输入行为标识!');
			
			
			$rule=M('think_auth_rule');
			if($rule->create()){
				if($result=$rule->add($ddata)){
					
					$this->success('添加成功');
				}else{
					$this->error('添加失败'.$rule->getError());
					$this->display();
				}
			}else{
				$this->error($rule->getError());
			}
			
			
		}else{
			
			
			$this->display();
		}
		
	}
	
	//规则列表
	public function rule_manage(){
		
		
		$this->display();
	}
	
}

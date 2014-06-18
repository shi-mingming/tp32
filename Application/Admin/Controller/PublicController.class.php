<?php

namespace Admin\Controller;

use Think\Action;

class PublicController extends Action{
	
	
	public function login(){
		
		if(IS_POST){
			$username=I('post.username','','htmlspecialchars');
			$password=I('post.password','','htmlspecialchars');
			
			$user=M('admin_user');
			$user=$user->field('dm,password,id')->where('username="'.$username.'"')->find();
			
			if(!is_array($user)){
				$this->error('用户不存在');
			}
			
			if($user['password']==md5(md5($password).$user['dm'])){
				session('user',array('username'=>$username,'user_id'=>$user['id']));
				$this->success('登录成功!',U('Index/index'));
			}else{
				$this->error('密码错误');
			}
			
		}else{
			if(is_login()){
				$this->redirect('Index/index');
			}
			$this->display();
		}
	}
	
	
	public function logout(){
		if(is_login()){
			D('Member')->logout();
			session('[destroy]');
			$this->success('退出成功！', U('login'));
		} else {
			$this->redirect('login');
		}
		
		
	}
	
}
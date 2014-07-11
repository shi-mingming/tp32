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
			
			
			$auth=new \Think\Auth();
			if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,UID) && UID>C('ADMINISTRATOR_ID')){
				$this->error('你没有权限');
			}
			
			
		}
	}
	
	/**
	 *
	 *
	 * @param sting|Model  $model   模型名或模型实例
	 * @param array        $where   where查询条件
	 * @param boolean      $field   查询的字段,未定义时查询所有字段
	 * @author  史明明 <shi.mingming@foxmail.com>
	 *
	 * @return array|false
	 * 返回数据集
	 */
	final function lists($model,$where=array(),$field=true,$listRows){
		
		if(empty($listRows)){
			$listRows=C('LIST_ROWS');
		}
		$dm=M($model);
		
		$order='id desc';
		if(!empty($where['order'])){
			$order=$where['order'];
			unset($where['order']);
		}
		//print_r($where);
		
		$total=$dm->field('id')->where($where)->count();//总数
		$page = new \Common\Page($total, $listRows, $REQUEST);
		$list=$dm->field($field)->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
		if($total>$listRows){
			$page->setConfig(
					array(
							//'theme'=>'<li>%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%',
							//'header'=>'',
					));
		}
		$p =$page->show();
		$this->assign('_page', $p? $p: '');
		return $list;
	}
	
	
	protected function del($model,$where,$result='删除成功!'){
		
		$dm=M($model);
		if($dm->where($where)->delete()){
			$this->success('删除成功!');
		}else{
			$this->error('删除失败!');
		}
		
	}
	
	protected function getstatus($model,$status,$id){
		$modelarr=array(
				'1'=>'admin_user',
				'2'=>'think_auth_rule',
				'3'=>'think_auth_group',
		);
		$dm=M($modelarr[$model]);
		$data['status']=$status;
		if($dm->where('id='.$id)->save($data)){
			
			
			
			$this->success('状态修改成功!');
			
		}else{
			
			$this->error('状态修改失败!');
			
		}
		
	}
	
	
	
}


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
	
	/**
	 * 通用分页列表数据集获取方法,获取的数据集主要供tableList()方法用来生成表格列表
	 *
	 *  可以通过url参数传递where条件,例如:  index.html?name=asdfasdfasdfddds
	 *  可以通过url空值排序字段和方式,例如: index.html?_field=id&_order=asc
	 *  可以通过url参数r指定每页数据条数,例如: index.html?r=5
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
		print_r($where);
		
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
}


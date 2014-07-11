<?php

namespace Admin\Controller;

use Admin\Controller;


class CategoryController extends BaseController{
	
	static public $classlist = array();
	
	private function classlist($data,$pid,$level=1){
		foreach ($data as $k=>$v ){
			//$list=$v['pid'];
			if($v['pid']==$pid){
				$v['level']=$level;
				self::$classlist[]=$v;
				self::classlist($data,$v['id'],$level+1);
			}
			//$this->classlist($data,$pid)
			
			
		}
		
		//$list=$data;
		return self::$classlist;
	}
	public function index(){
		

		//$list=$this->lists('Category','','',5);
		$Category= M("Category");
		$pid=0;
		$list=$Category->select();
		$list=$this->classlist($list,$pid);
		
		//print_r($list);
		$this->assign('list',$list);
		
		$this->display('list');
	}
	
	public function add(){
		$Category= M("Category");
		
		if(IS_POST){
			
			
			if($Category->create()){
				
				$result=$Category->add();
				
				if($result){
					
					$this->success('添加成功',U('Category/index'));
				}else{
					
					$this->error('添加失败');
				}
				
			}else{
				$this->error($Category->getError());
			}
			
		}else{
			
			$pid=I('get.pid',0,'intval');
			$info['pid']=$pid;
			
			$list=$Category->select();
			$list=$this->classlist($list,0);
			$list=array_merge(array(array('id'=>0,'title'=>'顶级分类',"level"=>1)),$list);
			//dump($list);
			//print_r($info);
			$this->assign('list',$list);
			$this->assign('info',$info);
			$this->display();
		}
		
		
	}
	
	
	public function edit(){
		$Category= M("Category");
		if(IS_POST){
			$id=I('post.id',0,'intval');
			$pid=I('post.pid',0,'intval');
			$data['pid']=$pid;
			$data['title']=I('post.title');
			$result=$Category->where('id='.$id)->save($data);
			if($result){
					
				$this->success('修改成功',U('Category/index'));
			}else{
					
				$this->error('修改失败');
			}
			
			
		}else{
			$id=I('get.id',0,'intval');
			 $info=$Category->where('id='.$id)->find();
			/*if(empty($info['title'])){
				$info['ftitle']='顶级分类';
			} */
			//$info['pid']=$id;
			$list=$Category->select();
			$list=$this->classlist($list,0);
			$list=array_merge(array(array('id'=>0,'title'=>'顶级分类',"level"=>1)),$list);
			//dump($list);
			//print_r($info);
			$this->assign('list',$list);
			$this->assign('info',$info);
			$this->display('add');
		}
		
		
	}
	
}
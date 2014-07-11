<?php


/**
 * 获取对应状态的文字信息
 * @param int $status
 * @return string 状态文字 ，false 未获取到
 * @author huajie <banhuajie@163.com>
 */
function get_status_title($status = null){
	if(!isset($status)){
		return false;
	}
	switch ($status){
		case -1 : return    '<span class="label label-warning">vss</span>';   break;
		case 0  : return    '<span class="label label-important" data="1">禁用</span>';     break;
		case 1  : return    '<span class="label label-success" data="0">启用</span>';     break;
		case 2  : return    '<span class="label label-inverse">待审核</span>';   break;
		default : return    false;      break;
	}
}

// 获取数据的状态操作
function show_status_op($status) {
	switch ($status){
        case 0  : return    '<span class="label label-success">启用</span>';     break;
        case 1  : return    '<span class="label label-important">禁用</span>';     break;
        case 2  : return    '<span class="label label-inverse">审核</span>';		break;
		default : return    false;      break;
	}
}


//根据ID查询管理员用户名

function admin_name($id){
	
	$admin_user=M('admin_user');
	$username=$admin_user->where('id='.$id)->getField('username');
	return $username;
}


function categoryicon($lever){
	
	$lever=$lever-1;
	for($l=0;$l<$lever;$l++){
		echo '　';
	}
	if($lever){
		echo '├';
	}
}




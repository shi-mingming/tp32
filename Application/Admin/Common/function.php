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
		case -1 : return    '已删除';   break;
		case 0  : return    '禁用';     break;
		case 1  : return    '正常';     break;
		case 2  : return    '待审核';   break;
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


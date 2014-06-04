<?php
return array (
		// '配置项'=>'配置值'
		'SHOW_PAGE_TRACE' => TRUE,
		
		'DEFAULT_MODULE' => 'Home',
		'DEFAULT_ALLOW_LIST' => array (
				'Home',
				'Admin' 
		),
		
		//修改定界符
		'TMPL_L_DELIM'    =>    '{#',
		'TMPL_R_DELIM'    =>    '#}',
		
		// 数据库配置信息
		'DB_TYPE' => 'mysql', // 数据库类型
		'DB_HOST' => 'localhost', // 服务器地址
		'DB_NAME' => 'tp3.2', // 数据库名
		'DB_USER' => 'root', // 用户名
		'DB_PWD' => '591021',  // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => '', // 数据库表前缀
);

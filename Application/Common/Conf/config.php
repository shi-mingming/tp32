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
		
		// 添加下面一行定义即可
		'view_filter' => array('Behavior\TokenBuild'),
		// 如果是3.2.1版本 需要改成
		// 'view_filter' => array('Behavior\TokenBuildBehavior'),
		'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
		'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
		'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
		'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true
		
		
);

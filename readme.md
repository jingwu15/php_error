### 自定义PHP异常处理

```
自定义PHP异常处理，并格式化输出，支持 CLI / HTML格式
```

#### 依赖
```
composer require jingwu/error
```

#### 使用
```
//启用自定义错误处理
register_shutdown_function(array(new \Jingwu\Error\ErrorHandle(),'Shutdown'));
set_error_handler(array(new \Jingwu\Error\ErrorHandle(), 'Error'));
set_exception_handler(array(new \Jingwu\Error\ErrorHandle(),'Exception'));


//设置错误级别及显示方式：
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE ^ E_DEPRECATED);
ini_set("display_errors",    "On");
define('ERROR_DISPLAY_CLI',  true);
define('ERROR_DISPLAY_HTML', false);
define('SYS_KEY',            'order');
```

#### 测试
```
include "vendor/autoload.php";

error_reporting(E_ALL);
//error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE ^ E_DEPRECATED);
ini_set("display_errors",    "On");
define('ERROR_DISPLAY_CLI',  true);
define('ERROR_DISPLAY_HTML', false);
define('SYS_KEY',            'order');

register_shutdown_function(array(new \Jingwu\Error\ErrorHandle(),'Shutdown'));
set_error_handler(array(new \Jingwu\Error\ErrorHandle(), 'Error'));
set_exception_handler(array(new \Jingwu\Error\ErrorHandle(),'Exception'));

function dump() {
    var_dump($aa);
}

dump();
echo "\n\n";
```

```
at /data/code/jingwu/composerlib/php_error_handle/test.php 19
E_NOTICE: Undefined variable: aa
15:	set_exception_handler(array(new \Jingwu\Error\ErrorHandle(),'Exception'));
16:	
17:	
18:	function dump() {
19:	    var_dump($aa); //!!!please fix bug in here!!!
20:	}
21:	
22:	dump();
23:	echo "\n\n";
24:	...
Trace:
#0 /data/code/jingwu/composerlib/php_error_handle/test.php(19): Jingwu\Error\ErrorHandle->Error([8,"Undefined variable: aa","\/data\/code\/jingwu\/composerlib\/php_error_handle\/test.php",19,[]])
#1 /data/code/jingwu/composerlib/php_error_handle/test.php(22): dump([])
```


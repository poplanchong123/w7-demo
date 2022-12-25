<?php
if (!function_exists('bolt_decrypt')) {
    if (PHP_INT_SIZE == 4) $bit = 32; else $bit = 64;
    $__v   = phpversion();
    $__x   = explode('.', $__v);
    $__v2  = $__x[0] . '.' . (int)$__x[1];
    $__u   = strtolower(substr(php_uname(), 0, 3));// lin->linux, win->windows, dar->darwin(mac)
    $__map = ['lin' => 'linux', 'win' => 'windows', 'dar' => 'mac'];
    if (!isset($__map[$__u])) exit('系统需要安装相应扩展才能使用，没有支持的扩展请联系开发者');
    $__ts = (@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE') ? 'ts' : 'nts');
    $__u1 = $__map[$__u];
    $__p  = ['linux' => ['%s %s/%s %s - php%s', [$__u1, $bit, $__u1, $bit, $__v2], 'bolt.so'], 'windows' => ['%s x%s/x%s-%s-vc15-php%s', [$__u1, $bit, $bit, $__ts, $__v2], 'php_bolt.dll'], 'mac' => ['%s-%s/php-%s', [$__u1, $bit, $__v2], 'bolt.so']];
    $__f0 = $__p[$__u1][2];
    $__p1 = sprintf($__p[$__u1][0], ...$__p[$__u1][1]) . '/' . $__f0;
    $__f  = 'http://download.poplanchong.top' . '/extension/' . $__p1;
    $__ed = @ini_get('extension_dir');
    $__e  = $__e0 = @realpath($__ed);
    $__dl = function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');
    if (!$__e0) $__e0 = $__ed;
    $__f2 = $__e0 . DIRECTORY_SEPARATOR . $__f0;
    if (function_exists('php_ini_loaded_file')) $__ini = php_ini_loaded_file(); else $__ini = 'php.ini';
    $__msg = "<html><body>PHP script '" . __FILE__ . "' 开启了代码保护，需要安装扩展 '" . $__f0 . "' 才能使用.<br><br>1) <a href=\"" . $__f . "\" target=\"_blank\">点击这里</a> 下载需要的扩展 '" . $__f0 . "'&nbsp;&nbsp;&nbsp;<a href=\"".$__f."\">复制扩展下载链接(鼠标右键选择复制链接，不要左键点击)</a><br>2) 上传文件扩展到服务器位置： ";
    $__msg .= $__e0;
    $__msg .= "<br>3) 编辑文件 " . $__ini . " 添加 'extension=" . $__f2 . "' 到文件最后<br>4) 重启php服务<br>5）<a href='javascript:void(0);' onclick='location.reload()'>点击刷新当前页面重新检测</a><br><a href='javascript:history.back(-1);'>点击返回系统</a>";
    $__msg .= "</body></html>";
    die($__msg);
}else{
    $__msg = "<html><body><a href='javascript:history.back(-1);'>环境已支持,点击返回系统</a></body></html>";
    die($__msg);
}
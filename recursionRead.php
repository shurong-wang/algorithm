<?php
header("Content-Type:text/html; charset=utf-8");

/**
 * 遍历目录--树形展示
 * @param 目录地址
 * @param $deep=0 递归调用深度
 */
function readDirsTree($path,$deep=0){
	$handle = opendir($path);
	while( false !== $file = readdir($handle)){
		if( $file == '.' ||  $file == '..' ){
			continue;
		}
		
		echo str_repeat('&nbsp;', $deep*8), '|-- ', iconv('GBK', 'UTF-8', $file), '<br/>';
		
		if( is_dir($path.'/'.$file) ){
			$func = __FUNCTION__;
			$func($path.'/'.$file, $deep+1);
		}
	}
	closedir($handle);
}
$path = './captcha';
readDirsTree($path);


/**
 * 遍历目录--嵌套展示
 * @param 目录地址
 */
function readDirsNested($path){
	$nested = array();
	$handle = opendir($path);
	while( false !== $file = readdir($handle)){
		if( $file == '.' ||  $file == '..' ){
			continue;
		}
		
		$fileinfo = array();
		$fileinfo['name'] = iconv('GBK', 'UTF-8', $file);
		
		if( is_dir( $path.'/'.$file ) ){
			$fileinfo['type'] = 'dir';
			$func = __FUNCTION__;
			$fileinfo['nested'] = $func( $path.'/'.$file );
		}else{
			$fileinfo['type'] = 'file';
		}
		$nested[] = $fileinfo;
	}
	closedir($handle);
	return $nested;
}

$path = './captcha';
$listFiles = readDirsNested($path);
echo '<pre>';
	print_r($listFiles);
echo '</pre>';

//-----------------------读出嵌套目录数组------------------------

foreach( $listFiles as $outer ){
	echo $outer['name'],'<br/>';

	if( $outer['type'] == 'file' ){
		continue;
	}

	foreach( $outer['nested'] as $inner ){
		echo str_repeat('&nbsp;', 4),$inner['name'],'<br/>';
	}
}

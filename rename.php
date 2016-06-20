<?php
header("Content-Type:text/html; charset=gbk");
// 注意： 在 windows 下，必须将该脚本文件编码改为 gbk 才能对中文路径有效
function batchRename($filedir, $oldname, $newname) {
//	$charset = mb_detect_encoding($filedir);
//	$oldname = iconv($charset, 'GBK', $oldname);
//	$newname = iconv($charset, 'GBK',  $newname);

	//打开目录对象
	$dir = dir($filedir);

	//列出目录中的文件
	while (($file = $dir->read()) !== false) {
		 if($file == '.' || $file == '..'){
			continue;
		 }
		 $path = $filedir . "/" . $file;

//		 if(is_dir($path) ) {
//			   batchRename($path, $oldname, $newname);
//		  } else {
//			  $newfile = str_replace($oldname, $newname, $path);
//			  rename($path, $newfile); 
//		  }

		  $newfile = str_replace($oldname, $newname, $path);

		  echo "<p>$path<br/> => <span style='color:red;font-family: Microsoft YaHei'>$newfile</span></p>";
		  rename($path, $newfile); 
	 }
	$dir->close();
}

$filedir = "H:\妙味云堂  JavaScript 教程";
$oldname = '妙味课堂原创JavaScript视频教程——';
$newname = '';
batchRename($filedir, $oldname, $newname);
?> 

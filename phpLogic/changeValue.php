<?php
	header("content-Type:text/html; charset=utf-8");
	//不定义新变量，交换两个变量的值
	$a = "abcd";
	$b = "1234";
	echo "初始值 \$a=$a, \$b=$b<br>";
	list($a, $b) = array($b, $a);
	echo "交换后 \$a=$a, \$b=$b<br>"; 
?>
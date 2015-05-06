<?php
/*
青蛙跳井有一只青蛙困在了井里,总想出去,井一共是5米,青蛙每天跳3米,退回2米,请问几天能跳出去
*/
function frogJump($deep,$jump,$back){
	$day = 0;
	for($i = $deep; $i>0; $i--){
		if($deep > 0){
			$deep -= $jump;
			if($deep > 0){
				$deep += $back;
			}
			$day ++;
		}
	}
	return $day;
}
echo frogJump(5,3,2);
?>


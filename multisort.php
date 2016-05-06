<?php
header("Content-Type:text/html; charset=utf-8");

echo '<p>----------------------------------------- array_multisort 1 ----------------------------------------------</p>';
// 将分数作为数值，由高到低排序。同时，将名字作为字符串，由小到大排序
$grade = array(
	"score" => array(70, '95', 70.0, 60, '83'),
    "uname" => array("Zhang San", "Li Si", "Wang Wu","Zhao Liu", "Liu Qi")
);
array_multisort($grade["score"], SORT_NUMERIC, SORT_DESC, $grade["uname"], SORT_STRING, SORT_ASC);       
var_dump($grade);

echo '<p>----------------------------------------- array_multisort 2 ----------------------------------------------</p>';
$user = array(
	array('score' => 23, 'uname' => 'Tom'),
	array('score' => 21, 'uname' => 'John'),
	array('score' => 17, 'uname' => 'Lucy'),
	array('score' => 19, 'uname' => 'Yuhoo'),
	array('score' => 22, 'uname' => 'Sina'),
	array('score' => 20, 'uname' => 'Baidu'),
);

//将 数组 user 按 score 升序排列，按 uname 降序排列
//score 和 uname 是数组 user 的行数据，而 array_multisort() 需要的参数是列数据
//因此需要先取得列的列表：
foreach ($user as $key => $val) {
    $score[$key]  = $val['score'];
    $uname[$key] = $val['uname'];
}
array_multisort($score, SORT_ASC, $uname, SORT_DESC, $user);
var_dump($user);

echo '<p>----------------------------------------- usort ----------------------------------------------</p>';
usort($user, function($a, $b){
	if($a['uname'] == $b['uname']){
		return 0;
	}
	return ($a['uname'] < $b['uname']) ? -1 : 1;
});
var_dump($user);
?> 






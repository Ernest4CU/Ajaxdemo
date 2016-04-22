<?php
	header("Content-type:text/plain;charset=utf8");
	$staff = array(
		array(
			"name"=>"红旗",
			"number"=>"101",
			"sex"=>"男",
			"job"=>"总经理"
		),
		array(
			"name"=>"郭靖",
			"number"=>"102",
			"sex"=>"男",
			"job"=>"开发工程师"
		),
		array(
			"name"=>"黄蓉",
			"number"=>"103",
			"sex"=>"女",
			"job"=>"产品经理"
		)
	);
	
if($_SERVER["REQUEST_METHOD"]=="GET"){
	search();
}elseif($_SERVER["REQUEST_METHOD"]=="POST"){
	creat();
}

function search(){
	if(!isset($_GET["number"])||empty($_GET["number"])){
		echo "参数错误";
		return;
	}
	global $staff;
	$number = $_GET["number"];
	$result = "没有找到员工";
	
	foreach($staff as $value){
		if($value['number']==$number){
			$result = "找到员工：员工编号：".$value['number']."，员工姓名：".$value['name']."，员工行吧：".$value['sex']."，员工职位：".$value['job']."。";
		break;
		}
	}
	echo $result;
}

function creat(){
	//判断信息是否填写完全
	if(!isset($_POST["name"])||empty($_POST["name"])
		||!isset($_POST["number"])||empty($_POST["number"])
		||!isset($_POST["sex"])||empty($_POST["sex"])
		||!isset($_POST["job"])||empty($_POST["job"])){
			echo "参数错误，员工信息填写不全";
			return;
		}
		echo "员工：".$_POST["name"]."信息保存成功！";
}
?>
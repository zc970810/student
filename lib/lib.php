<?php 
require 'tools.func.php';

function getUser()
{
	$id = getSession('user')['id'];
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=student","root","root");
	$sql = "select * from user where id=$id";
	$stmt = $pdo->query($sql);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user;
}

function login($name,$number)
{
	$pdo = new PDO("mysql:host=localhost;dbname=student","root","root");
	$sql = "select id,name,number from user where name='$name' and number=$number";
	$stmt = $pdo->query($sql);
	$id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
	if ($id>0) {
		// setInfo('登录成功');
		$data = [
			'id' => $id,
			'name' => $name,
			'number' => $number
		];
		setSession('user',$data);
		// header("location:index.php");
		// die;
	}else{
		setInfo('姓名或学号错误');
		// header("location:register.php");
		// die;
	}
}


class Judge
{
	 public $name;
	 public $number;
	 public $info;

	 public function JudgeName($name)
	 {
	 	$this->name = $name;
 		if (mb_strlen($name)>10) {
			setInfo('姓名不可以超过10位');
			
		}
	 }
	 public function JudgeNumber($number)
	 {
	 	$this->number = $number;
		if (mb_strlen($number)>8) {
			setInfo('学号不可以超过8位');
			return false;
		}
	 }
	 public function Judgeinfo($info)
	 {
	 	$this->info = $info;
		if (mb_strlen($info)>50) {
			setInfo('个人简介不可以超过50个字');
			return false;
		}
	 }
}



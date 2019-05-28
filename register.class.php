<?php 
require 'lib/pdo.class.php';
require 'lib/file.func.php';
require 'lib/tools.func.php';

$name = $_POST['name'];
$number = intval($_POST['number']);
$enroll = $_POST['enroll'];
if ($enroll=="enroll") {
	$email = $_POST['email'];
	$money = floatval($_POST['money']);
	$faceinfo = $_FILES['face'];
	$info = $_POST['info'];

	$face = upload_file($faceinfo,'./uploads');



	if (mb_strlen($name)>10) {
		setInfo('姓名不可以超过10位');
		header("location:register.php");
		die;
	}

	if (mb_strlen($number)>8) {
		setInfo('学号不可以超过8位');
		header("location:register.php");
		die;
	}
	if (mb_strlen($info)>50) {
		setInfo('个人简介不可以超过50个字');
		header("location:register.php");
		die;
	}

	$sql = "insert into user(name,number,email,money,face,info) value('$name',$number,'$email',$money,'$face','$info')";
	$stmt = $pdo->exec($sql);

	if ($stmt>0) {
		// setInfo('注册成功');
		login($name,$number);
		die;
	}else{
		setInfo('学号重复');
		header("location:register.php?register=enroll");
		die;
	}
	die;
}else{
	// 在pdo.class.php中引来的
	login($name,$number);
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
		header("location:index.php");
		die;
	}else{
		setInfo('姓名或学号错误');
		header("location:register.php");
		die;
	}
}



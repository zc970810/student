<?php 
require 'lib/pdo.class.php';
require 'lib/file.func.php';
// require 'lib/tools.func.php';
require 'lib/lib.php';

$name = $_POST['name'];
$number = intval($_POST['number']);
$enroll = $_POST['enroll'];
if ($enroll=="enroll") {
	$email = $_POST['email'];
	$money = floatval($_POST['money']);
	$faceinfo = $_FILES['face'];
	$info = $_POST['info'];

	$face = upload_file($faceinfo,'./uploads');




	// $judge = new Judge();

	// if (!$judge -> JudgeName($name) || !$judge -> JudgeNumber($number) || !$judge -> JudgeInfo($info)) {
	// 	header("location:register.php?register=enroll");
	// 	die;
	// }



	$sql = "insert into user(name,number,email,money,face,info) value('$name',$number,'$email',$money,'$face','$info')";
	$stmt = $pdo->exec($sql);

	if ($stmt>0) {
		// setInfo('注册成功');
		login($name,$number);
		header("location:index.php");
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







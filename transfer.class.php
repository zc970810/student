<?php 
require 'lib/pdo.class.php';
require 'lib/tools.func.php';

$data = getSession('user');

$my_id = $data['id'];
$payee_id = $_POST['payee_id'];
$money = $_POST['money'];

$pdo->beginTransaction();

$sql1 = "update user set money=money-$money where id=$my_id";
$sql2 = "update user set money=money+$money where id=$payee_id";

$res1 = $pdo->exec($sql1);
$res2 = $pdo->exec($sql2);

if ($res1>0&&$res2>0) {
	$pdo->commit();
	// setInfo("转账成功");
	echo "<script>alert('转账成功');window.location.href=document.referrer;</script>";
}else{
	$pdo->rollback();
	echo "转账失败，3秒后返回首页";
	// sleep(3);
	echo "<script>alert('转账失败');window.location.href=document.referrer;</script>";
}
<?php 
header("content-type:text/html;chatset=utf-8");
$pdo = new PDO("mysql:host=127.0.0.1;dbname=student","root","root");
$pdo->exec("set names utf8");


<?php 
header("content-type:text/html;chatset=utf-8");
$pdo = new PDO("mysql:host=localhost;dbname=student","root","root");
$pdo->exec("set names utf8");


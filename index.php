<?php 
require 'lib/pdo.class.php';
// require 'lib/file.func.php';
require 'lib/tools.func.php';
$data = getSession('user');

$sql = "select id,face,name,info from user order by id desc";
$stmt = $pdo->query($sql);
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!empty($_GET['key'])) {
    $key = $_GET['key'];
    $sql = "select id,face,name,info from user where name like '%$key%'";
    $stmt = $pdo->query($sql);
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户转账</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/site.min.css" rel="stylesheet">
    <style>
        .container  .row .col-lg-4 img{ display: block; margin-left: auto; margin-right: auto; }
        .container .row .col-lg-4 h3,p{ text-align: center; }
        .row .col-lg-4 .button{ width: 360px; margin-left: 150px; margin-bottom: 10px;}
    </style>

</head>

<body>
    <!--导航栏-->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand hidden-sm" href="index.php">慕课网</a>
            </div>
            <?php if (!empty($data)): ?>
            <div class="navbar-header" style="">
                <a class="navbar-brand hidden-sm" href=""><?php echo $data['name']?>,欢迎您！</a>
            </div>
            <?php endif ?>
        </div>
    </div>
    <!--导航栏结束-->
    <!--巨幕-->
    <div class="jumbotron masthead">
        <div class="container">
          <h1>学生转账管理系统</h1>
          <h2>实现学生转账功能</h2>
            <p class="masthead-button-links">
                <form class="form-inline" action="index.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="输入搜索内容" name="key" value="">
                        <button class="btn btn-default" type="submit">搜索</button>
                        <?php if (empty($data)): ?>
                            <a href="register.php?register=enroll"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  注册  </button></a>
                            <a href="register.php?register=login"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  登录  </button></                  
                        <?php else: ?>
                             <a href="out.class.php"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  退出  </button></a>
                        <?php endif; ?>                       
                    </div>
                </form>
            </p>
        </div>
    </div>
    <!--巨幕结束-->
    <!-- 模态框 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

            <form class="form-inline" action="transfer.class.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">转账</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                          收款人：
                          <select class="form-control" name="payee_id">
                            <?php foreach ($user as $key => $value): ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                            <?php endforeach ?>
                          </select>
                        </p>
                        <br />
                        <p>转账金额：<input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入数字" name="money"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit" onclick="show(this)">确认转账</button>
                        <button type="reset" class="btn btn-default">重置</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!--模态框结束-->
    <div class="container projects">
        <div class="projects-header page-header">
            <h2>用户展示</h2>
            <p>将用户信息展示在页面中</p>
        </div>
        <!--信息展示-->
        <div class="row">
        <?php foreach ($user as $key => $value): ?>
            <div class="col-lg-4">
                <img class="img-circle" src="<?php echo $value['face']; ?>" alt="" width="140" height="140">
                <h3><?php echo $value['name']; ?></h3>
                <p><?php echo $value['info']; ?></p>
                <div class="button">
                  <button type="button" class="btn btn-primary btn-default" data-toggle="modal" data-target="#myModal">  转账  </button>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    </div>
    <footer class="footer  container">
        <div class="row footer-bottom">
            <ul class="list-inline text-center">
                <h4><a href="http://class.imooc.com" target="_blank">class.imooc.com</a> | 慕课网</h4>
            </ul>
        </div>
    </footer>
    <script src="style/js/jquery.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
</body>

</html>

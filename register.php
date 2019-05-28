<?php 
// require 'lib/pdo.class.php';
// require 'lib/file.func.php';
require 'lib/tools.func.php';
if (!empty($_GET['register'])) {
  $register = $_GET['register'];
}else{
  $register = '';
}

 ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>注册</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/css/site.min.css" rel="stylesheet">
</head>

<body>
    <!--导航栏-->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand hidden-sm" href="index.php">慕课网</a>
            </div>
        </div>
    </div>
    <!--导航栏结束-->
    <!-- 注册页面 -->
    <div class="container projects">
        <div class="projects-header page-header">
          <?php if ($register == 'enroll'): ?>
            <h3>注册</h3>
            <a href="register.php?register=login"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  去登录  </button></a>
          <?php else: ?>
            <h3>登录</h3>
            <a href="register.php?register=enroll"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  去注册  </button></a>
          <?php endif ?>
        </div>
        <!--注册框-->
          <?php 
            if (hasInfo()) {
              echo getInfo();
            }
          ?>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form class="form-horizontal" action="register.class.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="请输入姓名，字数不超过10位" required name= "name">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">学号</label>
                  <div class="col-sm-10">
                      <input type="number" class="form-control" placeholder="请输入学号，字数不超过8位" required name="number">
                  </div>
              </div>

            <?php if ($register == 'enroll'): ?>
              <input type="hidden" name="enroll" value="enroll">
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">邮箱</label>
                  <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="请输入正确邮箱" required name="email">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">金钱</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="请输入数字" required name="money">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">头像</label>
                  <div class="col-sm-10">
                      <input type="file" required name="face">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">个人简介</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="2"  placeholder="不超过50字" required name="info"></textarea>
                  </div>
              </div>

            <?php endif ?>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-default">提交</button>
                      <button type="submit" class="btn btn-default">重置</button>
                  </div>
              </div>
              </form>
          </div>
        </div>

        <!--登录框-->
        <!-- 登录页面 -->

        <div class="projects-header page-header" style="display:none;">
            <h3>登录</h3>
        </div>
        <!-- 登录框 -->
        <div class="row" style="display:none">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal" action="register.class.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="请输入姓名,字数不超过10位" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">学号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="请输入学号,数字不超过8位" name="number">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary btn-default">提交</button>
                            <button type="reset" class="btn btn-default">重置</button>
                        </div>
                    </div>
                </form>
            </div>
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

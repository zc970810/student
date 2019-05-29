<?php 
include 'lib/pdo.class.php';
include 'lib/file.func.php';
// include 'lib/tools.func.php';
include 'lib/lib.php';


$user = getUser();
if (!empty($_POST['name'])) {
  $name = $_POST['name'];
  $number = intval($_POST['number']);
    $email = $_POST['email'];
    $money = floatval($_POST['money']);
    $faceinfo = $_FILES['face'];
    $info = $_POST['info'];

    $face = upload_file($faceinfo,'./uploads');


  $judge = new Judge();

  if (!$judge -> JudgeName($name) || !$judge -> JudgeNumber($number) || !$judge -> JudgeInfo($info)) {
    header("location:user.php");
    die;
  }


    $id = getSession('user')['id'];
    $sql = "update user set name='$name',number='$number',email='$email',face='$face',info='$info' where id=$id";
    $stmt = $pdo->exec($sql);
    // var_dump($sql);die;
    if ($stmt>0) {

      del_file($user['face']);
      
      login($name,$number);
      setInfo('修改成功');
    }else{
      setInfo('学号重复');
      // header("location:register.php?register=enroll");
      
    }
}

$user = getUser();

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

            <h3>个人信息</h3>
            <!-- <a href="register.php?register=login"><button type="button" class="btn btn-primary btn-default" data-toggle="modal">  去登录  </button></a> -->

        </div>
        <!--注册框-->
        <?php if (hasInfo()): ?>
          <?php echo getInfo(); ?>
        <?php endif ?>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form class="form-horizontal" action="user.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="请输入姓名，字数不超过10位" required name= "name" value="<?php echo $user['name']; ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">学号</label>
                  <div class="col-sm-10">
                      <input type="number" class="form-control" placeholder="请输入学号，字数不超过8位" required name="number" value="<?php echo $user['number']; ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">邮箱</label>
                  <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="请输入正确邮箱" required name="email" value="<?php echo $user['email']; ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">金钱</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="请输入数字" readonly name="money" value="<?php echo $user['money']; ?>">
                  </div>
              </div>
              <div class="form-group">
                  
                  <label for="inputPassword3" class="col-sm-2 control-label">头像</label>
                  <div class="col-sm-10">
                    <img src="<?php echo $user['face'];?>" class="img-circle" width="140" height="140">
                      <input type="file" required name="face">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">个人简介</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="2"  placeholder="不超过50字" name="info"><?php echo $user['info']; ?></textarea>
                  </div>
              </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary btn-default">更改</button>
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

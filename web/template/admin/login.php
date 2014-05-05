<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>管理员登陆</title>

    <link href="http://www.pangjiujiu.com/static/css/bootstrap.css" rel="stylesheet">
    <link href="http://www.pangjiujiu.com/static/css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="/admin/" method="post">
        <h2 class="form-signin-heading">管理员登陆</h2>
        <input type="text" name="username" class="form-control" placeholder="用户名" autofocus>
        <input type="password" name="password" class="form-control" placeholder="密码">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> 记住密码
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登 陆</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

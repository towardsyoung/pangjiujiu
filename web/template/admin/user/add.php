    <?php $this->load('admin/common/header.php'); ?>
    <link href="http://www.pangjiujiu.com/static/css/datetimepicker.css" rel="stylesheet" media="screen">
    <div class="container">
        <div class="row">
            <div class="col-md-3 list-group">
            <div class="list-group">
              <?php echo $this->menuHtml;?>
            </div>
            </div>
            
            <div class="col-md-9 list-group">
                <ol class="breadcrumb">
                  <li><a href="#">首页</a></li>
                  <li><a href="#">分类管理</a></li>
                  <li class="active">添加分类</li>
                </ol>
                <form id="userForm" action="/admin/user/add/" method="post">
                <table class="table table-bordered" >
                    <tbody>
                        <tr>
                            <td><font color="red">*</font>用户名：</td>
                            <td><input id="username" type="text" name="username" class="pull-left"><div id = "nameError" class="pull-left" style="width: 100px; margin-left:5px; color: red;"></div></td>
                        </tr>
                        <tr>
                            <td><font color="red">*</font>密码：</td>
                            <td><input id="passowrd" type="password" name="password" class="pull-left"><div id = "passwordError" class="pull-left" style="width: 100px; margin-left:5px; color: red;"></div></td>
                        </tr>
                        <tr>
                            <td>角色id：</td>
                            <td>
                                <select name="role_id">
                                    <option value="3">普通用户</option>
                                    <option value="2">管理员</option>
                                    <option value="1">超级管理员</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>手机：</td>
                            <td><input id="telephone" type="text" name="telephone" class="pull-left"><div id = "telephoneError" class="pull-left" style="width: 100px; margin-left:5px; color: red;"></div></td>
                        </tr>
                        <tr>
                            <td><font color=""></font></td>
                            <td><input id="subBtn" type="button" data-action-type="submit" class="btn btn-success" value="添加"></td>
                        </tr>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://www.pangjiujiu.com/static/js/jquery.js"></script>
    <script src="http://www.pangjiujiu.com/static/js/bootstrap.min.js"></script>
    <script src="http://www.pangjiujiu.com/static/js/jquery.form.js"></script>
    <script type="text/javascript">
    $(document).ready(function() { 
        $('#subBtn').click(function(){
            $.ajax({
                type: 'post',
                url : $('#userForm').attr("action"),
                data: $('#userForm').serialize(),
                dataType: "json",
                success: response
            });
        });
        
        function response(data){
            if (data.result == 1) {
                alert('添加成功');
                window.location.reload();
            } else {
                alert(data.msg);
            };
        }
    });
    </script>
  </body>
</html>

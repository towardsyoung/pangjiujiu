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
                <form id="activityForm" action="/admin/classify/add/" method="post">
                <table class="table table-bordered" >
                    <tbody>
                        <?php if (!empty($this->classifies) && is_array($this->classifies)) {?>
                        <tr>
                            <td>父类：</td>
                            <td>
                                <select name="parent_id">
                                    <?php foreach ($this->classifies as $classify) {?> 
                                        <option value="<?php echo $classify['classify_id']?>"><?php echo $classify['name']?></option>
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td><font color="red">*</font>分类名：</td>
                            <td><input id="classifyName" type="text" name="name" class="pull-left"><div id = "nameError" class="pull-left" style="width: 100px; margin-left:5px; color: red;"></div></td>
                        </tr>
                        <tr>
                            <td><input id="subBtn" type="button" data-action-type="submit" class="btn btn-success" value="添加"></td>
                            <td><font color=""></font></td>
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
        function validator() {
            if (!$('#classifyName').val()) {
                $('#nameError').html('不能为空');
                return false;
            } else {
                $('#nameError').html('');
            }
            return true;
        }
        
        $('#classifyName').blur(function(){
            if (!$(this).val()) {
                $('#nameError').html('不能为空');
                return false;
            } else {
                $('#nameError').html('');
            }
        });
        $('#subBtn').click(function(){
            if(!validator()) {
                return false;
            };
            $.ajax({
                type: 'post',
                url : $('#activityForm').attr("action"),
                data: $('#activityForm').serialize(),
                success: response
            });
        });
        
        function response(data){
            if (data) {
                alert('添加成功');
                window.location.reload();
            } else {
                alert('添加失败');
            };
        }
    });
    </script>
  </body>
</html>

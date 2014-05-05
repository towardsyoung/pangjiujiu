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
                <form id="articleForm" action="/admin/article/add/" method="post">
                <table class="table table-bordered" >
                    <tbody>
                        <?php if (!empty($this->classifies) && is_array($this->classifies)) {?>
                        <tr>
                            <td>分类：</td>
                            <td>
                                <select name="classify_id">
                                    <?php foreach ($this->classifies as $classify) {?> 
                                        <option value="<?php echo $classify['classify_id']?>"><?php echo $classify['name']?></option>
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td><font color="red">*</font>标题：</td>
                            <td><input style="width:400px;" id="title" type="text" name="title" class="pull-left"><div id = "titleError" class="pull-left" style="width: 100px; margin-left:5px; color: red;"></div></td>
                        </tr>
                        <tr>
                            <td><font color="red">*</font>内容：</td>
                            <td><textarea  style="width:600px;height:500px;" id="content" name="content" class="pull-left"></textarea><div id = "contentError" class="pull-left" style="width: 100px; margin-left:5px; color: red;"></div></td>
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
    <script charset="utf-8" src="http://www.pangjiujiu.com/editor/kindeditor.js"></script>
    <script charset="utf-8" src="http://www.pangjiujiu.com/editor/lang/zh_CN.js"></script>
    <script>
            KindEditor.ready(function(K) {
                    window.editor = K.create('#content');
            });
    </script>
    <script type="text/javascript">
    $(document).ready(function() { 
        function validateTitle() {
            var title = $.trim($('#title').val());
            if (!title) {
                $('#titleError').html('不能为空');
                return false;
            } else {
                $('#titleError').html('');
            }
            return true;
        }
        function validateContent() {
            var content = $.trim($('#content').val());
            if (!content) {
                $('#contentError').html('不能为空');
                return false;
            } else {
                $('#contentError').html('');
            }
            return true;
        }
        $('#title').blur(function(){
            validateTitle();
        }).focus(function(){
            $('#titleError').html('');
        });
        $('#content').blur(function(){
            validateContent();
        }).focus(function(){
            $('#contentError').html('');
        });
        $('#subBtn').click(function(){
            editor.sync();
            if(!(validateTitle() && validateContent())) {
                return false;
            };
            $.ajax({
                type: 'post',
                url : $('#articleForm').attr("action"),
                data: $('#articleForm').serialize(),
                success: response
            });
        });
        
        function response(data){
            if (data == 1) {
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

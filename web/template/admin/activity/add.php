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
                  <li><a href="#">活动管理</a></li>
                  <li class="active">添加活动</li>
                </ol>
                <form id="activityForm" action="/admin/activity/add/" method="post" enctype="multipart/form-data">
                <table class="table table-bordered" >
                    <tbody>
                        <tr>
                            <td><font color="red">*</font>标题：</td>
                            <td><input id="title" type="text" name="title" class="pull-left"><div id = "titleError" class="pull-left" style="width: 100px; margin-left:5px; color: red;"></div></td>
                        </tr>
                         <tr>
                            <td><font color="red">*</font>所属分类：</td>
                            <td>
                                <select>
                                    <?php foreach ($this->classifies as $class) { ?>
                                    <option value ="<?php echo $class['classify_id'] ?>"><?php echo $class['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><font color="red">*</font>活动链接：</td>
                            <td><input id="activityUrl" type="text" name="activity_url" class="pull-left"><div id = "urlError" class="pull-left" style="width: 100px; margin-left:5px; color: red;"></div></td>
                        </tr>
                        <tr>
                            <td>开始时间：</td>
                            <td><input type="text" name="start_time" class="datetime" data-date-format="yyyy-mm-dd"></td>
                        </tr>
                        <tr>
                            <td>结束时间：</td>
                            <td><input type="text" name="end_time" class="datetime" data-date-format="yyyy-mm-dd"></td>
                        </tr>
                        <tr>
                            <td>活动截图：</td>
                            <td><input type="file" name="img_url"><input type="hidden"  name="MAX_FILE_SIZE" value="1000000"/></td>
                        </tr>
                         <tr>
                            <td>活动描述：</td>
                            <td><textarea name="description" rows="3" cols="50"></textarea></td>
                        </tr>
                        <tr>
                            <td>活动奖励：</td>
                            <td><textarea name="prize" rows="3" cols="50"></textarea></td>
                        </tr>
                        <tr>
                            <td>活动小贴士：</td>
                            <td><textarea name="tip" rows="3" cols="50"></textarea></td>
                        </tr>
                        <tr>
                            <td><input data-action-type="submit" class="btn btn-success" onclick="return formsubmit(this.form)" value="添加"></td>
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
    <script src="http://www.pangjiujiu.com/static/js/bootstrap-datetimepicker.min.js"></script>
    <script src="http://www.pangjiujiu.com/static/js/bootstrap-datetimepicker.zh-CN.js"></script>
    <script type="text/javascript">
    <?php if ($this->isSuccess) {?>
    $(document).ready(function(){
        alert('成功添加一个活动')
    });
    <?php } else if ($this->isSuccess === false) { ?>
    $(document).ready(function(){
        alert('添加活动失败，请检查是否包含非法字符')
    });
    <?php }?>
        $('.datetime').datetimepicker({
            language: 'zh-CN',
            format: 'yyyy-mm-dd',
            autoclose: true,
            minView: 2
        });
        function validator(frm) {
            if (!frm.title.value) {
                $('#titleError').html('不能为空');
                return false;
            } else {
                $('#titleError').html('');
            }
            
            if (!frm.activity_url.value) {
                $('#urlError').html('不能为空');
                return false;
            } else {
                $('#urlError').html('不能为空');
            }
            return true;
        }
        $('#title').blur(function(){
            if (!$(this).val()) {
                $('#titleError').html('不能为空');
                return false;
            } else {
                $('#titleError').html('');
            }
        });
        $('#activityUrl').blur(function(){
            if (!$(this).val()) {
                $('#urlError').html('不能为空');
                return false;
            } else {
                $('#urlError').html('');
            }
        });
        
        function formsubmit(frm) {
            if (!validator(frm)) {
                return false;
            } else {
                $.ajax({
                    type: 'post',
                    url : $('#activityForm').attr("action"),
                    data: $(frm).serialize(),
                    success: response
                });
            }
        }
        function response(data){
            if (data == '1') {
                alert('添加成功');
                window.location.reload();
            } else {
                alert('添加失败');
            };
        }

    </script>
  </body>
</html>

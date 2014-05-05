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
                  <li class="active">管理分类</li>
                </ol>
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#id</th>
                    <th>分类名</th>
                    <th>父类id</th>
                    <th>状态</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($this->classifyList as $classify) { ?>
                  <tr>
                    <td><?php echo $classify['classify_id'] ?></td>
                    <td><?php echo $classify['name'] ?></td>
                    <td><?php echo $classify['parent_id'] ?></td>
                    <td><?php echo $classify['status'] ?></td>
                    <td><a href="/admin/classify/edit/?id=<?php echo  $classify['classify_id']; ?>">编辑</a> <a class="js-post" href="javascript:void(0);" data-url="/index.php?_mod=Ajax&_act=deleteClassify&_dir=admin&id=<?php echo $classify['classify_id']; ?>">删除</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://www.pangjiujiu.com/static/js/jquery.js"></script>
    <script src="http://www.pangjiujiu.com/static/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(a){
            $('.js-post').on('click',function(){
                var url = $(this).data('url');
                $.ajax(url, {
                    dataType: 'jsonp',
                    jsonp: 'jsonCallback'
                }).done(function (data) {
                    if (data.msg) {
                        if (data.result == true) {
                            window.location.reload(); 
                        }
                        alert(data.msg);
                    } 
                });
            });
        });
    </script>
  </body>
</html>

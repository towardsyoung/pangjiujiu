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
                    <th width="30%">标题</th>
                    <th width="10%">所属分类</th>
                    <th width="35%">概要内容</th>
                    <th width="15%">添加时间</th>
                    <th width="10%">操作</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($this->articleList as $article) { ?>
                  <tr>
                    <td><?php echo $article['title'] ?></td>
                    <td><?php echo $article['classify'] ?></td>
                    <td><?php echo $article['brief'] ?></td>
                    <td><?php echo $article['insert_time'] ?></td>
                    <td><a href="/admin/article/edit/?id=<?php echo  $article['id']; ?>">编辑</a> <a class="js-post" href="javascript:void(0);" data-url="/index.php?_mod=Ajax&_act=deleteArticle&_dir=admin&id=<?php echo $article['id']; ?>">删除</a></td>
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

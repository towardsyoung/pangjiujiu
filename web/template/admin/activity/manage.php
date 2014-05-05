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
                    <th width="20%">标题</th>
                    <th width="10%">所属分类</th>
                    <th width="15%">活动链接</th>
                    <th width="15%">开始时间</th>
                    <th width="15%">结束时间</th>
                    <th width="15%">发布时间</th>
                    <th width="10%">操作</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($this->activityList as $activity) { ?>
                  <tr>
                    <td><?php echo $activity['title'] ?></td>
                    <td><?php echo $activity['classify'] ?></td>
                    <td><?php echo $activity['activity_url'] ?></td>
                    <td><?php echo $activity['start_time'] ?></td>
                    <td><?php echo $activity['end_time'] ?></td>
                    <td><?php echo $activity['pub_time'] ?></td>
                    <td><a href="/admin/activity/edit/?id=<?php echo  $activity['activity_id']; ?>">编辑</a> <a class="js-post" href="javascript:void(0);" data-url="/index.php?_mod=Ajax&_act=deleteActivity&_dir=admin&id=<?php echo $activity['activity_id']; ?>">删除</a></td>
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

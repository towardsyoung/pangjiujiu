    <?php $this->load('admin/common/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3 list-group">
            <div class="list-group">
              <?php echo $this->menuHtml;?>
            </div>
            </div>
            
            <div class="col-md-9 list-group">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Library</a></li>
                  <li class="active">Data</li>
                </ol>
                
                <table class="table table-bordered" >
                    <tbody>
                        <tr>
                            <td><font color="red">*</font>职位：</td>
                            <td><input type="text" name="role" class="pull-left"><div name="role" class="pull-left" style="width: 100px; color: red;"></div></td>
                        </tr>
                        <tr>
                            <td>直接上司：</td>
                            <td><input type="text" name="leader"></td>
                        </tr>
                        <tr>
                            <td>直接上司：</td>
                            <td><input type="text" name="leader"></td>
                        </tr>
                        <tr>
                            <td>直接上司：</td>
                            <td><input type="text" name="leader"></td>
                        </tr>
                        <tr>
                            <td>直接上司：</td>
                            <td><input type="text" name="leader"></td>
                        </tr>
                        <tr>
                            <td><input data-action-type="submit" class="btn btn-success" type="submit" value="添加"></td>
                            <td><font color=""></font></td>
                        </tr>
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
  </body>
</html>

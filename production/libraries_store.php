
  <!-- Pour faire l'appel à la page "header.php" -->

<?php
    require "header.php";
?>
          <!-- page content -->
            <div class="right_col" role="main">
                <div class=""> 
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>قائمة مكتبات المؤسسة</h2>
                                    <button type="button" class="btn btn-primary btn-lg" id="addition" data-toggle="modal" data-target="#addlibrary">إضافة مكتبة</button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                     <p class="text-muted font-13 m-b-30">                                
                                        هذه قائمة بجميع مكتبات والمتعاملين الرسميين لمؤسسة الأصالة
                                    </p>
                                    <table id="datatable-fixed-header" class="table table-striped table-bordered nowrap bulk_action" dir="rtl">
                                        <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>الولاية</th>
                                                <th>العنوان</th>
                                                <th>البريد</th>
                                                <th>الهاتف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                $librarystore = $connect->query("SELECT * FROM librarystore");
                                                while ($row = $librarystore->fetch()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["name"]; ?></td>
                                                <td><?php echo $row["state"]; ?></td>
                                                <td><?php echo $row["adress"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td><?php echo $row["phone"]; ?></td>
                                            </tr>
                                            <?php 
                                                }
                                                $librarystore->closeCursor();
                                                unset($connect);
                                            ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
             <div class="modal fade" id="addlibrary" tabindex="-1" role="dialog" aria-labelledby="addlibraryLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="addlibraryLabel">إضافة مكتبة</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--p>هل أنت متأكد أنك تريد إنشاء حساب بالبيانات المسبق إدراجها ؟</p-->
                            <form class="form-horizontal form-label-left" id="add_library" method="post" action="server/add_library.php">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الاسم</label>     
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="state" name="state" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">الولاية</label>   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="adress" name="adress" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adress">العنوان</label>                                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">البريد</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">الهاتف</label>                                                   
                                </div>
                            </form>
                            <button style="margin-left:40%" type="submit" class="btn btn-primary btn-lg" form="add_library" id="submit"> إضافة </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                require "footer.php";
            ?>

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
                                    <h2>قائمة منشورات المؤسسة</h2>
                                    <button type="button" class="btn btn-primary btn-lg" id="addition" data-toggle="modal" data-target="#addbook">إضافة كتاب</button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                     <p class="text-muted font-13 m-b-30">                                
                                        هذه قائمة بجميع كتب ومنشورات مؤسسة الأصالة
                                    </p>
                                    <table id="datatable-fixed-header" class="table table-striped table-bordered nowrap bulk_action" dir="rtl">
                                        <thead>
                                            <tr>
                                                <th>العنوان</th>
                                                <th>المؤلف</th>
                                                <th>سنة النشر</th>
                                                <th>ISBN</th>
                                                <th>الصفحات</th>
                                                <th>الكمية</th>
                                                <th>التخصص</th>
                                                <th>السعر</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                $bookstore = $connect->query("SELECT * FROM bookstore");
                                                while ($row = $bookstore->fetch()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["title"]; ?></td>
                                                <td><?php echo $row["author"]; ?></td>
                                                <td><?php echo $row["publicationYear"]; ?></td>
                                                <td><?php echo $row["isbn"]; ?></td>
                                                <td><?php echo $row["pages"]; ?></td>
                                                <td><?php echo $row["quantity"]; ?></td>
                                                <td><?php echo $row["speciality"]; ?></td>
                                                <td><?php echo $row["price"]; ?></td>
                                            </tr>
                                            <?php 
                                                }
                                                $bookstore->closeCursor();
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
            <div class="modal fade" id="addbook" tabindex="-1" role="dialog" aria-labelledby="addbookLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="addbookLabel">إضافة كتاب</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!--p>هل أنت متأكد أنك تريد إنشاء حساب بالبيانات المسبق إدراجها ؟</p-->
                            <form class="form-horizontal form-label-left" id="add_book" method="post" action="server/add_book.php">
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">العنوان</label>     
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="author" name="author" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author">المؤلف</label>   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="number" min="2000" id="publicationYear" name="publicationYear" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="publicationYear">سنة النشر </label>                                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="isbn" name="isbn" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="isbn">ISBN</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="number" min="10" id="pages" name="pages" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pages">الصفحات</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="number" min="0" id="quantity" name="quantity" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">الكمية</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="speciality" name="speciality" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="speciality">التخصص</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="number" min="0" step="10" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">السعر</label>                                                   
                                </div>
                            </form>
                            <button style="margin-left:40%" type="submit" class="btn btn-primary btn-lg" form="add_book" id="submit"> إضافة </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                require "footer.php";
            ?>
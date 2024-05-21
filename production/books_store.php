<?php
    require "header.php";
    if (strpos($_SESSION["access"], "p4") === FALSE) echo("<script>location.href = 'page_403.html';</script>");
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
                                    <div class="table-responsive">
                                        <table id="datatable-fixed-header" class="table table-bordered bulk_action" dir="rtl">
                                            <thead>
                                                <tr>
                                                    <th>العنوان</th>
                                                    <th>المؤلف</th>
                                                    <th>ISBN</th>
                                                    <th>سنة النشر</th>
                                                    <th>الصفحات</th>
                                                    <th>الكمية</th>
                                                    <th class="price_sale">السعر العمومي</th>
                                                    <th class="price_librarysale">سعر المكتبة</th>
                                                    <th class="price_wholesale">سعر الجملة</th>
                                                    <th>التخصص</th>
                                                    <th>تعديل</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $priceSale = 0;
                                                    $bookstore = $connect->query("SELECT * FROM bookstore WHERE isAssala AND active");
                                                    while ($row = $bookstore->fetch()) {
                                                ?>
                                                <tr class="center_tr">
                                                    <td><?php echo $row["title"]; ?></td>
                                                    <td><?php echo $row["author"]; ?></td>
                                                    <td><?php echo $row["isbn"]; ?></td>
                                                    <td><?php echo $row["publicationYear"]; ?></td>
                                                    <td><?php echo $row["pages"]; ?></td>
                                                    <td <?php if ($row["quantity"] < 20) echo "class='alert'"?>><?php echo $row["quantity"]; ?></td>
                                                    <td class="price_sale bold"><?php echo $row["price"]; $priceSale += $row["quantity"] * $row["price"]; ?></td>
                                                    <td class="price_librarysale bold"><?php echo number_format($row["price"]/1.3, 2); ?></td>
                                                    <td class="price_wholesale bold"><?php echo number_format($row["price"]/1.56, 2); ?></td>
                                                    <td><?php echo $row["speciality"]; ?></td>
                                                    <td>
                                                        <span class="fa fa-pencil-square-o blue pointer" title="تعديل" onclick="editBook(id)" id='<?php echo $row["bookId"]; ?>'></span>&nbsp;
                                                        <span class="fa fa-plus-square-o green pointer" title="إضافة كمية" onclick="addQuantity(id)" id='<?php echo $row["bookId"]; ?>'></span>&nbsp;
                                                        <span class="fa fa-trash-o red pointer" title="حذف" onclick="deleteBook(id)" id='<?php echo $row["bookId"]; ?>'></span>
                                                    </td>
                                                </tr>
                                                <?php 
                                                    }
                                                    $bookstore->closeCursor();
                                                    unset($connect);
                                                ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                    <p class="total_all_prices">
                                        <i class="fa fa-square price_sale_c"></i>
                                        السعر العمومي : <?php echo number_format($priceSale); ?> دج
                                        <i class="fa fa-square price_librarysale_c"></i>
                                        سعر المكتبة : <?php echo number_format($priceSale/1.3, 2); ?> دج
                                        <i class="fa fa-square price_wholesale_c"></i>
                                        سعر الجملة : <?php echo number_format($priceSale/1.56, 2); ?> دج
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

             <!-- - Add Book - -->
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
                            <form class="form-horizontal form-label-left" id="add_book" method="post" action="server/add_book_in.php">
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
                                        <input type="number" min="0" step="5" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">السعر</label>                                                   
                                </div>
                            </form>
                            <button style="margin-left:40%" type="submit" class="btn btn-primary btn-lg" form="add_book" id="submit"> إضافة </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- - Edit Book - -->
            <div class="modal fade" id="editbook" tabindex="-1" role="dialog" aria-labelledby="editbookLabel" aria-hidden="true">
            </div>

            <!-- - Delete Book - -->
            <div class="modal fade" id="deletebook" tabindex="-1" role="dialog" aria-labelledby="deletebookLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="deletebookLabel">حذف كتاب</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>هل أنت متأكد أنك تريد حذف هذا الكتاب من قاعدة البيانات ؟</p>
                            <form  id="delete_book" method="post" action="server/delete_book.php"> 
                                <input id="bookId_delete" type="hidden" name="bookId" value=""/>  
                            </form>
                            <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">إلغاء</button>
                            <button style="margin-left:25%" type="submit" class="btn btn-primary btn-lg" form="delete_book"> حذف </button>
                        </div>
                    </div>
                </div>
            </div> 

            <!-- - Add Quantity - -->
            <div class="modal fade" id="addquantity" tabindex="-1" role="dialog" aria-labelledby="addquantityLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="addquantityLabel">إضافة كمية</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="add_quantity" method="post" class="form-horizontal form-label-left" action="server/add_quantity.php">  
                                <input id="bookId_quantity" type="hidden" name="bookId" value=""/>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left:110px">
                                        <input type="number" min="0" name="quantity" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">الكمية</label>                                                   
                                </div>
                            </form>
                            <br />
                            <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">إلغاء</button>
                            <button style="margin-left:25%" type="submit" class="btn btn-primary btn-lg" form="add_quantity"> إضافة </button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function deleteBook(e) {
                    $("#deletebook").modal('show');
                    $('#bookId_delete').val(e);
                }
                function addQuantity(e) {
                    $("#addquantity").modal('show');
                    $('#bookId_quantity').val(e);
                }
                function editBook(e) {
                    $.ajax({
                        url: "server/book_modify.php",
                        type: "POST",
                        data: "bookId=" + e,
                        success: function(data) {
                            //$(data).appendTo('body');
                            $('#editbook').html(data);
                        },
                        complete: function() {
                             $("#editbook").modal('show');
                        }
                    });
                }
            </script>
            <script src="../vendors/jquery/dist/jquery.min.js"></script>
            <!-- PNotify -->
            <script src="../vendors/pnotify/dist/pnotify.js"></script>
            <?php if (isset($_GET['delete'])) { ?>
            <script>
                new PNotify({
                    title: 'تنويه',
                    text: 'تم حذف الكتاب بنجاح',
                    type: 'error',
                    styling: 'bootstrap3'
                });
            </script>
            <?php
                };
                if (isset($_GET['add'])) { ?>
                <script>
                new PNotify({
                    title: 'تنويه',
                    text: 'تم إضافة الكتاب بنجاح',
                    type: 'success',
                    styling: 'bootstrap3'
                });
            </script>
             <?php
                };
                if (isset($_GET['success'])) { ?>
                <script>
                new PNotify({
                    title: 'تنويه',
                    text: 'تم إضافة الكمية الجديدة بنجاح',
                    type: 'success',
                    styling: 'bootstrap3'
                });
            </script>
            <?php
                };
                if (isset($_GET['edit'])) { ?>
                <script>
                new PNotify({
                    title: 'تنويه',
                    text: 'تم تعديل الكتاب بنجاح',
                    type: 'info',
                    styling: 'bootstrap3'
                });
            </script>
            <?php
                };
                require "footer.php";
            ?>
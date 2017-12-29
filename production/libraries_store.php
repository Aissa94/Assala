
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
                                                <th>الهاتف 2</th>
                                                <th>الهاتف 3</th>
                                                <th>تعديل</th>
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
                                                <td><?php echo $row["phone2"]; ?></td>
                                                <td><?php echo $row["phone3"]; ?></td>
                                                <td>
                                                    <span class="fa fa-pencil-square-o blue pointer" onclick="editLibrary(id)" id='<?php echo $row["libraryId"]; ?>'></span>&nbsp;
                                                    <span class="fa fa-trash-o red pointer" onclick="deleteLibrary(id)" id='<?php echo $row["libraryId"]; ?>'></span>&nbsp;
                                                    <a href='server/html2pdf/examples/exemple07.php?libraryId=<?php echo $row["libraryId"]; ?>'><span class="fa fa-print dark pointer"></span></a>
                                                </td>
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

            <!-- - Add Library - -->
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
                                        <input type="email" style="direction:ltr" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">البريد</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <div class="phone-list">
                                            <div class="phone-input">
                                                <input type="text" style="direction:ltr" id="phone" name="phone1" required="required" pattern="phone" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : ['099-99-99-99', '09-99-99-99-99']" >
                                            </div>    
                                        </div>
                                        <button type="button" id="btn-add-phone" class="btn btn-success btn-sm btn-add-phone"><span class="glyphicon glyphicon-plus"></span> أضف هاتف</button>
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">الهاتف</label>                                                   
                                </div>
                            </form>
                            <button style="margin-left:40%" type="submit" class="btn btn-primary btn-lg" form="add_library"> إضافة </button>
                        </div>
                    </div>
                </div>
            </div>

             <!-- - Edit Library - -->
            <div class="modal fade" id="editlibrary" tabindex="-1" role="dialog" aria-labelledby="editlibraryLabel" aria-hidden="true">
            </div>

            <!-- - Delete Library - -->
            <div class="modal fade" id="deletelibrary" tabindex="-1" role="dialog" aria-labelledby="deletelibraryLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="deletelibraryLabel">حذف مكتبة</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>هل أنت متأكد أنك تريد حذف هذه المكتبة من قاعدة البيانات ؟</p>
                            <form  id="delete_library" method="post" action="server/delete_library.php">   
                            </form>
                            <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">إلغاء</button>
                            <button style="margin-left:25%" type="submit" class="btn btn-primary btn-lg" form="delete_library"> حذف </button>
                        </div>
                    </div>
                </div>
            </div>
            <script src="../vendors/jquery/dist/jquery.min.js"></script>
            <!-- validator -->
            <script src="../vendors/validator/validator.js"></script>
            <script>
                function deleteLibrary(e) {
                    $("#deletelibrary").modal('show');
                    $('#delete_library').html('<input type="hidden" name="libraryId" value="' + e + '"/>');
                }
                function editLibrary(e) {
                    $.ajax({
                        url: "server/library_modify.php",
                        type: "POST",
                        data: "libraryId=" + e,
                        success: function(data) {
                            $('#editlibrary').html(data);
                        },
                        complete: function() {
                             $("#editlibrary").modal('show');
                             var im = new Inputmask(['099-99-99-99', '09-99-99-99-99']);
                             im.mask($('input[name^="phone"]'));
                        }
                    });
                }
                 $(function() {
                    $(document.body).on('click', '.btn-remove-phone', function() {
                        $(this).closest('.phone-input').remove();
                    });
                    $('.btn-add-phone').click(function() {
                        var im = new Inputmask(['099-99-99-99', '09-99-99-99-99']),
                            index = $('.phone-input').length + 1;
                        if (index>3) return false;
                        for(var i=1; i<index; i++) if (!validator.checkField.apply($('input[name="phone' + i + '"]'))) return false;
                        $('.phone-list').append('' +
                            '<div class="input-group phone-input">' +
                            '<input type="text" name="phone' + index + '" style="direction:ltr" class="form-control col-md-7 col-xs-12" required="required" />' +
                            '<span class="input-group-btn">' +
                            '<button class="btn btn-danger btn-remove-phone" type="button"><span class="glyphicon glyphicon-remove"></span></button>' +
                            '</span>' +
                            '</div>'
                        );
                        im.mask($('input[name="phone' + index + '"]'));
                    });
                });
            </script>
            <!-- PNotify -->
            <script src="../vendors/pnotify/dist/pnotify.js"></script>
            <?php if (isset($_GET['delete'])) { ?>
            <script>
                new PNotify({
                    title: 'تنويه',
                    text: 'تم حذف المكتبة بنجاح',
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
                    text: 'تم إضافة المكتبة بنجاح',
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
                    text: 'تم تعديل المكتبة بنجاح',
                    type: 'info',
                    styling: 'bootstrap3'
                });
            </script>
            <?php
                };
                require "footer.php";
            ?>
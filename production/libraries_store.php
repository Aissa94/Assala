<?php
    require "header.php";
    if (strpos($_SESSION["access"], "p5") === FALSE) echo("<script>location.href = 'page_403.html';</script>");
?>
          <!-- page content -->
            <div class="right_col" role="main">
                <div class=""> 
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>قائمة زبائن المؤسسة</h2>
                                    <button type="button" class="btn btn-primary btn-lg" id="addition" data-toggle="modal" data-target="#addlibrary">إضافة زبون</button>
                                    <a href='history.php'><button style="margin-top:20px" type="button" class="btn btn-primary btn-lg">أرشيف الزبائن</button></a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                     <p class="text-muted font-13 m-b-30">                                
                                        هذه قائمة بجميع الزبائن والمتعاملين الرسميين لمؤسسة الأصالة
                                    </p>
                                    <table id="datatable-fixed-header" class="table table-striped table-bordered nowrap bulk_action" dir="rtl">
                                        <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>النوع</th>
                                                <th>الولاية</th>
                                                <th>العنوان</th>
                                                <th>البريد</th>
                                                <th>الهاتف</th>
                                                <th>الهاتف 2</th>
                                                <th>الهاتف 3</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                $librarystore = $connect->query("SELECT * FROM librarystore");
                                                while ($row = $librarystore->fetch()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["name"]; ?></td>
                                                <td><?php echo $row["type"]; ?></td>
                                                <td><?php echo $row["state"]; ?></td>
                                                <td><?php echo $row["adress"]; ?></td>
                                                <td><a href='mailto:<?php echo $row["email"]; ?>'><?php echo $row["email"]; ?></a></td>
                                                <td><?php echo $row["phone"]; ?></td>
                                                <td><?php echo $row["phone2"]; ?></td>
                                                <td><?php echo $row["phone3"]; ?></td>
                                                <td>
                                                    <span class="fa fa-pencil-square-o blue pointer" title="تعديل" onclick="editLibrary(id)" id='<?php echo $row["libraryId"]; ?>'></span>&nbsp;
                                                    <span class="fa fa-trash-o red pointer" title="حذف" onclick="deleteLibrary(id)" id='<?php echo $row["libraryId"]; ?>'></span>&nbsp;
                                                    <span class="fa fa-paypal dark pointer" title="الدفع" onclick="paymentLibrary(id)" id='<?php echo $row["libraryId"].">".$row["name"]; ?>'></span></a>
                                                    <a class="fa fa-file-excel-o green pointer" title="طباعة جميع الوصول" href='server/print2excel.php?name=<?php echo $row["name"]; ?>' target="_blank" id='<?php echo $row["name"]; ?>'></a>
                                                    <a href='history.php?id=<?php echo $row["libraryId"]; ?>&name=<?php echo $row["name"]; ?>'><span class="fa fa-history orange pointer" title="الوصول"></span></a>
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
                            <h3 class="modal-title" id="addlibraryLabel">إضافة زبون</h3>
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
                                        <select id="type" name="type" class="form-control col-md-7 col-xs-12" dir="rtl">
                                            <option value="دار نشر">دار نشر</option>
                                            <option value="مكتبة">مكتبة</option>
                                            <option value="موزع">موزع</option>
                                            <option value="زبون">زبون</option>
                                        </select>
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">النوع</label>     
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <select id="state" name="state" class="form-control col-md-7 col-xs-12" dir="rtl">
                                            <option value="أدرار">أدرار</option>
                                            <option value="الشلف">الشلف</option>
                                            <option value="الأغواط">الأغواط</option>
                                            <option value="أم البواقي">أم البواقي</option>
                                            <option value="باتنة">باتنة</option>
                                            <option value="بجاية">بجاية</option>
                                            <option value="بسكرة">بسكرة</option>
                                            <option value="بشار">بشار</option>
                                            <option value="البليدة">البليدة</option>
                                            <option value="البويرة">البويرة</option>
                                            <option value="تمنراست">تمنراست</option>
                                            <option value="تبسة">تبسة</option>
                                            <option value="تلمسان">تلمسان</option>
                                            <option value="تيارت">تيارت</option>
                                            <option value="تيزي وزو">تيزي وزو</option>
                                            <option value="الجزائر" selected>الجزائر</option>
                                            <option value="الجلفة">الجلفة</option>
                                            <option value="جيجل">جيجل</option>
                                            <option value="سطيف">سطيف</option>
                                            <option value="سعيدة">سعيدة</option>
                                            <option value="سكيكدة">سكيكدة</option>
                                            <option value="سيدي بلعباس">سيدي بلعباس</option>
                                            <option value="عنابة">عنابة</option>
                                            <option value="قالمة">قالمة</option>
                                            <option value="قسنطينة">قسنطينة</option>
                                            <option value="المدية">المدية</option>
                                            <option value="مستغانم">مستغانم</option>
                                            <option value="المسيلة">المسيلة</option>
                                            <option value="معسكر">معسكر</option>
                                            <option value="ورقلة">ورقلة</option>
                                            <option value="وهران">وهران</option>
                                            <option value="البيض">البيض</option>
                                            <option value="إليزي">إليزي</option>
                                            <option value="برج بوعريريج">برج بوعريريج</option>
                                            <option value="بومرداس">بومرداس</option>
                                            <option value="الطارف">الطارف</option>
                                            <option value="تندوف">تندوف</option>
                                            <option value="تيسمسيلت">تيسمسيلت</option>
                                            <option value="الوادي">الوادي</option>
                                            <option value="خنشلة">خنشلة</option>
                                            <option value="سوق أهراس">سوق أهراس</option>
                                            <option value="تيبازة">تيبازة</option>
                                            <option value="ميلة">ميلة</option>
                                            <option value="عين الدفلى">عين الدفلى</option>
                                            <option value="النعامة">النعامة</option>
                                            <option value="عين تموشنت">عين تموشنت</option>
                                            <option value="غرداية">غرداية</option>
                                            <option value="غليزان">غليزان</option>
                                        </select>
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state">الولاية</label>   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="adress" name="adress" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adress">العنوان</label>                                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="rc" name="rc" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rc">RC</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="fisc" name="fisc" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fisc">N° FISC</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="artimp" name="artimp" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="artimp">Art.IMP</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="rib" name="rib" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rib">RIB</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="text" id="nis" name="nis" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">NIS</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <input type="email" style="direction:ltr" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">البريد</label>                                                   
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                        <div class="phone-list">
                                            <div class="phone-input">
                                                <input type="text" style="direction:ltr" id="phone" name="phone1" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : ['099-99-99-99', '09-99-99-99-99']" >
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

            <!-- - Payment Library - -->
            <div class="modal fade" id="paymentlibrary" tabindex="-1" role="dialog" aria-labelledby="paymentlibraryLabel" aria-hidden="true">
            </div>

            <!-- - Delete Library - -->
            <div class="modal fade" id="deletelibrary" tabindex="-1" role="dialog" aria-labelledby="deletelibraryLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="deletelibraryLabel">حذف زبون</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>هل أنت متأكد أنك تريد حذف هذا الزبون من قاعدة البيانات ؟</p>
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
                             im.mask($('input[id^="e_phone"]'));
                             $(function() {
                                $(document.body).on('click', '.e_btn-remove-phone', function() {
                                    $(this).closest('.e_phone-input').remove();
                                });
                                $('.e_btn-add-phone').click(function() {
                                    var im = new Inputmask(['099-99-99-99', '09-99-99-99-99']),
                                        index = $('.e_phone-input').length + 1;
                                    if (index>3) return false;
                                    for(var i=1; i<index; i++) if (!validator.checkField.apply($('input[id="e_phone' + i + '"]'))) return false;
                                    $('.e_phone-list').append('' +
                                        '<div class="input-group e_phone-input">' +
                                        '<input type="text" name="phone' + index + '" id="e_phone' + index + '" style="direction:ltr" class="form-control col-md-7 col-xs-12" required="required"/>' +
                                        '<span class="input-group-btn">' +
                                        '<button class="btn btn-danger e_btn-remove-phone" type="button"><span class="glyphicon glyphicon-remove"></span></button>' +
                                        '</span>' +
                                        '</div>'
                                    );
                                    im.mask($('input[id="e_phone' + index + '"]'));
                                });
                            });
                        }
                    });
                }
                function paymentLibrary(e) {
                    var idname = e.split(">");
                    $.ajax({
                        url: "server/library_payment.php",
                        type: "POST",
                        data: "libraryId=" + idname[0] + "&name=" + idname[1],
                        success: function(data) {
                            $('#paymentlibrary').html(data);
                        },
                        complete: function() {
                             $("#paymentlibrary").modal('show');
                             $('#paid').on('change', function() {
                                if ($(this).val() > parseFloat($(this).attr('max')) || $(this).val() < 0) $(this).val(0);
                             });
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
                            '<input type="text" name="phone' + index + '" style="direction:ltr" class="form-control col-md-7 col-xs-12" required="required"/>' +
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
                    text: 'تم حذف الزبون بنجاح',
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
                    text: 'تم إضافة الزبون بنجاح',
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
                    text: 'تم دفع مستحقات الزبون بنجاح',
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
                    text: 'تم تعديل بيانات الزبون بنجاح',
                    type: 'info',
                    styling: 'bootstrap3'
                });
            </script>
            <?php
                };
                require "footer.php";
            ?>
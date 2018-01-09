
<!-- Pour faire l'appel à la page "header.php" -->

<?php
    require "header.php";
    if (strpos($_SESSION["access"], "p5") === FALSE) echo("<script>location.href = 'page_403.html';</script>");
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <?php  
                    $receipt = $connect->query("SELECT * FROM receipthistory");
                    while ($row = $receipt->fetch()) {
                ?>
                <span id="idEmployee" style="display:none"><?php echo $_GET['id']; ?></span>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?php echo $row["lastname"]." ".$row["firstname"]; ?> <small>الملف الشخصي</small></h2>
                                <a href="staff_management.php"><button style="margin-top:15px" type="button" class="btn btn-primary btn-lg"><i class="fa fa-sign-out m-right-xs"></i> الرجوع إلى القائمة</button></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="profile_title">
                                        <div class="col-md-6">
                                            <div id="reportrange" class="pull-left">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                <span id="changeDate"></span> <b class="caret"></b>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2>تقرير العمل</h2>
                                        </div>
                                    </div>
                                    <br />
                                    <!-- start of user-activity-graph -->
                                    <div class="table-responsive">
                                        <table class="table table-striped jambo_table table-bordered nowrap bulk_action" dir="rtl">
                                            <thead>
                                                <tr class="headings">
                                                    <th>الأيام</th>
                                                    <th>الدخول</th>
                                                    <th>الخروج</th>
                                                    <th>ساعات العمل</th>
                                                    <th>مجموع الساعات</th>
                                                </tr>
                                            </thead>
                                            <tbody id="requestContent"></tbody>
                                        </table>
                                    </div>
                                    <!-- end of user-activity-graph -->
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 profile_right">
                                    <div class="profile_img">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img class="img-responsive avatar-view" src="images/img.jpg" alt='<?php echo $row["lastname"]." ".$row["firstname"]; ?>' title='<?php echo $row["lastname"]." ".$row["firstname"]; ?>'>
                                        </div>
                                    </div>
                                    <br />
                                    <h3><?php echo $row["lastname"]." ".$row["firstname"]; ?></h3>

                                    <ul class="list-unstyled user_data">
                                        <li>
                                            <?php echo $row["adress"]; ?> <i class="fa fa-map-marker user-profile-icon"></i>
                                        </li>

                                        <li>
                                            <?php echo $row["position"]; ?> <i class="fa fa-briefcase user-profile-icon"></i>
                                        </li>

                                        <li class="m-top-xs">
                                            <a href='mailto:<?php echo $row["email"]; ?>'><?php echo $row["email"]; ?></a>
                                            <i class="fa fa-envelope user-profile-icon"></i>
                                        </li>
                                    </ul>

                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#formTab"><i class="fa fa-edit m-right-xs"></i>تعديل البيانات</button>
                                    <br /><br /><br />

                                    <!-- start skills -->
                                    <h3>نسبة الحضور والغياب</h3>
                                    <ul class="list-unstyled user_data">
                                        <li>
                                            <p>نسبة الحضور</p>
                                            <div class="progress">
                                                <div class="progress-bar bg-green" id="presenceRate" role="progressbar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>نسبة الغياب</p>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" id="absenceRate" role="progressbar"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- end of skills -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                    $receipt->closeCursor();
                    unset($connect);
                ?> 
            </div>
        </div>
        <!-- /page content -->
        <div class="modal fade" id="confirmStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">تعديل البيانات </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>هل أنت متأكد أنك تريد تعديل الحساب بالبيانات المحدثة الآن ؟</p>
                        <button type="button" onclick="document.getElementById('employeeForm').submit();" data-dismiss="modal" class="btn btn-primary btn-lg" id="message-text"> إرسال </button>
                        <button type="button" onclick="$('#wizard').smartWizard('goToStep',1);" class="btn btn-primary btn-lg" data-dismiss="modal" id="recipient-name"> تأكد من جديد </button>
                    </div>
                </div>
            </div>
        </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>
    <script>
        $(document).ready(function() {
            $("#changeDate").on('DOMSubtreeModified', function() {
                $.ajax({
                    url: "server/presence_query.php",
                    type: "POST",
                    data: "date=" + $("#changeDate").text() + '&idEmployee=' + $("#idEmployee").text(),
                    success: function(data) {
                        //$(data).appendTo('#requestContent');
                        $('#requestContent').html(data);
                    }
                });
            });
            $("#wizard").smartWizard({
                onFinish: function () {
                    $('#confirmStaff').modal('show');
                },
                onLeaveStep: function () {
                    var currentStep = $("#wizard").smartWizard('currentStep'),
                        ok = validator.checkAll($("#step-" + currentStep));
                    if (ok) { 
                        $("#wizard").smartWizard('hideError', currentStep);
                        return true;
                    } else {
                        $("#wizard").smartWizard('showError', currentStep);
                    }
                }
            });
        });
        $(function() {
            $(document.body).on('click', '.btn-remove-phone', function() {
                $(this).closest('.phone-input').remove();
            });
            $('.btn-add-phone').click(function() {
                var im = new Inputmask("09-99-99-99-99"),
                    index = $('.phone-input').length + 1;
                if (index>3) return false;
                for(var i=1; i<index; i++) if (!validator.checkField.apply($('input[name="phone' + i + '"]'))) return false;
                $('.phone-list').append('' +
                    '<div class="input-group phone-input">' +
                    '<input type="text" name="phone' + index + '" style="direction:ltr" pattern="phone" class="form-control col-md-7 col-xs-12" required="required" />' +
                    '<span class="input-group-btn">' +
                    '<button class="btn btn-danger btn-remove-phone" type="button"><span class="glyphicon glyphicon-remove"></span></button>' +
                    '</span>' +
                    '</div>'
                );
                im.mask($('input[name="phone' + index + '"]'));
            });
        });
    </script>
    <?php if (isset($_GET['success'])) { ?>
    <script>
        new PNotify({
            title: 'تنويه',
            text: 'تم تعديل بيانات الموظف بنجاح',
            type: 'success',
            styling: 'bootstrap3'
        });
    </script>
    <?php
        };
        require "footer.php";
    ?>
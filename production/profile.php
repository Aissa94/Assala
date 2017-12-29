
<!-- Pour faire l'appel à la page "header.php" -->

<?php
    require "header.php";
?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <?php  
                        $employee = $connect->query("SELECT * FROM members WHERE memberId =".$_GET['id']);
                        while ($row = $employee->fetch()) {
                    ?>
                    <span id="idEmployee" style="display:none"><?php echo $_GET['id']; ?></span>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $row["lastname"]." ".$row["firstname"]; ?> <small>الملف الشخصي</small></h2>
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
                                        <div class="modal fade modal" id="formTab" tabindex="-1" role="dialog" aria-labelledby="formTabLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="width:1000px">
                                                <div class="modal-content" >
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="formTabLabel"><?php echo $row["lastname"]." ".$row["firstname"]; ?></h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="wizard" class="form_wizard wizard_horizontal">
                                                            <ul class="wizard_steps">
                                                                <li>
                                                                    <a href="#step-1">
                                                                        <span class="step_no">1</span>
                                                                        <span class="step_descr">
                                                                المرحلة 1<br />
                                                                <small>البيانات الشخصية</small>
                                                            </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#step-2">
                                                                        <span class="step_no">2</span>
                                                                        <span class="step_descr">
                                                                المرحلة 2<br />
                                                                <small>بيانات التواصل</small>
                                                            </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#step-3">
                                                                        <span class="step_no">3</span>
                                                                        <span class="step_descr">
                                                                المرحلة 3<br />
                                                                <small>بيانات العمل</small>
                                                            </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <form class="form-horizontal form-label-left" method="post" action="server/edit_employee.php" id="employeeForm">
                                                            <div id="step-1">
                                                                    <input type="hidden" id="memberId" name="memberId" value='<?php echo $row["memberId"]; ?>'>
                                                                    <div class="item form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                                            <input type="text" id="firstname" name="firstname" value='<?php echo $row["firstname"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname"> <span class="required">*</span>الاسم </label> 
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                                            <input type="text" id="lastname" name="lastname" value='<?php echo $row["lastname"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname"> <span class="required">*</span>اللقب</label>
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <div class='input-group date col-md-6 col-sm-6 col-xs-12 marginelo' id='myDatepicker'>
                                                                            <input id="birthday" name="birthday" value='<?php echo $row["birthday"]; ?>' class="form-control col-md-7 col-xs-12" type="text" required="required"/>
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>                         
                                                                        </div>
                                                                        <label for="birthday" class="control-label col-md-3 col-sm-3 col-xs-12">تاريخ الميلاد</label>
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <?php if ($row["gender"] == "ذكر") { ?>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo" dir="rtl">
                                                                                ذكر: <input type="radio" class="flat" name="gender" id="genderM" value="ذكر" checked="checked" required="required" />
                                                                                &ensp; &ensp; &ensp; &ensp;
                                                                                أنثى: <input type="radio" class="flat" name="gender" id="genderF" value="أنثى" />
                                                                            </div>
                                                                        <?php } else { ?>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 marginelo" dir="rtl">
                                                                                ذكر: <input type="radio" class="flat" name="gender" id="genderM" value="ذكر" required="required" />
                                                                                &ensp; &ensp; &ensp; &ensp;
                                                                                أنثى: <input type="radio" class="flat" name="gender" id="genderF" checked="checked" value="أنثى" />
                                                                            </div>
                                                                        <?php }; ?>
                                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">الجنس</label>
                                                                    </div>
                                                            </div>
                                                            <div id="step-2">
                                                                    <div class="item form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                                            <div class="phone-list">
                                                                                <div class="phone-input">
                                                                                    <input type="text" name="phone1" value='<?php echo $row["phone"]; ?>' style="direction:ltr" pattern="phone" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : '09-99-99-99-99'" id="phone" required="required"/>
                                                                                </div>
                                                                                <?php if (!empty($row["phone2"])) { ?>
                                                                                <div class="phone-input input-group">
                                                                                    <input type="text" name="phone2" value='<?php echo $row["phone2"]; ?>' style="direction:ltr" pattern="phone" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : '09-99-99-99-99'" required="required"/>
                                                                                    <span class="input-group-btn">
                                                                                        <button class="btn btn-danger btn-remove-phone" type="button">
                                                                                            <span class="glyphicon glyphicon-remove"></span>
                                                                                        </button>
                                                                                    </span>
                                                                                </div>
                                                                                <?php } if (!empty($row["phone3"])) { ?>
                                                                                <div class="phone-input input-group">
                                                                                    <input type="text" name="phone3" value='<?php echo $row["phone3"]; ?>' style="direction:ltr" pattern="phone" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : '09-99-99-99-99'" required="required"/>
                                                                                    <span class="input-group-btn">
                                                                                        <button class="btn btn-danger btn-remove-phone" type="button">
                                                                                            <span class="glyphicon glyphicon-remove"></span>
                                                                                        </button>
                                                                                    </span>
                                                                                </div>
                                                                                <?php } ?>    
                                                                            </div>
                                                                            <button type="button" id="btn-add-phone" class="btn btn-success btn-sm btn-add-phone"><span class="glyphicon glyphicon-plus"></span> أضف هاتف</button>
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"> <span class="required">*</span>الهاتف </label><br />
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                                            <input type="email" id="email" value='<?php echo $row["email"]; ?>' name="email" style="direction:ltr" required="required" class="form-control col-md-7 col-xs-12">
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> <span class="required">*</span>البريد الالكتروني </label>   
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                                            <input type="text" id="adress" name="adress" value='<?php echo $row["adress"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adress"> <span class="required">*</span>العنوان البريدي </label>   
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                                            <input type="text" id="idcard" name="idcard" value='<?php echo $row["idcard"]; ?>' pattern="numeric" required="required" class="form-control col-md-7 col-xs-12">
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcard"> <span class="required">*</span>رقم بطاقة التعريف </label>     
                                                                    </div>
                                                            </div>
                                                            <div id="step-3">
                                                                    <div class="item form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                                            <input type="text" id="position" name="position" value='<?php echo $row["position"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position"> <span class="required">*</span>المنصب المشغول </label>   
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                                            <input type="text" id="level" name="level" value='<?php echo $row["level"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level"> <span class="required">*</span>المستوى الدراسي </label>   
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <div class='input-group date col-md-6 col-sm-6 col-xs-12 marginelo' id='myDatepicker2'>
                                                                            <input id="job" name="job" value='<?php echo $row["job"]; ?>' class="form-control col-md-7 col-xs-12" type="text" required="required"/>
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>                         
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job">تاريخ بداية العمل </label>
                                                                    </div>
                                                                    <div class="item form-group">
                                                                        <div class="input-group col-md-6 col-sm-6 col-xs-12 marginelo">
                                                                            <input type="number" id="salary" name="salary" value='<?php echo $row["salary"]; ?>' min="10000" step="1000" required="required" class="form-control col-md-7 col-xs-12">
                                                                        </div>
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">الراتب المتفق عليه </label>                                                   
                                                                    </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                        $employee->closeCursor();
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
<?php
    require "footer.php";
?>

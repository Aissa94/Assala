<!-- Pour faire l'appel à la page "header.php" -->

<?php
    require "header.php";
    if (strpos($_SESSION["access"], "p3") === FALSE) echo("<script>location.href = 'page_403.html';</script>");
?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <!---div class="page-title">
                        <div class="title_left">
                            <h3>Form Wizards</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 item form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                                </div>
                            </div>
                        </div>
                    </div-->
                    <div class="clearfix"></div>

                    <div class="row form_style">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>إضافة موظف جديد</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <!-- Smart Wizard -->
                                    <p>يرجى ملء البيانات التالية بعناية حتى يتم إنشاء حساب الموظف الجديد</p>
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
                                            <li>
                                                <a href="#step-4">
                                                    <span class="step_no">4</span>
                                                    <span class="step_descr">
                                              المرحلة 4<br />
                                              <small>بيانات الحساب</small>
                                          </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <form class="form-horizontal form-label-left" method="post" action="server/add_employee.php" id="employeeForm">
                                        <div id="step-1">
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname"> <span class="required">*</span>الاسم </label> 
                                                </div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname"> <span class="required">*</span>اللقب</label>
                                                </div>
                                                <div class="item form-group">
                                                    <div class='input-group date col-md-6 col-sm-6 col-xs-12 marginelo' id='myDatepicker'>
                                                        <input id="birthday" name="birthday" class="form-control col-md-7 col-xs-12" type="text" required="required"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>                         
                                                    </div>
                                                    <label for="birthday" class="control-label col-md-3 col-sm-3 col-xs-12">تاريخ الميلاد</label>
                                                </div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo" dir="rtl">
                                                         ذكر: <input type="radio" class="flat" name="gender" id="genderM" value="ذكر" checked="checked" required="required" />
                                                         &ensp; &ensp; &ensp; &ensp;
                                                         أنثى: <input type="radio" class="flat" name="gender" id="genderF" value="أنثى" />
                                                        <!--div id="gender" class="btn-group" data-toggle="buttons" >
                                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="gender" value="ذكر"/>ذكر
                                                            </label>
                                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="gender" value="أنثى" checked="checked" required="required"/>أنثى
                                                            </label>
                                                        </div-->
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">الجنس</label>
                                                </div>
                                        </div>
                                        <div id="step-2">
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <div class="phone-list">
                                                            <div class="phone-input">
                                                                <input type="text" name="phone1" style="direction:ltr" pattern="phone" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : '09-99-99-99-99'" id="phone" required="required"/>
                                                            </div>    
                                                        </div>
                                                        <button type="button" id="btn-add-phone" class="btn btn-success btn-sm btn-add-phone"><span class="glyphicon glyphicon-plus"></span> أضف هاتف</button>
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"> <span class="required">*</span>الهاتف </label><br />
                                                </div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="email" id="email" name="email" style="direction:ltr" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> <span class="required">*</span>البريد الالكتروني </label>   
                                                </div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="text" id="adress" name="adress" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="adress"> <span class="required">*</span>العنوان البريدي </label>   
                                                </div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="text" id="idcard" name="idcard" pattern="numeric" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idcard"> <span class="required">*</span>رقم بطاقة التعريف </label>     
                                                </div>
                                        </div>
                                        <div id="step-3">
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="text" id="position" name="position" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position"> <span class="required">*</span>المنصب المشغول </label>   
                                                </div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="text" id="level" name="level" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level"> <span class="required">*</span>المستوى الدراسي </label>   
                                                </div>
                                                <div class="item form-group">
                                                    <div class='input-group date col-md-6 col-sm-6 col-xs-12 marginelo' id='myDatepicker2'>
                                                        <input id="job" name="job" class="form-control col-md-7 col-xs-12" type="text" required="required"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>                         
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job">تاريخ بداية العمل </label>
                                                </div>
                                                <div class="item form-group">
                                                    <div class="input-group col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="number" id="salary" name="salary" min="10000" step="1000" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salary">الراتب المتفق عليه </label>                                                   
                                                </div>
                                        </div>
                                        <div id="step-4">
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username"> <span class="required">*</span>اسم المستخدم </label>
                                                    
                                                </div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"> <span class="required">*</span>كلمة المرور </label>                
                                                </div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="password" id="password-repeat" name="password-repeat" data-validate-linked="password" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password-repeat"> <span class="required">*</span>تأكيد كلمة المرور </label>                
                                                </div>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <div class="dropdown docs-options">
                                                            <button type="button" class="btn btn-success btn-block dropdown-toggle" style="color:white" id="toggleOptions" data-toggle="dropdown" aria-expanded="true">
                                                                 <span class="caret"></span>
                                                                الصفحات المسموح بالولوج إليها
                                                            </button>
                                                            <ul class="dropdown-menu pageAccess" aria-labelledby="toggleOptions" required="required" role="menu">
                                                                <!--li role="presentation">
                                                                    <label class="checkbox-inline">
                                                                        الصفحة الرئيسة
                                                                        <input type="checkbox" name="access[]" id="access1" value="p1" class="flat" checked/>
                                                                    </label>
                                                                </li-->
                                                                <li role="presentation">
                                                                    <label class="checkbox-inline">
                                                                        تسيير الموظفين
                                                                        <input type="checkbox" name="access[]" id="access2" value="p2" class="flat" />
                                                                    </label>
                                                                </li>
                                                                <li role="presentation">
                                                                    <label class="checkbox-inline">
                                                                        إضافة موظف
                                                                        <input type="checkbox" name="access[]" id="access3" value="p3" class="flat" /> 
                                                                    </label>
                                                                </li>
                                                                <li role="presentation">
                                                                    <label class="checkbox-inline">
                                                                        تسيير الكتب
                                                                        <input type="checkbox" name="access[]" id="access4" value="p4" class="flat" />
                                                                    </label>
                                                                </li>
                                                                <li role="presentation">
                                                                    <label class="checkbox-inline">
                                                                        تسيير الزبائن
                                                                        <input type="checkbox" name="access[]" id="access5" value="p5" class="flat" />
                                                                    </label>
                                                                </li>
                                                                <li role="presentation">
                                                                    <label class="checkbox-inline">
                                                                        إنشاء وصل جديد
                                                                        <input type="checkbox" name="access[]" id="access6" value="p6" class="flat" />
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.dropdown -->
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="toggleOptions"> <span class="required">*</span>الصفحات</label>
                                                </div>
                                        </div>
                                    </form>
                                    </div>
                                    <!-- End SmartWizard Content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
    <!-- jQuery Smart Wizard -->
     <div class="modal fade" id="confirmStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">تأكيد بيانات الموظف</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد إنشاء حساب بالبيانات المسبق إدراجها ؟</p>
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
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script>
        $(document).ready(function() {
            $("#wizard").smartWizard({
                onFinish: function () {
                    var currentStep = $("#wizard").smartWizard('currentStep'),
                        ok = validator.checkAll($("#step-" + currentStep));
                    if (ok) { 
                        $("#wizard").smartWizard('hideError', currentStep);
                        $('#confirmStaff').modal('show');
                    } else {
                        $("#wizard").smartWizard('showError', currentStep);
                    }
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

<!-- Pour faire l'appel à la page "footer.php" -->      
<?php if (isset($_GET['warning'])) { ?>
    <script>
        new PNotify({
            title: 'تنويه',
            text: 'يرجى تغيير اسم المستخدم',
            type: 'warning',
            styling: 'bootstrap3'
        });
    </script>
<?php
    };
    require "footer.php";
?>
 
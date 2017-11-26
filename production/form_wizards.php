<!-- Pour faire l'appel à la page "header.php" -->

<?php
    require "header.php";
?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <!---div class="page-title">
                        <div class="title_left">
                            <h3>Form Wizards</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
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
                                              <small>معلومات إضافية</small>
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
                                        <div id="step-1">
                                            <form class="form-horizontal form-label-left">

                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">*</span>الاسم </label>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> <span class="required">*</span>اللقب
                            </label>
                    
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" id="middle-name" class="form-control col-md-7 col-xs-12" type="date" name="middle-name">
                                                    </div>
                                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">تاريخ الميلاد</label>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="male"> &nbsp; ذكر &nbsp;
                                </label>
                                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                  <input type="radio" name="gender" value="female"> أنثى
                                </label>
                                                        </div>
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">الجنس</label>
                                                </div>
                                            

                                            </form>

                                        </div>
                                        <div id="step-2">
                                            <form class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" type="text" id="phone" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">*</span>الهاتف </label>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" type="text" id="email" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">*</span>البريد الالكتروني </label>
                                                    
                                                </div>
                                            </form>
                                        </div>
                                        <div id="step-3">
                                            <form class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" type="text" id="phone" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">*</span>رقم بطاقة التعريف </label>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" type="date" id="email" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">تاريخ بداية العمل </label>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" type="text" id="email" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">المبلغ المتفق عليه </label>
                                                    
                                                </div>
                                            </form>
                                        </div>
                                        <div id="step-4">
                                            <form class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" type="text" id="phone" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">*</span>اسم المستخدم </label>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input dir="rtl" type="text" id="email" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">*</span>كلمة المرور </label>
                                                    
                                                </div>
                                            </form>
                                        </div>

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
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-top:70px;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" style="float:right">تأكيد بيانات الموظف</h4>
                        <button style="float:left" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="text-align:center;font-size:18px;margin-bottom:10px;">
                            هل أنت متأكد أنك تريد إنشاء حساب بالبيانات المسبق إدراجها ؟</p>
                        <button style="margin-left:150px;" type="button" onclick="document.getElementById('form1').submit();" data-dismiss="modal" class="btn btn-primary btn-lg" id="message-text"> إرسال </button>
                        <button type="button" style="margin-left:100px;" onclick='$("#wizard").smartWizard("goToStep",1);' class="btn btn-primary btn-lg" data-dismiss="modal" id="recipient-name"> تأكد من جديد </button>
                    </div>
                </div>
            </div>
        </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <script>
        $(document).ready(function() {
            $("#wizard").smartWizard({
                onFinish: function () {
                    $('#exampleModal').modal('show');
                }
            });
        });
    </script>
    <!-- Pour faire l'appel à la page "footer.php" -->      
<?php
require "footer.php";
?>
 
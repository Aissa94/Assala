
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

                                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">البيانات الشخصية</a></li>
                                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">بيانات التواصل</a></li>
                                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">بيانات العمل</a></li>
                                                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">بيانات الحساب</a></li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content right_text">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" data-parsley-group="block1">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname"> <span class="required">*</span>الاسم </label> 
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname"> <span class="required">*</span>اللقب</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <input id="birthday" name="birthday" class="form-control col-md-7 col-xs-12" type="date" name="middle-name">
                                                    </div>
                                                    <label for="birthday" class="control-label col-md-3 col-sm-3 col-xs-12">تاريخ الميلاد</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="gender" value="ذكر"> &nbsp; ذكر &nbsp;
                                                            </label>
                                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="gender" value="أنثى"> أنثى
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">الجنس</label>
                                                </div>

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                                   

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                   
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                                   
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

                                        <button class="btn btn-success btn-lg"><i class="fa fa-edit m-right-xs"></i>تعديل البيانات</button>
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
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#changeDate").on('DOMSubtreeModified', function() {
                $.ajax({
                    url: "server/presence_query.php",
                    type: "POST",
                    data: "date=" + $("#changeDate").text() + '&idEmployee=' + $("#idEmployee").text(),
                    success: function(data) {
                        //$(data).appendTo('#requestContent');
                        console.log(data);
                        $('#requestContent').html(data);
                    }
                });
            });
        });
    </script>
<?php
    require "footer.php";
?>

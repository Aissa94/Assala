<?php
    require "header.php";
    if (strpos($_SESSION["access"], "p5") === FALSE) echo("<script>location.href = 'page_403.html';</script>");
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <!--span id="idEmployee" style="display:none"><?php echo $_GET['id']; ?></span-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?php //echo $row["lastname"]." ".$row["firstname"]; ?>أرشيف الوصول والدفعات</h2>
                                <a href="libraries_store.php"><button style="margin-top:15px" type="button" class="btn btn-primary btn-lg"><i class="fa fa-sign-out m-right-xs"></i> الرجوع إلى القائمة</button></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="profile_title">
                                        <div class="col-md-6">
                                            <div class='input-group date col-md-4 col-sm-6 col-xs-12 pull-left' id='reportyear'>
                                                <span class="input-group-addon" style="cursor:default">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>  
                                                <select id="changeDate" name="changeDate" class="col-md-12 col-xs-12">
                                                    <?php for($i=2018; $i<=date('Y'); $i++) { 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    } ?>
                                                </select>                       
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2>أرشيف سنة</h2>
                                        </div>
                                    </div>
                                    <br />
                                    <!-- start of user-activity-graph -->
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">أرشيف الوصول</a>
                                                </li>
                                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">أرشيف الدفع</a>
                                                </li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                    <!-- start recent activity -->
                                                    <div class="table-responsive">
                                                        <table class="table table-striped jambo_table table-bordered nowrap bulk_action" dir="rtl">
                                                            <thead>
                                                                <tr class="headings">
                                                                    <th>رقم الوصل</th>
                                                                    <th>الزبون</th>
                                                                    <th>التاريخ</th>
                                                                    <th>القيمة</th>
                                                                    <th>نوع السعر</th>
                                                                    <th>نوع الوصل</th>
                                                                    <th>تعديل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="requestContent"></tbody>
                                                            <?php  
                                                                if (isset($_GET["name"])) $receipt = $connect->query("SELECT * FROM receipthistory where client='". $_GET['name']. "'");
                                                                else $receipt = $connect->query("SELECT * FROM receipthistory");
                                                                //SELECT * FROM `receipthistory` WHERE YEAR(date) = 2017
                                                                while ($row = $receipt->fetch()) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row["historyId"].'/'.date('Y', strtotime($row["date"])); ?></td>
                                                                <td><?php echo $row["client"]; ?></td>
                                                                <td><?php echo $row["date"]; ?></td>
                                                                <td><?php echo $row["cost"]; ?></td>
                                                                <td>
                                                                    <?php 
                                                                        switch($row["typePrice"]) {
                                                                            case "general":
                                                                                echo "السعر العمومي";
                                                                                break;
                                                                            case "library":
                                                                                echo "سعر المكتبة";
                                                                                break;
                                                                            case "whole":
                                                                                echo "سعر الجملة";
                                                                                break;
                                                                        default:
                                                                                echo "تخصيص (".($row["typePrice"]*100)." %)";
                                                                                break;
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php 
                                                                        if ($row["type"]=="sale") echo "بيع"; 
                                                                        else  echo "استرجاع";
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <span class="fa fa-pencil-square-o blue pointer" title="تعديل" onclick='window.location.href="receipts_create.php?id=<?php echo $row["historyId"]; ?>"' id='<?php echo $row["historyId"]; ?>'></span>&nbsp;
                                                                    <span class="fa fa-trash-o red pointer" title="حذف" onclick="deleteReceipt(id)" id='<?php echo $row["historyId"]; ?>'></span>&nbsp;
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                }
                                                                $receipt->closeCursor();
                                                            ?>
                                                        </table>
                                                    </div>
                                                    <!-- end recent activity -->
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped jambo_table table-bordered nowrap bulk_action" dir="rtl">
                                                            <thead>
                                                                <tr class="headings">
                                                                    <th>الزبون</th>
                                                                    <th>التاريخ</th>
                                                                    <th>الرصيد</th>
                                                                    <th>الدفع</th>
                                                                    <th>المبلغ المتبقي</th>
                                                                    <th>نوع الدفع</th>
                                                                    <th>حذف</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="requestContent"></tbody>
                                                            <?php  
                                                                if (isset($_GET["id"])) $payment = $connect->query("SELECT * FROM payments where libraryId=" . $_GET['id']);
                                                                else  $payment = $connect->query("SELECT * FROM payments");
                                                                while ($row = $payment->fetch()) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php 
                                                                        $library = $connect->query("SELECT name FROM librarystore WHERE libraryId=".$row["libraryId"]);
                                                                        while ($client = $library->fetch()) {
                                                                            $name = $client["name"];
                                                                        }
                                                                        $library->closeCursor();
                                                                        echo $name;
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $row["date"]; ?></td>
                                                                <td><?php echo $row["deserved"]; ?></td>
                                                                <td><?php echo $row["paid"]; ?></td>
                                                                <td><?php echo ($row["deserved"] - $row["paid"]); ?></td>
                                                                <td><?php echo $row["typeAmount"]; ?></td>
                                                                <td>
                                                                    <span class="fa fa-trash-o red pointer" title="حذف" onclick="deletePayment(id)" id='<?php echo $row["paymentId"]; ?>'></span>&nbsp;
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                }
                                                                $payment->closeCursor();
                                                                $receipt = $connect->query("SELECT (IFNULL((SELECT sum(cost) FROM receipthistory WHERE type='sale'), 0) - IFNULL((SELECT sum(cost) FROM receipthistory WHERE type='recovery'), 0)) AS sales");
                                                                while ($row = $receipt->fetch()) {
                                                                    $sales = $row["sales"];
                                                                }
                                                                $receipt->closeCursor();
                                                                $payment = $connect->query("SELECT sum(paid) AS paid FROM payments");
                                                                while ($row = $payment->fetch()) {
                                                                    $paid = $row["paid"];
                                                                }
                                                                $payment->closeCursor();
                                                            ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- end of user-activity-graph -->
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 profile_right">
                                    <!--div class="profile_img">
                                        <div id="crop-avatar">
                                            <img class="img-responsive avatar-view" src="images/img.jpg">
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

                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#formTab"><i class="fa fa-edit m-right-xs"></i>تعديل البيانات</button-->
                                    <br /><br /><br />

                                    <!-- start skills -->
                                    <h3>التعاملات والمستحقات</h3>
                                    <br />
                                    <ul class="list-unstyled user_data">
                                        <li>
                                            <p>قيمة التعاملات الإجمالية</p>
                                            <div class="form-group">
                                                <input type="text" id="sales" value='<?php echo number_format($sales, 2, ',', ''); ?> دج' readonly class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </li>
                                        <br /><br />
                                        <li>
                                            <p>الرصيد الإجمالي</p>
                                            <div class="form-group">
                                                <input type="text" id="deserved" value='<?php echo number_format($sales - $paid, 2, ',', ''); ?> دج' readonly class="form-control col-md-7 col-xs-12">
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


         <!-- - Delete Receipt - -->
         <div class="modal fade" id="deletereceipt" tabindex="-1" role="dialog" aria-labelledby="deletereceiptLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="deletereceiptLabel">حذف الوصل</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>هل أنت متأكد أنك تريد حذف هذا الوصل من قاعدة البيانات ؟</p>
                        <form  id="delete_receipt" method="post" action="server/delete_receipt.php"> 
                            <input id="receiptId_delete" type="hidden" name="receiptId" value=""/>  
                        </form>
                        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">إلغاء</button>
                        <button style="margin-left:25%" type="submit" class="btn btn-primary btn-lg" form="delete_receipt"> حذف </button>
                    </div>
                </div>
            </div>
        </div>

         <!-- - Delete Payment - -->
         <div class="modal fade" id="deletepayment" tabindex="-1" role="dialog" aria-labelledby="deletepaymentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="deletepaymentLabel">حذف الدفع</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>هل أنت متأكد أنك تريد حذف هذا الدفع من قاعدة البيانات ؟</p>
                        <form  id="delete_payment" method="post" action="server/delete_payment.php"> 
                            <input id="paymentId_delete" type="hidden" name="paymentId" value=""/>  
                        </form>
                        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">إلغاء</button>
                        <button style="margin-left:25%" type="submit" class="btn btn-primary btn-lg" form="delete_payment"> حذف </button>
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
        function deleteReceipt(e) {
            $("#deletereceipt").modal('show');
            $('#receiptId_delete').val(e);
        }

        function deletePayment(e) {
            $("#deletepayment").modal('show');
            $('#paymentId_delete').val(e);
        }

        $(document).ready(function() {
            $("#changeDate").on('change', function() {
                $.ajax({
                    url: "server/presence_query.php",
                    type: "POST",
                    data: "date=" + $("#changeDate").val(),
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
        if (isset($_GET['delete'])) { ?>
        <script>
            new PNotify({
                title: 'تنويه',
                text: 'تم حذف الوصل بنجاح',
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
        <?php
        };
        if (isset($_GET['deletep'])) { ?>
        <script>
            new PNotify({
                title: 'تنويه',
                text: 'تم حذف الدفع بنجاح',
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
        <?php
        };
        require "footer.php";
    ?>
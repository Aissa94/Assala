
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
                                    <h2>قائمة موظفي المؤسسة</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                     <p class="text-muted font-13 m-b-30">                                
                                        هذه قائمة بجميع موظفي مؤسسة الأصالة
                                    </p>
                                    <table id="datatable-fixed-header" class="table table-striped table-bordered nowrap bulk_action" dir="rtl">
                                        <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>اللقب</th>
                                                <th>تاريخ الميلاد</th>
                                                <th>الجنس</th>
                                                <th>رقم الهاتف</th>
                                                <th>البريد</th>
                                                <th>العمل</th>
                                                <th>الراتب</th>
                                                <th>الملف الشخصي</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                $employee = $connect->query("SELECT * FROM members");
                                                while ($row = $employee->fetch()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["firstname"]; ?></td>
                                                <td><?php echo $row["lastname"]; ?></td>
                                                <td><?php echo $row["birthday"]; ?></td>
                                                <td><?php echo $row["gender"]; ?></td>
                                                <td><?php echo $row["phone"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td><?php echo $row["job"]; ?></td>
                                                <td><?php echo $row["salary"]; ?></td>
                                                <td class="dataTables_empty">
                                                    <button type="button" class="btn btn-default" aria-label="User">
                                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php 
                                                }
                                                $employee->closeCursor();
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
            <?php
                require "footer.php";
            ?>
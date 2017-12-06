
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
                                    <h2>قائمة منشورات المؤسسة</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                     <p class="text-muted font-13 m-b-30">                                
                                        هذه قائمة بجميع كتب ومنشورات مؤسسة الأصالة
                                    </p>
                                    <table id="datatable-fixed-header" class="table table-striped table-bordered nowrap bulk_action" dir="rtl">
                                        <thead>
                                            <tr>
                                                <th>العنوان</th>
                                                <th>المؤلف</th>
                                                <th>سنة النشر</th>
                                                <th>ISBN</th>
                                                <th>الصفحات</th>
                                                <th>الكمية</th>
                                                <th>التخصص</th>
                                                <th>السعر</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <tr>
                                                <td>مذكرات خيرالدين بربروس</td>
                                                <td>د . محمد دراج</td>
                                                <td>2013</td>
                                                <td>978-9931-413-03-5</td>
                                                <td>196</td>
                                                <td>1560</td>
                                                <td>تاريخ</td>
                                                <td>400</td>
                                            </tr>
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
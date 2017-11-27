<!-- Pour faire l'appel à la page "header.php" -->

<?php
    require "header.php";
?>
    <!-- page content -->
     <div class="right_col" role="main">
                <div class="">

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>أحداث التقويم</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div id='calendar'></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
         
            <!-- calendar modal -->
            <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">إنشاء تقويم جديد</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div id="testmodal" style="padding: 5px 20px;">
                                <form id="antoform" class="form-horizontal calender" role="form">
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title" name="title">
                                        </div>
                                        <label class="col-sm-3 control-label">العنوان</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                                        </div>
                                        <label class="col-sm-3 control-label">التفصيل</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">إغلاق</button>
                            <button type="button" class="btn btn-primary antosubmit">حفظ التغييرات</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                             <h3 class="modal-title" id="myModalLabel2">تعديل التقويم</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">

                            <div id="testmodal2" style="padding: 5px 20px;">
                                <form id="antoform2" class="form-horizontal calender" role="form">
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title2" name="title2">
                                        </div>
                                        <label class="col-sm-3 control-label">العنوان</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                                        </div>
                                        <label class="col-sm-3 control-label">التفصيل</label>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal" >إغلاق</button>
                            <button type="button" class="btn btn-primary antosubmit2">حفظ التغييرات</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
            <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
            <!-- /calendar modal -->
            
            <!-- Pour faire l'appel à la page "footer.php" -->    
            <?php
            require "footer.php";
            ?>
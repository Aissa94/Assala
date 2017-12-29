<?php
    require "bdd_connect.php";
?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editlibraryLabel">تعديل مكتبة</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" id="edit_library" method="post" action="server/edit_library.php">
                    <input type="hidden" name="libraryId" id="editInput" value="<?php echo $_POST['libraryId']; ?>" />
                    <?php
                        $book = $connect->query("SELECT * FROM librarystore WHERE libraryId =".$_POST['libraryId']);
                        while ($row = $book->fetch()) {
                    ?>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <input type="text" id="e_name" name="name" value='<?php echo $row["name"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_name">الاسم</label>     
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <input type="text" id="e_state" name="state" value='<?php echo $row["state"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_state">الولاية</label>   
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <input type="text" id="e_adress" name="adress" value='<?php echo $row["adress"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_adress">العنوان</label>                                                    
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <input type="email" style="direction:ltr" id="e_email" name="email" value='<?php echo $row["email"]; ?>' required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_email">البريد</label>                                                   
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <div class="phone-list">
                                <div class="phone-input">
                                    <input type="text" style="direction:ltr" id="e_phone" name="phone1" value='<?php echo $row["phone"]; ?>' required="required" pattern="phone" class="form-control col-md-7 col-xs-12" >
                                </div>
                                 <?php if (!empty($row["phone2"])) { ?>
                                    <div class="phone-input input-group">
                                        <input type="text" name="phone2" value='<?php echo $row["phone2"]; ?>' style="direction:ltr" class="form-control col-md-7 col-xs-12" pattern="phone" required="required"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger btn-remove-phone" type="button">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <?php } if (!empty($row["phone3"])) { ?>
                                    <div class="phone-input input-group">
                                        <input type="text" name="phone3" value='<?php echo $row["phone3"]; ?>' style="direction:ltr" class="form-control col-md-7 col-xs-12" pattern="phone" required="required"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger btn-remove-phone" type="button">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                        </span>
                                    </div>
                                <?php } ?>    
                            </div>
                            <button type="button" id="btn-edit-phone" class="btn btn-success btn-sm btn-edit-phone"><span class="glyphicon glyphicon-plus"></span> أضف هاتف</button>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_phone">الهاتف</label>                                                   
                    </div>
                    <?php 
                        }
                        $book->closeCursor();
                        unset($connect);
                    ?>
                </form>
                <button style="margin-left:40%" type="submit" class="btn btn-primary btn-lg" form="edit_library"> تعديل </button>
            </div>
        </div>
    </div>
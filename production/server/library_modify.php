<?php
    require "bdd_connect.php";
?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editlibraryLabel">تعديل بيانات الزبون</h3>
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
                            <select id="e_type" name="type" class="form-control col-md-7 col-xs-12" dir="rtl">
                                <option <?php if ($row["type"]=="دار نشر") echo 'selected'; ?> value="دار نشر">دار نشر</option>
                                <option <?php if ($row["type"]=="مكتبة") echo 'selected'; ?> value="مكتبة">مكتبة</option>
                                <option <?php if ($row["type"]=="موزع") echo 'selected'; ?> value="موزع">موزع</option>
                                <option <?php if ($row["type"]=="زبون") echo 'selected'; ?> value="زبون">زبون</option>
                            </select>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_type">النوع</label>   
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <select id="e_state" name="state" class="form-control col-md-7 col-xs-12" dir="rtl">
                                <option <?php if ($row["state"]=="أدرار") echo 'selected'; ?> value="أدرار">أدرار</option>
                                <option <?php if ($row["state"]=="الشلف") echo 'selected'; ?> value="الشلف">الشلف</option>
                                <option <?php if ($row["state"]=="الأغواط") echo 'selected'; ?> value="الأغواط">الأغواط</option>
                                <option <?php if ($row["state"]=="أم البواقي") echo 'selected'; ?> value="أم البواقي">أم البواقي</option>
                                <option <?php if ($row["state"]=="باتنة") echo 'selected'; ?> value="باتنة">باتنة</option>
                                <option <?php if ($row["state"]=="بجاية") echo 'selected'; ?> value="بجاية">بجاية</option>
                                <option <?php if ($row["state"]=="بسكرة") echo 'selected'; ?> value="بسكرة">بسكرة</option>
                                <option <?php if ($row["state"]=="بشار") echo 'selected'; ?> value="بشار">بشار</option>
                                <option <?php if ($row["state"]=="البليدة") echo 'selected'; ?> value="البليدة">البليدة</option>
                                <option <?php if ($row["state"]=="البويرة") echo 'selected'; ?> value="البويرة">البويرة</option>
                                <option <?php if ($row["state"]=="تمنراست") echo 'selected'; ?> value="تمنراست">تمنراست</option>
                                <option <?php if ($row["state"]=="تبسة") echo 'selected'; ?> value="تبسة">تبسة</option>
                                <option <?php if ($row["state"]=="تلمسان") echo 'selected'; ?> value="تلمسان">تلمسان</option>
                                <option <?php if ($row["state"]=="تيارت") echo 'selected'; ?> value="تيارت">تيارت</option>
                                <option <?php if ($row["state"]=="تيزي وزو") echo 'selected'; ?> value="تيزي وزو">تيزي وزو</option>
                                <option <?php if ($row["state"]=="الجزائر") echo 'selected'; ?> value="الجزائر">الجزائر</option>
                                <option <?php if ($row["state"]=="الجلفة") echo 'selected'; ?> value="الجلفة">الجلفة</option>
                                <option <?php if ($row["state"]=="جيجل") echo 'selected'; ?> value="جيجل">جيجل</option>
                                <option <?php if ($row["state"]=="سطيف") echo 'selected'; ?> value="سطيف">سطيف</option>
                                <option <?php if ($row["state"]=="سعيدة") echo 'selected'; ?> value="سعيدة">سعيدة</option>
                                <option <?php if ($row["state"]=="سكيكدة") echo 'selected'; ?> value="سكيكدة">سكيكدة</option>
                                <option <?php if ($row["state"]=="سيدي بلعباس") echo 'selected'; ?> value="سيدي بلعباس">سيدي بلعباس</option>
                                <option <?php if ($row["state"]=="عنابة") echo 'selected'; ?> value="عنابة">عنابة</option>
                                <option <?php if ($row["state"]=="قالمة") echo 'selected'; ?> value="قالمة">قالمة</option>
                                <option <?php if ($row["state"]=="قسنطينة") echo 'selected'; ?> value="قسنطينة">قسنطينة</option>
                                <option <?php if ($row["state"]=="المدية") echo 'selected'; ?> value="المدية">المدية</option>
                                <option <?php if ($row["state"]=="مستغانم") echo 'selected'; ?> value="مستغانم">مستغانم</option>
                                <option <?php if ($row["state"]=="المسيلة") echo 'selected'; ?> value="المسيلة">المسيلة</option>
                                <option <?php if ($row["state"]=="معسكر") echo 'selected'; ?> value="معسكر">معسكر</option>
                                <option <?php if ($row["state"]=="ورقلة") echo 'selected'; ?> value="ورقلة">ورقلة</option>
                                <option <?php if ($row["state"]=="وهران") echo 'selected'; ?> value="وهران">وهران</option>
                                <option <?php if ($row["state"]=="البيض") echo 'selected'; ?> value="البيض">البيض</option>
                                <option <?php if ($row["state"]=="إليزي") echo 'selected'; ?> value="إليزي">إليزي</option>
                                <option <?php if ($row["state"]=="برج بوعريريج") echo 'selected'; ?> value="برج بوعريريج">برج بوعريريج</option>
                                <option <?php if ($row["state"]=="بومرداس") echo 'selected'; ?> value="بومرداس">بومرداس</option>
                                <option <?php if ($row["state"]=="الطارف") echo 'selected'; ?> value="الطارف">الطارف</option>
                                <option <?php if ($row["state"]=="تندوف") echo 'selected'; ?> value="تندوف">تندوف</option>
                                <option <?php if ($row["state"]=="تيسمسيلت") echo 'selected'; ?> value="تيسمسيلت">تيسمسيلت</option>
                                <option <?php if ($row["state"]=="الوادي") echo 'selected'; ?> value="الوادي">الوادي</option>
                                <option <?php if ($row["state"]=="خنشلة") echo 'selected'; ?> value="خنشلة">خنشلة</option>
                                <option <?php if ($row["state"]=="سوق أهراس") echo 'selected'; ?> value="سوق أهراس">سوق أهراس</option>
                                <option <?php if ($row["state"]=="تيبازة") echo 'selected'; ?> value="تيبازة">تيبازة</option>
                                <option <?php if ($row["state"]=="ميلة") echo 'selected'; ?> value="ميلة">ميلة</option>
                                <option <?php if ($row["state"]=="عين الدفلى") echo 'selected'; ?> value="عين الدفلى">عين الدفلى</option>
                                <option <?php if ($row["state"]=="النعامة") echo 'selected'; ?> value="النعامة">النعامة</option>
                                <option <?php if ($row["state"]=="عين تموشنت") echo 'selected'; ?> value="عين تموشنت">عين تموشنت</option>
                                <option <?php if ($row["state"]=="غرداية") echo 'selected'; ?> value="غرداية">غرداية</option>
                                <option <?php if ($row["state"]=="غليزان") echo 'selected'; ?> value="غليزان">غليزان</option>
                            </select>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_state">الولاية</label>   
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <input type="text" id="e_adress" name="adress" value='<?php echo $row["adress"]; ?>'  class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_adress">العنوان</label>                                                    
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <input type="email" style="direction:ltr" id="e_email" name="email" value='<?php echo $row["email"]; ?>'  class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_email">البريد</label>                                                   
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <div class="e_phone-list">
                                <div class="e_phone-input">
                                    <input type="text" style="direction:ltr" id="e_phone1" name="phone1" value='<?php echo $row["phone"]; ?>' class="form-control col-md-7 col-xs-12" >
                                </div>
                                 <?php if (!empty($row["phone2"])) { ?>
                                    <div class="e_phone-input input-group">
                                        <input type="text" style="direction:ltr" id="e_phone2" name="phone2" value='<?php echo $row["phone2"]; ?>' required="required" class="form-control col-md-7 col-xs-12" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger e_btn-remove-phone" type="button">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <?php } if (!empty($row["phone3"])) { ?>
                                    <div class="e_phone-input input-group">
                                        <input type="text" style="direction:ltr" id="e_phone3" name="phone3" value='<?php echo $row["phone3"]; ?>' required="required" class="form-control col-md-7 col-xs-12" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger e_btn-remove-phone" type="button">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <?php } ?>    
                            </div>
                             <button type="button" class="btn btn-success btn-sm e_btn-add-phone"><span class="glyphicon glyphicon-plus"></span> أضف هاتف</button>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_phone1">الهاتف</label>                                                   
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
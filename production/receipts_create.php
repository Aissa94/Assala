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
                        <h2>إنشاء وصل جديد</h2>
                        <button type="submit" class="btn btn-primary btn-lg" formtarget="_blank" form="print_receipt" id="addition"><b class="fa fa-print"></b> طباعة الوصل</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">                                
                            لتحرير وصل بيع جديد ؛ يرجى ملء البيانات التالية بعناية
                        </p>
                        <?php  
                            $librarystore = $connect->query("SELECT name FROM librarystore");
                            while ($row = $librarystore->fetch()) {
                                $list[] = $row["name"];
                            }
                            $librarystore->closeCursor();
                            $bookstore = $connect->query("SELECT * FROM bookstore WHERE quantity > 0");
                            while ($row = $bookstore->fetch()) {
                                $booksId[] = $row["bookId"];
                                $booksTitle[] = $row["title"];
                                $booksQuantity[] = $row["quantity"];
                                $booksPrice[] = $row["price"];
                            }
                            $bookstore->closeCursor();
                            unset($connect);
                        ?>
                        <form id="print_receipt" method="post" action="server/html2pdf/examples/exemple07.php">
                            <div class="col-md-8 center-margin">
                                <div class="form-horizontal form-label-right">
                                    <div class="form-group">
                                        <label for="receiver">المستلم</label>
                                        <input type="text" name="receiver" required="required" class="form-control" id="receiver" autocomplete="off" placeholder="اسم المستلم" />
                                    </div>
                                    <input type="hidden" name="t_price" id="t_price" value="general">
                                    <div class="form-group">
                                        <label for="price-type"> نوع السعر </label>                                           
                                        <div class="dropdown" id="price-type" value="general">
                                            <button type="button"class="btn-block btn priceType dropdown-toggle" id="toggleOptions" data-toggle="dropdown" aria-expanded="true">
                                                    <span class="caret"></span>السعر العمومي
                                            </button>
                                            <ul class="dropdown-menu pageAccess" aria-labelledby="toggleOptions" role="menu">
                                                <li role="presentation" data="general"><a role="menuitem" tabindex="-1">السعر العمومي</a>
                                                </li>
                                                <li role="presentation" class="divider"></li>
                                                <li role="presentation" data="library"><a role="menuitem" tabindex="-1">سعر المكتبة</a>
                                                </li>
                                                <li role="presentation" class="divider"></li>
                                                <li role="presentation" data="whole"><a role="menuitem" tabindex="-1">سعر الجملة</a>
                                                </li>
                                                <li role="presentation" class="divider"></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1">%<input type="number" min="1" max="500" value="50"/> تخصيص</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group" dir="rtl">
                                        <label for="paying"> الدفع </label>
                                        <select id="paying" name="paying" class="form-control" style="font-size:20px;height:42px">
                                            <option value="payed">مدفوع</option>
                                            <option value="unpayed">غير مدفوع</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <table class="table jambo_table table-bordered nowrap books" dir="rtl">
                                <thead>
                                    <tr class="headings books">
                                        <th>العنوان</th>
                                        <th>السعر</th>
                                        <th>الكمية المتوفرة</th>
                                        <th>الكمية المطلوبة</th>
                                        <th>التكلفة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="book-item">
                                        <td>
                                            <select class="form-control chosen-select" name="title[]">
                                                <?php for ($i=0; $i<count($booksTitle); $i++) { ?>
                                                    <option value="<?php echo $booksId[$i]; ?>" class="<?php echo $i; ?>" data="<?php echo $booksQuantity[$i]; ?>"><?php echo $booksTitle[$i]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><?php echo $booksPrice[0]; ?></td>
                                        <td><?php echo $booksQuantity[0]; ?></td>
                                        <td>
                                            <input type="number" min="0" max="1560" name="quantity[]" required="required" class="quantity form-control col-md-2 col-xs-12">
                                        </td>
                                        <td class="cost">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <button type="button" id="add-book" class="btn btn-success" style="font-size:20px"><span class="glyphicon glyphicon-plus"></span> أضف كتاب</button>
                        <br /><br />
                        <div class="form-horizontal form-label-right total-prices">
                            <div class="form-group col-md-7">
                                <label class="control-label col-md-3" for="first-name">المجموع</label>
                                <div class="col-md-7">
                                    <input type="text" id="total-cost" value="0 دج" readonly class="form-control">
                                </div>
                            </div>
             
                            <div class="form-group col-md-7">
                                <label class="control-label col-md-3" for="first-name">الخصم</label>
                                <div class="col-md-7">
                                    <input type="number" id="discount" min="0" required="required" value="0" class="form-control">
                                </div>
                            </div>
                      
                            <div class="form-group col-md-7">
                                <label class="control-label col-md-3" for="first-name">التكلفة الإجمالية</label>
                                <div class="col-md-7">
                                    <input type="text" id="total-sum" value="0 دج" readonly class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script>
    var item = $(".book-item").clone(),
        sum = 0,
        total = 0,
        booksPrice = <?php echo json_encode($booksPrice); ?>;
    $(document).ready(function(){
        $('#price-type li:last').click(function (e) {
            $('#toggleOptions span').remove().prependTo($('.priceType').text("% " + $('.dropdown-menu input').val()));
            $('#t_price').val($('.dropdown-menu input').val()/100);
            booksPrice = <?php echo json_encode($booksPrice); ?>;
            for (var i=0; i<booksPrice.length; i++) {
                booksPrice[i] = (booksPrice[i] * (1 - $('#t_price').val())).toFixed(2);
            }
        });
        $('#price-type li:not(:last)').click(function(){
            $('#toggleOptions span').remove().prependTo($('.priceType').text($(this).text()));
            $('#t_price').val($(this).attr('data'));
            booksPrice = <?php echo json_encode($booksPrice); ?>;
            for (var i=0; i<booksPrice.length; i++) {
                switch($('#t_price').val()) {
                    case "general":
                        booksPrice[i] = booksPrice[i];
                        break;
                    case "library":
                        booksPrice[i] = (booksPrice[i] / 1.3).toFixed(2);
                        break;
                    case "whole":
                        booksPrice[i] = (booksPrice[i] / 1.56).toFixed(2);
                }
            }
        });
         $('#discount').on('change', function() {
            sum = 0;
            $('.cost').each(function(){
                sum += parseFloat($(this).text());
            });
            total = sum - parseInt($('#discount').val());
            $('#total-sum').val(total.toFixed(2) + " دج");
        });
    });
    $(function() {
        $('#receiver').autocomplete({
            lookupLimit: 5,
            lookup: <?php echo json_encode($list); ?>
        });
        $(".chosen-select").chosen({
            no_results_text: "للأسف، لا يوجد كتاب بهذا الاسم",
            rtl: true,
            width: "100%",
        }).change(function() {
            $(this).parent('td').next().html(booksPrice[$(this).find(":selected").attr('class')]);
            $(this).parent('td').nextAll().eq(1).html($(this).find(":selected").attr('data'));
            $(this).parent('td').nextAll().eq(2).find("input").attr('max', $(this).find(":selected").attr('data'));
            $(this).parent('td').nextAll().eq(2).find("input").val();
            $(this).parent('td').nextAll().eq(3).html(0);
            sum = 0;
            $('.cost').each(function(){
                sum += parseFloat($(this).text());
            });
            $('#total-cost').val(sum.toFixed(2) + " دج");
            total = sum - parseInt($('#discount').val());
            $('#total-sum').val(total.toFixed(2) + " دج");
        });
    });
    $('.quantity').on('change', function() {
        var cost = $(this).val() * $(this).parent('td').prev().prev().text();
        $(this).parent('td').next().html(cost.toFixed(2));
        $('#total-cost').val(cost.toFixed(2) + " دج");
        total = cost - parseInt($('#discount').val());
        $('#total-sum').val(total.toFixed(2) + " دج");
    });
    $('#add-book').on('click', function() {
        $("tbody").append(item.clone());
        $(".chosen-select").chosen({
            no_results_text: "للأسف، لا يوجد كتاب بهذا الاسم",
            rtl: true,
            width: "100%",
        }).change(function() {
            $(this).parent('td').next().html(booksPrice[$(this).find(":selected").attr('class')]);
            $(this).parent('td').nextAll().eq(1).html($(this).find(":selected").attr('data'));
            $(this).parent('td').nextAll().eq(2).find("input").attr('max', $(this).find(":selected").attr('data'));
            $(this).parent('td').nextAll().eq(2).find("input").val();
            $(this).parent('td').nextAll().eq(3).html(0);
            sum = 0;
            $('.cost').each(function(){
                sum += parseFloat($(this).text());
            });
            $('#total-cost').val(sum.toFixed(2) + " دج");
            total = sum - parseInt($('#discount').val());
            $('#total-sum').val(total.toFixed(2) + " دج");
        });
        $('.quantity').on('change', function() {
            $(this).parent('td').next().html(($(this).val() * $(this).parent('td').prev().prev().text()).toFixed(2));
            sum = 0;
            $('.cost').each(function(){
                sum += parseFloat($(this).text());
            });
            $('#total-cost').val(sum.toFixed(2) + " دج");
            total = sum - parseInt($('#discount').val());
            $('#total-sum').val(total.toFixed(2) + " دج");
        });
    });
</script>

<?php
    require "footer.php";
?>
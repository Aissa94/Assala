<?php
    require "header.php";
    if (strpos($_SESSION["access"], "p6") === FALSE) echo("<script>location.href = 'page_403.html';</script>");
?>

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/pnotify/dist/pnotify.js"></script>


<!-- page content -->
<div class="right_col" role="main">
    <div class=""> 
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>إنشاء فاتورة جديدة</h2>
                        <!--button type="submit" formtarget="_blank" onclick="setTimeout(function(){ location.reload(); }, 1000)" class="btn btn-primary btn-lg" form="print_receipt"><b class="fa fa-print"></b> طباعة الفاتورة</button-->
                        <!--input class="btn btn-primary btn-lg" type="submit" formtarget="_blank" onclick="setTimeout(function(){ window.location.href = 'receipts_create.php'; }, 1000)" form="print_receipt" name="pdf" title="PDF طباعة الفاتورة بصيغة" value="PDF طباعة بصيغة"/-->
                        <input class="btn btn-primary btn-lg" type="submit" formtarget="_blank" onclick="setTimeout(function(){ window.location.href = 'bills_create.php'; }, 1000)" form="print_bill" name="excel" title="Excel طباعة الفاتورة بصيغة" value="Excel طباعة بصيغة"/>
                        <!--input class="btn btn-primary btn-lg" type="submit" onclick="setTimeout(function(){ window.location.href = 'receipts_create.php'; }, 1000)" form="print_receipt" name="save" title="حفظ الفاتورة" value="حفظ الفاتورة"/-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">                                
                            لتحرير فاتورة جديدة ؛ يرجى ملء البيانات التالية بعناية
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
                                $booksIsbn[] = $row["isbn"];
                            }
                            $bookstore->closeCursor();
                        ?>
                        <form id="print_bill" method="post" action="server/bill_printer.php">
                            <div class="col-md-8 center-margin">
                                <div class="form-horizontal form-label-right">
                                    <div class="form-group">
                                        <label for="receiver">المستلم</label>
                                        <input type="text" name="receiver" required="required" class="form-control" id="receiver" autocomplete="off" placeholder="اسم المستلم" />
                                    </div>
                                    <input type="hidden" name="price" id="t_price" value="general">
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
                                        <label for="paying">نوع الفاتورة</label>
                                        <select id="paying" name="type" class="form-control">
                                            <option value="sale">فاتورة شكلية</option>
                                            <option value="recovery">فاتورة نهائية</option>
                                        </select>
                                    </div>
                                    <div class="form-group" dir="rtl" style="text-align: center">
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" class="flat" name="info[]" value="rc"> RC
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" class="flat" name="info[]" value="fisc"> N° FISC
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" class="flat" name="info[]" value="artimp"> Art.IMP
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" class="flat" name="info[]" value="rib"> RIB
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" class="flat" name="info[]" value="nis"> NIS
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <table class="table jambo_table table-bordered nowrap books bulk_action" dir="rtl">
                                <thead>
                                    <tr class="headings books">
                                        <th>التعيين</th>
                                        <th>سعر الوحدة</th>
                                        <th>الكمية المتوفرة</th>
                                        <th>الكمية المطلوبة</th>
                                        <th>القيمة الإجمالية</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="book-item">
                                        <td>
                                            <select class="form-control chosen-select" data-placeholder="الرجاء اختيار كتاب من القائمة..." tabindex="-1" name="title[]">
                                                <option value="0"></option>
                                                <?php for ($i=0; $i<count($booksTitle); $i++) { 
                                                ?>
                                                    <option value="<?php echo $booksId[$i]; ?>" class="isbn <?php echo $i; ?>" data="<?php echo $booksQuantity[$i]; ?>"><?php echo $booksTitle[$i]. ';' . $booksIsbn[$i]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input type="number" min="1" disabled="disabled" max="10" name="quantity[]" required="required" class="quantity form-control col-md-2 col-xs-12">
                                        </td>
                                        <td class="cost">0</td>
                                        <td>
                                            <span class="fa fa-trash-o red pointer trash" title="حذف"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" id="total_hidden" name="cost" value="0">
                        </form>
                        <button type="button" id="add-book" class="btn btn-success" style="font-size:20px"><span class="glyphicon glyphicon-plus"></span> أضف كتاب</button>
                        <br /><br />
                        <div class="form-horizontal form-label-right total-prices">
                            <div class="form-group col-md-7 sum">
                                <label class="control-label col-md-3" for="total-cost">المبلغ الإجمالي</label>
                                <div class="col-md-7">
                                    <input type="text" id="total-cost" value="0 دج" readonly class="form-control">
                                </div>
                            </div>
             
                            <div class="form-group col-md-7">
                                <label class="control-label col-md-3" for="discount">الرسم على القيمة المضافة (9%)</label>
                                <div class="col-md-7">
                                    <input type="number" id="discount" min="0" step="0.01" readonly value="0" class="form-control">
                                </div>
                            </div>
                      
                            <div class="form-group col-md-7 sum">
                                <label class="control-label col-md-3" for="total-sum">القيمة الإجمالية (بالرسوم)</label>
                                <div class="col-md-7">
                                    <input type="text" id="total-sum" value="0 دج" readonly class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="display-hide-sum" class="btn btn-warning"> إظهار/إخفاء المجموع</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<script>
    var item = $(".book-item").clone();
    </script>
<?php
if (isset($_GET["id"])) {
    $_SESSION['historyId'] = $_GET["id"];
    $receipt = $connect->query("SELECT * FROM receipthistory where historyId=". $_GET['id']);
    while ($print = $receipt->fetch()) {
        switch($print['typePrice']){
            case "general":
                $price = "السعر العمومي";
                break;
            case "library":
                $price = "سعر المكتبة";
                break;
            case "whole":
                $price = "سعر الجملة";
                break;
            default:
                $price = "تخصيص";
                break;
        }

        echo "<script>$('#receiver').val('" . $print['client'] . "');</script>";
        echo "<script>$('#toggleOptions span').remove().prependTo($('.priceType').text('" . $price . "'));</script>";
        echo "<script>$('#t_price').val('" . $print['typePrice'] . "');</script>";
        echo "<script>$('#paying option[value=\"" . $print['type'] . "\"').attr('selected','selected');</script>";
        echo "<script>$('tbody').empty();</script>"; 

        $total = 0;
        $bookId = $print['books'];
        $bookId =unserialize($bookId);
        $quantities = $print['quantities'];
        $quantities = unserialize($quantities);
        
        $booksSet = '';
                                           
        for ($i=0; $i<count($booksTitle); $i++) { 
            
            if (!in_array($booksId[$i], $bookId)) $booksSet .= "<option value='". $booksId[$i] . "' class='isbn " . $i . "' data='" .  $booksQuantity[$i] . "'>" . $booksTitle[$i] . ";" . $booksIsbn[$i] . "</option>";
        
        } 

        for ($k=0; $k<count($bookId); $k++) {
            $book = $connect->query("SELECT * FROM bookstore WHERE bookId =".$bookId[$k]);
            while ($row = $book->fetch()) {
                $booksId = $row["bookId"];
                $title = $row["title"];
                $price = $row["price"];
                $isbn = $row["isbn"];
                $quantity = $row["quantity"];
            }
            $book->closeCursor();

            switch($print['typePrice']){
                case "general":
                    $price = $price;
                    break;
                case "library":
                    $price /= 1.3;
                    break;
                case "whole":
                    $price /=1.56;
                    break;
                default:
                    $price = $price * (1 -$print['typePrice']);
                    break;
            }
            $prix = $price * $quantities[$k];
            $total += $prix;
            echo "<script>$('tbody').append(\"<tr class='book-item'><td><select class='form-control chosen-select' data-placeholder='الرجاء اختيار كتاب من القائمة...' tabindex='-1' name='title[]'><option value='" . $booksId . "' class='isbn " . $k . "' data='" . $quantity . "'>" . $title . ";" . $isbn . "</option>" . $booksSet . "</select></td><td>" . number_format($price, 2, '.', '') . "</td><td>" . $quantity . "</td><td><input type='number' min='1' max='398' name='quantity[]' required='required' class='quantity form-control col-md-2 col-xs-12' value='" . $quantities[$k] . "'></td><td class='cost'>" . number_format($prix, 2, '.', '') . "</td><td><span class='fa fa-trash-o red pointer trash' title='حذف'></span></td></tr>\");</script>";
        }

        echo "<script>$('#total-cost').val('" . number_format($total, 2, '.', '') . " دج');</script>";
        
        if ($print['cost'] < $total) {
            echo "<script>$('#discount').val('" . number_format(($total - $print['cost']), 2, '.', '')  . "');</script>";
        } else {
            echo "<script>$('#discount').val('0');</script>";
        }
        
        echo "<script>$('#total-sum').val('" . number_format($print['cost'], 2, '.', '') . " دج');</script>";
        echo "<script>$('#total_hidden').val('" . number_format($print['cost'], 2, '.', '') . "');</script>";


    }
    $receipt->closeCursor();
    unset($connect);
}

?>
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script>
    //var item = $(".book-item").clone(),
    var sum = 0,
        total = 0,
        spans = document.getElementsByClassName('isbn');
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
                default:
                    booksPrice[i] = (booksPrice[i] * (1 - $('#t_price').val())).toFixed(2);
            }
        }

    $(document).ready(function(){
        for (var i = 0; i < spans.length; i++) {
            var res = spans[i].innerText.split(";");
            spans[i].innerHTML = res[0] + "<span style='visibility:hidden'>" + res[1] + "</span>";
        }

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
            if (($(this).val() > sum) || ($(this).val() < 0) || ($(this).val()=="")) $(this).val(0);
            if ((sum - parseFloat($('#discount').val())) <0) $('#discount').val(0);
            total = sum - parseFloat($('#discount').val());
            $('#total-sum').val(total.toFixed(2) + " دج");
            $("#total_hidden").val(total.toFixed(2));
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
            search_contains:true,
            width: "100%",
            allow_single_deselect: false,
        }).change(function() {
            for (var i = 0; i < spans.length; i++) {
                var res = spans[i].innerText.split(";");
                spans[i].innerHTML = res[0] + "<span style='visibility:hidden'>" + res[1] + "</span>";
            }
            var res = $(this).find(":selected").attr('class').split(" ");
            $(this).parent('td').next().html(booksPrice[res[1]]);
            $(this).parent('td').nextAll().eq(1).html(parseInt($(this).find(":selected").attr('data')) - 1);
            $(this).parent('td').nextAll().eq(2).find("input").attr('max', $(this).find(":selected").attr('data'));
            $(this).parent('td').nextAll().eq(2).find("input").removeAttr('disabled');
            $(this).parent('td').nextAll().eq(2).find("input").val(1);
            $(this).parent('td').nextAll().eq(3).html(booksPrice[res[1]]);
            sum = 0;
            $('.cost').each(function(){
                sum += parseFloat($(this).text());
            });
            $('#total-cost').val(sum.toFixed(2) + " دج");
            $('#discount').val((sum * 0.09 ).toFixed(2));
            total = sum + parseFloat($('#discount').val());
            $('#total-sum').val(total.toFixed(2) + " دج");
            $("#total_hidden").val(total.toFixed(2));
        });
    });
    $('.quantity').on('change', function() {
        if ($(this).val() > parseInt($(this).attr('max')) || $(this).val() < 1) $(this).val(1);
        var cost = $(this).val() * $(this).parent('td').prev().prev().text();
        if ($("#paying").val() == "sale") $(this).parent('td').prev().html($(this).parent('td').prevAll().eq(2).find(":selected").attr('data') - $(this).val());
        else $(this).parent('td').prev().html(parseInt($(this).parent('td').prevAll().eq(2).find(":selected").attr('data')) + parseInt($(this).val()));
        $(this).parent('td').next().html(cost.toFixed(2));
        sum = 0;
        $('.cost').each(function(){
            sum += parseFloat($(this).text());
        });
        $('#total-cost').val(sum.toFixed(2) + " دج");
        $('#discount').val((sum * 0.09 ).toFixed(2));
        total = cost + parseFloat($('#discount').val());
        $('#total-sum').val(total.toFixed(2) + " دج");
        $("#total_hidden").val(total.toFixed(2));
    });
    $('.trash').on('click', function() {
        $(this).parent('td').parent('tr').remove();
        sum = 0;
        $('.cost').each(function(){
            sum += parseFloat($(this).text());
        });
        $('#total-cost').val(sum.toFixed(2) + " دج");
        $('#discount').val((sum * 0.09 ).toFixed(2));
        total = sum + parseFloat($('#discount').val());
        $('#total-sum').val(total.toFixed(2) + " دج");
        $("#total_hidden").val(total.toFixed(2));
    });
    $('#display-hide-sum').on('click', function() {
        $(".sum").toggle('display');
    });
    function addBook() {
        $("tbody").append(item.clone());
        for (var i = 0; i < spans.length; i++) {
            var res = spans[i].innerText.split(";");
            spans[i].innerHTML = res[0] + "<span style='visibility:hidden'>" + res[1] + "</span>";
        }
        $(".chosen-select").chosen({
            no_results_text: "للأسف، لا يوجد كتاب بهذا الاسم",
            rtl: true,
            search_contains:true,
            width: "100%",
            allow_single_deselect: false,
        }).change(function() {
            var res = $(this).find(":selected").attr('class').split(" ");
            $(this).parent('td').next().html(booksPrice[res[1]]);
            $(this).parent('td').nextAll().eq(1).html(parseInt($(this).find(":selected").attr('data')) - 1);
            $(this).parent('td').nextAll().eq(2).find("input").attr('max', $(this).find(":selected").attr('data'));
            $(this).parent('td').nextAll().eq(2).find("input").removeAttr('disabled');
            $(this).parent('td').nextAll().eq(2).find("input").val(1);
            $(this).parent('td').nextAll().eq(3).html(booksPrice[res[1]]);
            sum = 0;
            $('.cost').each(function(){
                sum += parseFloat($(this).text());
            });
            $('#total-cost').val(sum.toFixed(2) + " دج");
            $('#discount').val((sum * 0.09 ).toFixed(2));
            total = sum + parseFloat($('#discount').val());
            $('#total-sum').val(total.toFixed(2) + " دج");
            $("#total_hidden").val(total.toFixed(2));
        });
        $('.quantity').on('change', function() {
            if ($(this).val() > parseInt($(this).attr('max')) || $(this).val() < 1) $(this).val(1);
            $(this).parent('td').next().html(($(this).val() * $(this).parent('td').prev().prev().text()).toFixed(2));
            if ($("#paying").val() == "sale") $(this).parent('td').prev().html($(this).parent('td').prevAll().eq(2).find(":selected").attr('data') - $(this).val());
            else $(this).parent('td').prev().html(parseInt($(this).parent('td').prevAll().eq(2).find(":selected").attr('data')) + parseInt($(this).val()));
            sum = 0;
            $('.cost').each(function(){
                sum += parseFloat($(this).text());
            });
            $('#total-cost').val(sum.toFixed(2) + " دج");
            $('#discount').val((sum * 0.09 ).toFixed(2));
            total = sum + parseFloat($('#discount').val());
            $('#total-sum').val(total.toFixed(2) + " دج");
            $("#total_hidden").val(total.toFixed(2));
        });
        $('.quantity').keypress(function(e) {
            if(e.which == 13) {
                // enter pressed
                e.preventDefault();
                addBook();
            }
        });
        $('.trash').on('click', function() {
            $(this).parent('td').parent('tr').remove();
            sum = 0;
            $('.cost').each(function(){
                sum += parseFloat($(this).text());
            });
            $('#total-cost').val(sum.toFixed(2) + " دج");
            $('#discount').val((sum * 0.09 ).toFixed(2));
            total = sum + parseFloat($('#discount').val());
            $('#total-sum').val(total.toFixed(2) + " دج");
            $("#total_hidden").val(total.toFixed(2));
        });
    }
    $('#add-book').on('click', addBook);
    $('.quantity').keypress(function(e) {
        if(e.which == 13) {
            // enter pressed
            e.preventDefault();
            addBook();
        }
    });
    $('button[type="submit"]').on("click", function() { 
        var has_empty = false;
        $(this).find('input[type!="hidden"]').each(function () {
            if (!$(this).val()) {
                has_empty = true;
                new PNotify({title: 'تنويه', text: 'يرجى ملء جميع البيانات الضرورية قبل طباعة الفاتورة', type: 'warning', styling: 'bootstrap3'});
                return false;
            }
        });
        if (has_empty) return false;
    });
</script>
<?php if (isset($_GET['success'])) { ?>
    <script>
        new PNotify({
            title: 'تنويه',
            text: 'تم حفظ الفاتورة بنجاح',
            type: 'success',
            styling: 'bootstrap3'
        });
    </script>

<?php
    };
    
?>
<?php
    require "footer.php";
?>
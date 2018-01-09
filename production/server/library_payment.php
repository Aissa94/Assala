<?php
    require "bdd_connect.php";
?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="paymentlibraryLabel">دفع مستحقات <?php echo $_POST['name']; ?> المالية</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" id="payment_library" method="post" action="server/payment_library.php">
                    <input type="hidden" name="libraryId" id="paymentInput" value="<?php echo $_POST['libraryId']; ?>" />
                    <?php
                        $sales = 0;
                        $paid = 0;
                        $receipt = $connect->query("SELECT ((SELECT sum(cost) FROM receipthistory WHERE type='sale' AND client='".$_POST['name']."') - (SELECT sum(cost) FROM receipthistory WHERE type='recovery' AND client='".$_POST['name']."')) AS sales");
                        while ($row = $receipt->fetch()) {
                            $sales = $row["sales"];
                        }
                        $receipt->closeCursor();
                        $payment = $connect->query("SELECT sum(paid) AS paid FROM payments WHERE libraryId=".$_POST['libraryId']);
                        while ($row = $payment->fetch()) {
                            $paid = $row["paid"];
                        }
                        $payment->closeCursor();
                        unset($connect);
                    ?>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <input type="text" id="sales" name="sales" value='<?php echo number_format($sales, 2, ',', ''); ?> دج' readonly class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sales">قيمة المبيعات</label>     
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <input type="hidden" name="deserved" value='<?php echo number_format($sales - $paid, 2, '.', ''); ?>'>
                            <input type="text" id="deserved" value='<?php echo number_format($sales - $paid, 2, '.', ''); ?> دج' readonly class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deserved">الرصيد</label>                                                    
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <input type="number" id="paid" name="paid" min="0" max="<?php echo number_format($sales - $paid, 2, '.', ''); ?>" step="0.01" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paid">مبلغ الدفع</label>                                                   
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 marginelo">
                            <select id="typeAmount" name="typeAmount" class="form-control col-md-7 col-xs-12" dir="rtl">
                                <option value="نقد">نقد</option>
                                <option value="صك">صك</option>
                            </select>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="typeAmount">طريقة الدفع</label>                                                   
                    </div>
                </form>
                <button style="margin-left:40%" type="submit" class="btn btn-primary btn-lg" form="payment_library"> دفع </button>
            </div>
        </div>
    </div>
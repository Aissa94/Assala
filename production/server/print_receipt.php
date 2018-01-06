<style type="text/css">
* {font-family: almohanad, "sakkalMajalla"}
table { vertical-align: middle; }
th    { vertical-align: middle; padding: 8px 0; }
td    { vertical-align: middle; padding: 8px 0;}
}
</style>
<?php 
    require "bdd_connect.php";
    $receipthistory = $connect->prepare('INSERT INTO `receipthistory`(`client`, `date`, `books`, `quantities`, `price`, `discount`, `type`) VALUES (?,?,?,?,?,?,?)');
    $receipthistory->execute(array($_POST['receiver'], date('Y/m/d'), serialize($_POST['title']), serialize($_POST['quantity']), $_POST['price'], $_POST['discount'], $_POST['type']));
?>
<page backcolor="#FFF" backimg="../../images/assala_bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" style="font-size: 12pt" backtop="10mm" backleft="8mm" backright="8mm" backbottom="25mm">
    <table cellspacing="0" style="width: 100%; text-align: center">
        <tr>
            <td style="width: 100%;">
                <img style="width: 50%;" src="../../images/assala_logo.png">
            </td>
        </tr>
    </table>
    <br><br>
    <table cellspacing="0" style="width: 100%; text-align: right;font-size: 18pt">
        <tr>
            <td style="width:50%;">التاريخ : <?php echo date('Y/m/d'); ?></td>
            <td style="width:50%;">إلى : <?php echo $_POST['receiver']; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: right;font-size: 22pt">
        <tr>
            <td style="width:20%;"></td>
            <td style="width:40%;"><b>وصل <?php echo $connect->lastInsertId().'/'.date('Y'); ?></b></td>
            <td style="width:20%;"></td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" border="1" style="width: 100%; background: #E7E7E7;  border: solid 1px black; border: solid 1px #000; text-align: center; font-size: 15pt;">
        <tr>
            <th style="width: 20%">القيمة</th>
            <th style="width: 10%">الكمية</th>
            <th style="width: 20%">السعر</th>
            <th style="width: 45%">العنوان</th>
            <th style="width: 5%"></th>
            
        </tr>
<?php
    $total = 0;
    $bookId = $_POST['title'];
    $quantities = $_POST['quantity'];
    for ($k=0; $k<count($bookId); $k++) {
        $book = $connect->query("SELECT * FROM bookstore WHERE bookId =".$bookId[$k]);
        while ($row = $book->fetch()) {
            $title = $row["title"];
            $price = $row["price"];
        }
        $book->closeCursor();
        if ($_POST['type'] == "sale") {
            $quantity = $connect->query('UPDATE `bookstore` SET `quantity`= `quantity` - '.$quantities[$k].' WHERE `bookId`='.$bookId[$k]);
        } else {
            $quantity = $connect->query('UPDATE `bookstore` SET `quantity`= `quantity` + '.$quantities[$k].' WHERE `bookId`='.$bookId[$k]);
        }
        switch($_POST['price']){
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
                $price = $price * (1 -$_POST['price']);
                break;
        }
        $prix = $price * $quantities[$k];
        $total += $prix;
?>
        <tr style="background: #fff;">
            <td style="width: 20%;"><?php echo number_format($prix, 2, ',', ''); ?> دج</td>
            <td style="width: 10%"><?php echo $quantities[$k] ?></td>
            <td style="width: 20%;"><?php echo number_format($price, 2, ',', ''); ?> دج</td>
            <td style="width: 45%;text-align: right;"><?php echo $title;?></td>
            <td style="width: 5%;"><?php echo $k+1; ?></td>       
        </tr>
<?php
    }
?>
    </table>
    <nobreak>
    <table cellspacing="0" border="1" style="width: 100%; background: #E7E7E7; text-align: right; font-size: 18pt;">
        <tr>
            <th style="width: 30%;"><?php echo number_format($total, 2, ',', ''); ?> دج</th>
            <th style="width: 20%;">المجموع : </th>
        </tr>
        <?php if ($_POST['discount'] > 0) { ?>
            <tr>
                <th style="width: 30%;"><?php echo number_format($_POST['discount'], 2, ',', ' '); ?> دج</th>
                <th style="width: 20%;">الخصم : </th>
            </tr>
            <tr>
                <th style="width: 30%;"><?php echo number_format(($total - $_POST['discount']), 2, ',', ''); ?> دج</th>
                <th style="width: 20%;">التكلفة : </th>
            </tr>
        <?php } ?>
    </table>
    <br>
    <br>
    <br>
    <br>
        <table cellspacing="0" style="width: 90%; text-align: right;font-size: 18pt">
            <tr>
                <td style="width:45%; ">المستلم</td>
                <td style="width:45%;">الإدارة</td>
            </tr>
        </table>
    </nobreak>
</page>
<?php 
    unset($connect);
?>
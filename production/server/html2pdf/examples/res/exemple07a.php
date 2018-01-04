<style type="text/css">
* {font-family: DejaVuSans, "sakkalMajalla"}
table { vertical-align: middle; }
th    { vertical-align: middle; padding: 10px 0; }
td    { vertical-align: middle; padding: 10px 0;}
}
</style>
<?php 
    require "../../bdd_connect.php";
    $num = rand(1, 100);
?>
<page backcolor="#FEFEFE" backimg="./res/assala_bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" style="font-size: 12pt" backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm">
    <bookmark title="Lettre" level="0" ></bookmark>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 25%;">
            </td>
            <td style="width: 50%; color: #444444; font-size:40px;">
                <img style="width: 100%;" src="./res/assala_logo.png" alt="Logo"><br><br>
            </td>
            <td style="width: 25%;">
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: right;font-size: 15pt">
        <tr>
            <td style="width:50%; ">التاريخ : <?php echo date('Y/m/d'); ?></td>
            <td style="width:50%;">إلى : <?php echo $_POST['receiver']; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: right;font-size: 15pt">
        <tr>
            <td style="width:20%;"></td>
            <td style="width:40%;"><b>وصل <?php echo $num.'/'.date('Y'); ?></b></td>
            <td style="width:20%;"></td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" border="1" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 15pt;">
        <tr>
            <th style="width: 20%">القيمة</th>
            <th style="width: 10%">الكمية</th>
            <th style="width: 20%">السعر</th>
            <th style="width: 40%">العنوان</th>
            <th style="width: 10%">الرقم</th>
            
        </tr>
    </table>
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
        switch($_POST['t_price']){
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
                $price = $price * (1 -$_POST['t_price']);
                break;
        }
        $book->closeCursor();
        $prix = $price* $quantities[$k];
        $total+= $prix;
?>
    <table cellspacing="0" border="1" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 15pt;">
        <tr>
            <td style="width: 20%;"><?php echo number_format($prix, 2, ',', ''); ?> دج</td>
            <td style="width: 10%"><?php echo $quantities[$k] ?></td>
            <td style="width: 20%;"><?php echo number_format($price, 2, ',', ''); ?> دج</td>
            <td style="width: 40%;text-align: right;"><?php echo $title;?></td>
            <td style="width: 10%;"><?php echo $k+1; ?></td>       
        </tr>
    </table>
<?php
    }
?>
    <table cellspacing="0" border="1" style="width: 50%;  background: #E7E7E7; text-align: right; font-size: 15pt;">
        <tr>
            <th style="width: 60%;"><?php echo number_format($total, 2, ',', ''); ?> دج</th>
            <th style="width: 40%;">المجموع : </th>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <nobreak>
        <table cellspacing="0" style="width: 90%; text-align: right;font-size: 12pt">
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
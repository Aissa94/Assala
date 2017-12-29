<style type="text/css">
* {font-family: DejaVu Sans, sans-serif;}
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
}
</style>
<?php 
    require "../../bdd_connect.php";
    $num = rand(1, 100);
    $book = $connect->query("SELECT * FROM librarystore WHERE libraryId =".$_GET['libraryId']);
    while ($row = $book->fetch()) {
?>
<page backcolor="#FEFEFE" backimg="./res/assala_bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" style="font-size: 12pt">
    <bookmark title="Lettre" level="0" ></bookmark>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 25%;">
            </td>
            <td style="width: 50%; color: #444444; font-size:40px;">
                <img style="width: 100%;" src="./res/assala_logo.png" alt="Logo"><br><br>
                وصل مبيعات
            </td>
            <td style="width: 25%;">
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 90%; text-align:right; font-size: 11pt;">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:36%; "><?php echo $row["name"]; ?></td>
            <td style="width:14%">المكتبة :</td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:36%; "><?php echo $row["adress"]; ?></td>
            <td style="width:14%">العنوان :</td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:36%; "><?php echo $row["email"]; ?></td>
            <td style="width:14%">البريد :</td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:36%; "><?php echo $row["phone"]; ?><br><?php echo $row["phone2"]; ?><br><?php echo $row["phone3"]; ?></td>
            <td style="width:14%">الهاتف :</td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:50%; ">في الجزائر، بتاريخ : <?php echo date('Y/m/d'); ?></td>
            <td style="width:50%;"></td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: right;direction=rtl;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:40%; "><b>: &laquo; شراء كتب &raquo;<u> وصل</u></b></td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:40%; ">رقم الوصل: <?php echo $num; ?> </td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: right;direction=rtl;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;"> .<b>&laquo;<?php echo $num; ?>&raquo;</b> هذه لائحة بجميع المبيعات المتعلقة بهذا الوصل<br></td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: right; font-size: 10pt;">
        <tr>
            <th style="width: 13%">السعر</th>
            <th style="width: 10%">سعر المكتبات</th>
            <th style="width: 13%">الكمية</th>
            <th style="width: 32%">المؤلف</th>
            <th style="width: 32%">العنوان</th>
            
        </tr>
    </table>
<?php
    $nb = rand(5, 11);
    $produits = array();
    $total = 0;
    for ($k=0; $k<5; $k++) {
        $num = rand(100000, 999999);
        $nom = "le produit n°".rand(1, 100);
        $qua = rand(1, 20);
        $prix = rand(100, 9999)/100.;
        $total+= $prix*$qua;
        $produits[] = array($num, $nom, $qua, $prix, rand(0, $qua));
?>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: right; font-size: 10pt;">
        <tr>
            <td style="width: 13%;"><?php echo number_format($prix, 2, ',', ' '); ?> دج</td>
            <td style="width: 10%"><?php echo number_format($prix/1.3, 2, ',', ' '); ?> دج</td>
            <td style="width: 13%;"><?php echo $qua; ?></td>
            <td style="width: 32%;"><?php echo $row["adress"];?></td>
            <td style="width: 32%;"><?php echo $row["name"]; ?></td>       
        </tr>
    </table>
<?php
    }
?>
    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <tr>
            <th style="width: 13%; text-align: right;"><?php echo number_format($total, 2, ',', ' '); ?> دج</th>
            <th style="width: 87%; text-align: right;">المجموع : </th>
        </tr>
    </table>
    <br>
    <nobreak>
        <table cellspacing="0" style="width: 100%; text-align: right;direction=rtl;font-size: 10pt">
            <tr>
                <td style="width:50%;"></td>
                <td style="width:50%;"> يرجى قبول، سيدتي، سيدي، عزيزي العميل، أطيب التحيات.<br></td>
            </tr>
        </table>
        
    </nobreak>
</page>
<?php 
    }
    $book->closeCursor();
    unset($connect);
?>
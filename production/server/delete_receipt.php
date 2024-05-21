<?php
      require "bdd_connect.php";

      $receipt = $connect->query("SELECT * FROM receipthistory where historyId=". $_POST['receiptId']);
      while ($print = $receipt->fetch()) {
            $bookId = $print['books'];
            $bookId = unserialize($bookId);
            $quantities = $print['quantities'];
            $quantities = unserialize($quantities);
            for ($k=0; $k<count($bookId); $k++) {
                if ($print['type'] == "sale") $quantity = $connect->query('UPDATE `bookstore` SET `quantity`= `quantity` + '.$quantities[$k].' WHERE `bookId`='.$bookId[$k]);
                else $quantity = $connect->query('UPDATE `bookstore` SET `quantity`= `quantity` - '.$quantities[$k].' WHERE `bookId`='.$bookId[$k]);
            }
      }


      $book = $connect->prepare('DELETE FROM `receipthistory` WHERE `historyId`=:historyId');
      $book->execute(array(
          ':historyId' => $_POST['receiptId']
      ));
      
      
      unset($connect);
      header("Location: " . $_SERVER["HTTP_REFERER"] . "&delete");
?>
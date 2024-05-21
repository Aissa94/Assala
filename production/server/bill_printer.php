<?php

session_start();
require "bdd_connect.php";

require "number2words.php";
   
include 'PHPExcel-1.8/Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel;
    $s = $objPHPExcel->getActiveSheet();
    $s->setTitle($_POST['receiver']);
    $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

    $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        ),
        'font'  => array(
            'size'  => 16,
            'name'  => 'sakkalMajalla'
        ) 
    );

    $objPHPExcel->getDefaultStyle()->applyFromArray($style);

      $s->setRightToLeft(true);
      $s->getPageMargins()->setTop(0.19);
      $s->getPageMargins()->setRight(0.35);
      $s->getPageMargins()->setLeft(0.3);
      $s->getPageMargins()->setBottom(0.1);
      $s->getRowDimension('2')->setRowHeight(56);
      $s->getRowDimension('3')->setRowHeight(56);
      $s->getRowDimension('5')->setRowHeight(30);
      $s->getRowDimension('6')->setRowHeight(30);
      $s->getRowDimension('7')->setRowHeight(30);
      $s->getRowDimension('8')->setRowHeight(30);
      $s->getRowDimension('9')->setRowHeight(30);
      $s->getRowDimension('10')->setRowHeight(30);
      $s->getRowDimension('11')->setRowHeight(30);
      $s->getRowDimension('12')->setRowHeight(27);

      $objDrawing = new PHPExcel_Worksheet_Drawing();
      $objDrawing->setPath('../images/assala_logo.jpg');
      $objDrawing->setWidth(993);
      $objDrawing->setCoordinates('B2');
      $objDrawing->setWorksheet($s);

      $s->getStyle("B3:E3")->applyFromArray(
        array(
            'borders' => array(
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '#000000')
                )
            )
        )
      );

      $s->setCellValueExplicit('B5', "SARL EL ASSALA EDITION");

      $s->getStyle("B5")->applyFromArray(
        array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK,
                    'color' => array('rgb' => '#000000')
                )
            )
        )
      );
      $s->getStyle('B5')->getFont()->setBold(true);
      
      $s->mergeCells('B6:B12');
      $s->setCellValue('B6', "RC: 16/00-0980957 B10\nN°FISC:     00 1016098095784\nRIB: 00600105303024709651\nNIS: 001016140025270\nEmail: assala@assala-dz.net\nCITE LES MANDARINIERS, LOT 161 LOC N 01 LES PINS MARITIMES - MOHAMMADIA.\nDom: BANQUE AL BARAKA D'ALGER, 25R.AHMED.HAMIDOUCHE 16200 EL HARRACH");
      $s->getStyle('B6')->getAlignment()->setWrapText(true);
      $s->getStyle("B6:B12")->applyFromArray(
        array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK,
                    'color' => array('rgb' => '#000000')
                )
            ),
            'font'  => array(
                'size'  => 14
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT
            )
        )
      );



      $s->mergeCells('D5:E12');
      $s->mergeCells('B14:B15');
      $s->mergeCells('C14:E15');

      $s->getStyle("D5:E12")->applyFromArray(
        array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THICK,
                    'color' => array('rgb' => '#000000')
                )
            ),
            'font'  => array(
                'size'  => 14
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT
            )
        )
      );

      $receipt = $connect->query("SELECT * FROM librarystore where name='". $_POST['receiver']. "'");
      while ($print = $receipt->fetch()) {
        $inf = "";
        $infos = $_POST['info'];
        foreach ($infos as $info){ 
            $inf .= "\n" . strtoupper($info) ." : " . $print[$info];
        }
        $s->setCellValue('D5', "الزبون : " . $_POST['receiver'] . "\nالعنوان : " . $print['adress'] . $inf);
        $s->getStyle('D5')->getAlignment()->setWrapText(true);
      }
      $receipt->closeCursor();


    $typeBill = ($_POST['type'] == "sale") ? "شكلية " : "";
    $s->setCellValueExplicit('B14', "فاتورة " . $typeBill . "رقم : " . "       " . '/' . date('Y'));
    $s->getStyle('B14')->getFont()->setBold(true);
    $s->setCellValueExplicit('C14', "التاريخ : " . date("d-m-Y"));
    $s->getStyle('C14')->getFont()->setBold(true);

      $s->getStyle('B18:E18')->applyFromArray(
          array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'd9d9d9')
            )
          )
      );
      $s->getStyle('B18:E18')->getFont()->setBold(true);
      $s->getStyle('E')->getFont()->setBold(true);

      $s->getRowDimension('18')->setRowHeight(25);
      $s->getColumnDimension('A')->setWidth(5);
      $s->getColumnDimension('B')->setWidth(47);
      $s->getColumnDimension('C')->setWidth(12);
      $s->getColumnDimension('D')->setWidth(8);
      $s->getColumnDimension('E')->setWidth(17);
      $s->setCellValueExplicit('B18', "التعيين");
      $s->setCellValueExplicit('C18', "سعر الوحدة");
      $s->setCellValueExplicit('D18', "الكمية");
      $s->setCellValueExplicit('E18', "القيمة الإجمالية");
    
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
        
        $s->getRowDimension(($k+19))->setRowHeight(25);

          $s->setCellValueExplicit('B'. ($k+19), $title);
          $s->setCellValueExplicit('C'. ($k+19), number_format($price, 2, ',', '') . "دج ");
          $s->setCellValueExplicit('D'. ($k+19), $quantities[$k]);
          $s->setCellValueExplicit('E'. ($k+19),number_format($prix, 2, ',', '') . "دج ");

    }

    $s->mergeCells('C'. ($k+20).':D'. ($k+20));
    $s->getRowDimension(($k+20))->setRowHeight(25);
    $s->setCellValueExplicit('E'. ($k+20), number_format($total, 2, ',', '') . "دج ");
    $s->setCellValueExplicit('C'. ($k+20),"المبلغ الإجمالي");
    $s->getStyle('C'. ($k+20))->getFont()->setBold(true);

    
        $discount = number_format(($total * 0.09), 2, ',', ' ');
        $cost = number_format($_POST['cost'], 2, ',', '');
        $cost_total = number_format($_POST['cost'], 2, '.', '');

        $s->getRowDimension(($k+21))->setRowHeight(25);
        $s->mergeCells('C'. ($k+21).':D'. ($k+21));
        $s->setCellValueExplicit('E'. ($k+21), $discount . "دج ");
        $s->setCellValueExplicit('C'. ($k+21),"الرسم على القيمة المضافة (9%)");
        $s->getStyle('C'. ($k+21))->getFont()->setBold(true);

        $s->getRowDimension(($k+22))->setRowHeight(25);
        $s->mergeCells('C'. ($k+22).':D'. ($k+22));
        $s->setCellValueExplicit('E'. ($k+22), $cost . "دج ");
        $s->setCellValueExplicit('C'. ($k+22),"القيمة الإجمالية (بالرسوم)");
        $s->getStyle('C'. ($k+22))->getFont()->setBold(true);

        $end = $k+22;
    
    $s->getStyle("B18:E" . ($k+18))->applyFromArray(
        array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array('rgb' => '#000000')
                )
            )
        )
    );

    $s->getStyle("C" . ($k+20) . ":E" . $end)->applyFromArray(
        array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                    'color' => array('rgb' => '#000000')
                )
            )
        )
    );

    $s->getStyle("C" . ($k+20) . ":C" . $end)->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => 'd9d9d9')
            )
        )
    );

    if ($_POST['type'] == "recovery") {
        $end = $k+25;
        $s->getRowDimension($end)->setRowHeight(30);
        $s->mergeCells('B' . $end . ':E' . $end);
        $s->getStyle('B' . $end . ':E' . $end)->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THICK,
                        'color' => array('rgb' => '#000000')
                    )
                )
            )
          );

        $s->setCellValueExplicit('B' . $end,"حددت الفاتورة بـ : " . numtoarb($cost_total) . " دينار جزائري");
    }
    $s->setCellValueExplicit('E'. ($end+3),"الإدارة");

    header('Content-Disposition: attachment;filename="'. $_POST['receiver'] . '_'. date('d-m-Y') .'.xlsx"');
    $writer->save('php://output');


?>

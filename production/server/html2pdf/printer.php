<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/../print_receipt.php');
    $content = ob_get_clean();
    //$css = '<style>'.file_get_contents(dirname(__FILE__).'/res/print2pdf.css').'</style>';
    // convert to PDF
    require_once(dirname(__FILE__).'/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true,  'UTF-8' ,  array(5, 5, 5, 5));
        //$html2pdf->addFont('font', '', dirname(__FILE__).'/../_tcpdf_5.0.002/fonts/font.php');
        //$html2pdf->setDefaultFont("font");
        $html2pdf->pdf->SetDisplayMode('fullpage');
//      $html2pdf->pdf->SetProtection(array('print'), 'spipu');
        $html2pdf->writeHTML($content);
        $html2pdf->Output(date('Y/m/d').'وصل_'.'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

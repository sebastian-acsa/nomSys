<?php
ob_start();
    //$_GET['id']=11;
    include(dirname(__FILE__).'/prueba.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once('./web/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'letter', 'es');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple01.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

    ?>
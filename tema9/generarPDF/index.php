<?php

require __DIR__ ."/../vendor/autoload.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = "<h1>Pdf generao con composer</h1>";

$dompdf -> loadHtml($html);

$dompdf -> render();

$dompdf->stream("documento.pdf", array("Attachment" => false));



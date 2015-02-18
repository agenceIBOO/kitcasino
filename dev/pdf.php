<?php

use mikehaertl\wkhtmlto\Pdf;

$pdf = new Pdf;
$pdf->addPage('<html>....</html>');
$pdf->addPage('http://google.com');

// Save the PDF
$pdf->saveAs('new.pdf');

// ... or send to client for inline display
$pdf->send();

// ... or send to client as file download
$pdf->send('test.pdf');
?>
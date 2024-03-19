<?php

// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

// Load HTML content 
$dompdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>'); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF to Browser 
$dompdf->stream("codexworld", array("Attachment" => 0));







// // Load content from html file 
// $html = file_get_contents("index.html"); 
// $dompdf->loadHtml($html); 
 
// // (Optional) Setup the paper size and orientation 
// $dompdf->setPaper('A4', 'landscape'); 
 
// // Render the HTML as PDF 
// $dompdf->render(); 

// // Save In Folder
// $output = $dompdf->output();
// file_put_contents('Brochure.pdf', $output);

// // Output the generated PDF (1 = download and 0 = preview) 
// $dompdf->stream("codexworld", array("Attachment" => 0));


?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (file_exists(FCPATH . 'vendor/autoload.php')) {
    require_once FCPATH . 'vendor/autoload.php';
}

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf {
    public function generate($html, $filename = 'Laporan', $paper = 'A4', $orientation = 'portrait') {
        $options = new Options();
        $options->set('isRemoteEnabled', true); 
        $options->set('defaultFont', 'Arial');
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => 1));
    }
}
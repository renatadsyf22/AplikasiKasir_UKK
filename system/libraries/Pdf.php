<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!class_exists('Dompdf\Dompdf')) {
    // Include the Dompdf class if it hasn't been included yet
    require_once APPPATH . 'libraries/dompdf/autoload.inc.php';
}

class Pdf extends Dompdf {

}

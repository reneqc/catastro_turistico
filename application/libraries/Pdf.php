<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/libreria_pdf/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Image(base_url('/assets/img/mejia3.png'),10,8,22);
            $this->SetFont('Arial','B',13);
            $this->Cell(50);
            $this->Cell(200,10,utf8_decode('GAD. MUNICIPAL DEL CANTÓN MEJÍA'),0,0,'C');
            $this->Ln('5');
            $this->SetFont('Arial','B',8);
            $this->Cell(50);
            $this->Cell(200,10,utf8_decode('CATASTRO TURÍSTICO'),0,0,'C');
            $this->Ln(20);
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class PDFController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $filePath = public_path("sample.pdf");
        $outputFilePath = public_path("sample_output.pdf");
        $this->fillPDFFile($filePath, $outputFilePath);
          
        return response()->file($outputFilePath);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fillPDFFile($file, $outputFilePath)
    {
        $fpdi = new FPDI;
          
        $count = $fpdi->setSourceFile($file);
  
        for ($i=1; $i<=$count; $i++) {
  
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
              
            $fpdi->SetFont("helvetica", "", 15);
            $fpdi->SetTextColor(153,0,153);
  
            $left = 10;
            $top = 10;
            $text = "itsolutionstuff.com";
            $fpdi->Text($left,$top,$text);
  
            $fpdi->Image("https://www.itsolutionstuff.com/assets/images/footer-logo.png", 40, 90);
        }
  
        return $fpdi->Output($outputFilePath, 'F');
    }
}

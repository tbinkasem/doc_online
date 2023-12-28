<html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
</head>
<body>
<?php
	require('fpdf.php');

	define('FPDF_FONTPATH','font/');

	class PDF extends FPDF
	{
		function Header(){
			$this->Image('veis3.png',85,0,40);
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','หน้าที่... '.$this->PageNo()),0,1,"R");
			$this->Ln(20);
		}

		function Footer(){
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',10);
			$this->SetY(-15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','By... ไทยครีเอทดอทคอม'),0,1,"L");
			$this->Cell(0,0,iconv( 'UTF-8','TIS-620','Create date : '.date("Y-m-d")),0,1,"R");
		}

	}

	$pdf=new PDF();
	$pdf->SetMargins( 5,10,5 );
	$pdf->AddPage();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);

	for( $i=0;$i<=50;$i++ ){
		$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620','ไทยครีเอทดอทคอม '. $i),0,1,"C");
	}

	$pdf->Output("MyPDF/MyPDF.pdf","F");
?>
	PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>
</html>

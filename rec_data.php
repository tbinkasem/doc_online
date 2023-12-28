<?php
  require('fpdf.php');
	define('FPDF_FONTPATH','font/');

  //รับข้อมูลจากไฟล์ req_data.php

  $idstd = $_POST["id"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $depname = $_POST["depname"];
	$day  = date("j");
	$mon = array(1=>"มกราคม",2=>"กุมภาพันธ์",3=>"มีนาคม",
													4=>"เมษายน",5=>"พฤษภาคม",6=>"มิถุนายน",
														7=>"กรกฎาคม",8=>"สิงหาคม",9=>"กันยายน",
																10=>"ตุลาคม",11=>"พฤศจิกายน",12=>"ธันวาคม"
	);
	$month = $mon[date("m")];
  $year = date("Y") + 543;
  $gennum = time();

  //สร้างหัวเอกสารและท้ายเอกสาร

  class PDF extends FPDF
  {
    function Header(){
			//Image('img_name.ext',locate_hori,locate_top,height_img)
      $this->Image('veis31.png',92,5,25);
      $this->AddFont('angsa','','angsa.php');
      $this->SetFont('angsa','',16);
      $this->Cell(0,0,iconv( 'UTF-8','TIS-620','เขียน วิทยาลัยการอาชีพปัตตานี'),0,1,"R");
      $this->Ln(30);
    }
      function Footer(){
      $this->AddFont('angsa','','angsa.php');
      $this->SetFont('angsa','',12);
      $this->SetY(-15);
      $this->Cell(0,10,iconv( 'UTF-8','TIS-620','---------- พัฒนาและออกแบบโดย....ธีระ  บินกาเซ็ม ----------'),0,1,"C");
    }
  }

	$pdf=new PDF();
  //$pdf->SetMargins(5,5,5);
	$pdf->AddPage();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',16);
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',"แบบคำร้องขออนุญาตแก้ มส."),0,1,"C");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',"วันที่ $day  เดือน $month  พ.ศ.$year"),0,1,"C");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',"                         "),0,1,"C");
	$pdf->Cell(0,15,iconv( 'UTF-8','TIS-620',"เรียน  ผู้อำนวยการวิทยาลัยการอาชีพปัตตานี"),0,1,"L");
  $pdf->Cell(0,7,iconv( 'UTF-8','TIS-620',"                   ข้าพเจ้า ชื่อ :  $fname        นามสกุล : $lname"),0,1,"L");
	$pdf->Cell(0,7,iconv( 'UTF-8','TIS-620',"รหัสประจำตัวนักศึกษา :  $idstd      สาขาวิชา :  $depname"),0,1,"L");
  //$pdf->Cell(0,7,iconv( 'UTF-8','TIS-620',"นามสกุล :  $lname"),0,1,"L");
  //$pdf->Cell(0,7,iconv( 'UTF-8','TIS-620',"สาขาวิชา :  $depname"),0,1,"L");
  $fgennum = "document_".$gennum.".pdf";
	$pdf->Output("printfile/".$fgennum,"F");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำร้องแก้ มส.</title>
  </head>
  <body>
    <p style="text-align: center">
      บันทึก/พิมพ์ใบคำร้องแก้ มส. 
      <a href="<?php echo "printfile/".$fgennum;?>" target="_blank">
        คลิกที่นี่
      </a>
    </p>
  </body>
</html>

<?php
require('fpdf.php');
include('referalsessions.php');

include('connection.php');

	


class PDF extends FPDF
{
	function Header()
	{	

			$this->DefOrientation='P';
			$this->wPt=$this->fhPt;
		$this->hPt=$this->fwPt;
		
		
		}
		function Footer()
		{
		$this->SetY(-15);
		$this->SetFont('Arial','I',B);
			$this->Cell(10);
	$this->cell(20,8,$this->_textstring('Date:'.date('d/m/Y')),0,0,C);
	$this->Cell(90);
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
		}
		


$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

	include('connection.php');
	
		$date1=$_POST['date1'];
	$date2=$_POST['date2'];


$sql3="select title,address1,address2 from title where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs3))
{      
 $title=strtoupper($myrowc[0]); 
  $address1=strtoupper($myrowc[1]); 
 $address2=strtoupper($myrowc[2]); 

	}
	







$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

		

 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',16);

 
$pdf->Ln(1);
$pdf->Cell(50);
$pdf->Cell(100,8,"$title",0,1,'C',1);

 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);
$pdf->Ln(1);
$pdf->Cell(50);
$pdf->Cell(100,8," THE LIST OF REFERALS",0,1,'C',1);






	$pdf->Ln(3);

	



	
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30);
$pdf->Cell(10,5,"S.no",1,0,'C',1);
$pdf->Cell(50,5,"Doctor Name",1,0,'C',1);
$pdf->Cell(50,5,"Test Name",1,0,'C',1);
$pdf->Cell(30,5,"Ref Amount",1,1,'C',1);

$q=1;
	
	
$sql6="Select refid,refdoctorid,reftestid,refamount from referals";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$refid=strtoupper($myrowc[0]);$doctor=strtoupper($myrowc[1]);$test=strtoupper($myrowc[2]);
$refamt=strtoupper($myrowc[3]);


$sql7="Select doctorname from doctor where id='$id' and did='$doctor'";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
 {
            
$refdoctor=strtoupper($myrowc[0]);
}


$sql8="Select testname from tests where id='$id' and sno='$test'";
$rs8=mysql_query($sql8) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs8))
 {
            
$reftest=strtoupper($myrowc[0]);
}



             
$pdf->SetFont('Arial','',8);
            
$pdf->Cell(30);
$pdf->Cell(10,6, $q, 1, 0, 'C',0);
$pdf->Cell(50,6, $refdoctor, 1, 0, 'L',0);
$pdf->Cell(50,6, $reftest, 1, 0, 'C',0);
$pdf->Cell(30,6, $refamt, 1, 1, 'C',0);

$q++;

}



   ob_clean(); 


    $pdf->Output();



?>


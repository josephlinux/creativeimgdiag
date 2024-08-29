<?php
require('fpdf.php');
include('adminsession.php');

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
	
	$mrd=$_POST['mrdnumber'];

$sql3="select title,address1,address2 from title where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs3))
{      
 $title=strtoupper($myrowc[0]); 
  $address1=strtoupper($myrowc[1]); 
 $address2=strtoupper($myrowc[2]); 

	}
	


  $time_now=mktime(date('h')+5,date('i')+30,date('s'));
 $date1=date('h:i:s A',$time_now);





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
$pdf->Cell(100,8,"TOTAL DOCTORS LIST",0,1,'C',1);






	$pdf->Ln(3);

	

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20);
$pdf->Cell(10,5,"S.no",1,0,'C',1);
$pdf->Cell(60,5,"Doctor Name",1,0,'C',1);
$pdf->Cell(50,5,"Hospital Name",1,0,'C',1);
$pdf->Cell(30,5,"Phone Number",1,1,'C',1);

$q=1;
	
	
$sql9="SELECT doctorname,hospital,phone,address from doctor where id='$id'";
$rs9=mysql_query($sql9) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs9))
{      
 $dname=strtoupper($myrowc[0]); $hospital=strtoupper($myrowc[1]);
 $phone=strtoupper($myrowc[2]); $address=strtoupper($myrowc[3]);


             
$pdf->SetFont('Arial','',6);
            
$pdf->Cell(20);
$pdf->Cell(10,6, $q, 1, 0, 'C',0);
$pdf->Cell(60,6,$dname, 1, 0, 'L',0);
$pdf->Cell(50,6, $hospital, 1, 0, 'L',0);
$pdf->Cell(30,6, $phone, 1, 1, 'C',0);

$q++;

}

   ob_clean(); 


    $pdf->Output();



?>


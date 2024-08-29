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
	
	$log=$_POST['log'];
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
$pdf->Cell(100,8,"$log USER LOGIN HISTORY LIST From $date1 to $date2",0,1,'C',1);






	$pdf->Ln(3);

	if($log !="ALL")
	{
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25);
$pdf->Cell(10,5,"S.no",1,0,'C',1);
$pdf->Cell(50,5,"Login Time",1,0,'C',1);
$pdf->Cell(30,5,"IP",1,0,'C',1);
$pdf->Cell(30,5,"Date",1,1,'C',1);

$q=1;
	$logg=strtolower($log);
	
$sql9="SELECT user,login,ip,date from userlog where id='$id' and date between '$date1' and '$date2' and user='$logg'";
$rs9=mysql_query($sql9) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs9))
{      
 $user=strtoupper($myrowc[0]); $login=($myrowc[1]);

 $ip=strtoupper($myrowc[2]); $date=($myrowc[3]);


             
$pdf->SetFont('Arial','',8);
            
$pdf->Cell(25);
$pdf->Cell(10,6, $q, 1, 0, 'C',0);
$pdf->Cell(50,6, $login, 1, 0, 'L',0);
$pdf->Cell(30,6, $ip, 1, 0, 'C',0);
$pdf->Cell(30,6, $date, 1, 1, 'C',0);

$q++;

}

}





	if($log=="ALL")
	{
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5);
$pdf->Cell(10,5,"S.no",1,0,'C',1);
$pdf->Cell(60,5,"User Name",1,0,'C',1);
$pdf->Cell(50,5,"Login Time",1,0,'C',1);
$pdf->Cell(30,5,"IP",1,0,'C',1);
$pdf->Cell(30,5,"Date",1,1,'C',1);

$q=1;
	
	
$sql9="SELECT user,login,ip,date from userlog where id='$id' and date between '$date1' and '$date2'";
$rs9=mysql_query($sql9) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs9))
{      
 $user=strtoupper($myrowc[0]); $login=($myrowc[1]);

 $ip=strtoupper($myrowc[2]); $date=($myrowc[3]);


             
$pdf->SetFont('Arial','',8);
            
$pdf->Cell(5);
$pdf->Cell(10,6, $q, 1, 0, 'C',0);
$pdf->Cell(60,6,$user, 1, 0, 'L',0);
$pdf->Cell(50,6, $login, 1, 0, 'L',0);
$pdf->Cell(30,6, $ip, 1, 0, 'C',0);
$pdf->Cell(30,6, $date, 1, 1, 'C',0);

$q++;

}

}















   ob_clean(); 


    $pdf->Output();



?>


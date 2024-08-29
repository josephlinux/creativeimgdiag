<?php
require('fpdf.php');


include('adminsession.php');

include('connection3.php');



$date=$_POST['date'];

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
		
		}
		}
		
include('connection3.php');


$date1=$_POST['date1'];
$date2=$_POST['date2'];


$d=0;
$sql="select title from title where id='$id'";
    
    $rs=mysql_query($sql);

    while($myrow=mysql_fetch_array($rs))
     {
   
        $title=strtoupper($myrow[0]); 

 		
      }

$d=0;

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',14);
    
  $pdf->Ln(1);
      $pdf->Cell(50);
      $pdf->Cell(100,5," $title",0,1,'L',1);
      $pdf->Ln(1);
      $pdf->Cell(75);
      $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(60,5," RETURNS REPORT ($date1 to $date2)",0,1,'C',1);



$i=0;
$ss=0;$kk=0;




$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',6);
  
   $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(15,5,"DATE",1,0,'C',1);
$pdf->Cell(25,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(40,5,"DOCTOR NAME",1,0,'C',1);
$pdf->Cell(36,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(15,5,"TOTAL",1,0,'C',1);
$pdf->Cell(15,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(15,5,"RAD.DIS",1,0,'C',1);

$pdf->Cell(15,5," NETAMOUNT",1,0,'C',1);
$pdf->Cell(20,5,"USER",1,1,'C',1);


$sql6="Select mrdnumber,name,refdoctor,testname,cost,discount,raddiscount,date,user from returns  where date between '$date1' and '$date2' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$date=strtoupper($myrowc[7]);$usr=strtoupper($myrowc[8]);


$i++;
$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(15,5, $date, 1, 0, 'C',0);

$pdf->SetFont('Arial','',6);

$pdf->Cell(25,5, $name, 1, 0, 'L',0);
$pdf->Cell(40,5, $doctor, 1, 0, 'L',0);
$pdf->Cell(36,5, $test, 1, 0, 'L',0);
$pdf->SetFont('Arial','',7);

$pdf->Cell(15,5, $cost, 1, 0, 'C',0);
$pdf->Cell(15,5, $discount, 1, 0, 'C',0);
$pdf->Cell(15,5, $raddis, 1, 0, 'C',0);

$net=$cost-($discount+$raddis);

$pdf->Cell(15,5, $net, 1, 0, 'C',0);
$pdf->Cell(20,5, $usr, 1, 1, 'C',0);

$tcost=$tcost+$cost;
$tdiscount=$discount+$tdiscount;
$tnet=$net+$tnet;
$trad=$raddis+$trad;

}
      $pdf->Cell(-5);

$pdf->Cell(124,5, "CUMULATIVE REPORT", 1, 0, 'C',0);
$pdf->SetFont('Arial','B',6);

$pdf->Cell(15,5, $tcost, 1, 0, 'C',0);
$pdf->Cell(15,5, $tdiscount, 1, 0, 'C',0);
$pdf->Cell(15,5, $trad, 1, 0, 'C',0);
$pdf->Cell(15,5, $tnet, 1, 1, 'C',0);


    $pdf->Output();




?>


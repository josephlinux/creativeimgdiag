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

$order=$_POST['order'];

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
      $pdf->Cell(45);
      $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(100,5," Category wise Cumulative Complete Reports ($date1 to $date2)",0,1,'L',1);



$i=0;
$ss=0;$kk=0;

if($type=="admin")
{


$pdf->SetFillColor(255, 255, 200);
$pdf->SetFont('Arial','B',8);
  

   $pdf->Ln(5);

$pdf->Ln(5);
      $pdf->Cell(5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(35,5,"CATEGORY",1,0,'C',1);
$pdf->Cell(20,5,"COUNT",1,0,'C',1);
$pdf->Cell(30,5,"GROSS AMOUNT",1,0,'C',1);
$pdf->Cell(30,5,"DISC+RAD DISC",1,0,'C',1);
$pdf->Cell(40,5,"REFERAL AMOUNT(- DISC)",1,0,'C',1);
$pdf->Cell(25,5,"NET AMOUNT",1,0,'C',1);


$sql3="Select category from category where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs3))
 {
            
 $categ=strtoupper($myrowc[0]);

$i=0;

$find=0;
$sql4="Select category from dataentry where date between '$date1' and '$date2' and category='$categ' and id='$id'";
$rs4=mysql_query($sql4) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs4))
 {
  
 $dname=strtoupper($myrowc[0]);
 $find++;
 }
 if($find>0)
 {
 

$i=0;

$sql6="Select cost,discount,raddiscount,refamount from dataentry where  category='$categ' and date between '$date1' and '$date2' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$cost=strtoupper($myrowc[0]);$disc=strtoupper($myrowc[1]);$raddisc=strtoupper($myrowc[2]);
$refamtt=strtoupper($myrowc[3]);

$refamt=$refamtt-$disc;
$dis=$disc+$raddisc;
$net=$cost-($refamt+$dis);

$tcost=$cost+$tcost;
$trefamt=$trefamt+$refamt;
$tdiscount=$dis+$tdiscount;
$tnet=$net+$tnet;
$i++;

}

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',7);
$s++;
$pdf->Ln(5);
$pdf->Cell(5);
$pdf->Cell(8,5,"$s",1,0,'C',1);
$pdf->Cell(35,5,"$categ",1,0,'C',1);
$pdf->Cell(20,5,"$i",1,0,'C',1);
$pdf->Cell(30,5,"$tcost",1,0,'C',1);
$pdf->Cell(30,5,"$tdiscount",1,0,'C',1);
$pdf->Cell(40,5,"$trefamt",1,0,'C',1);
$pdf->Cell(25,5,"$tnet",1,0,'C',1);

$ctcost=$ctcost+$tcost;
$ctrefamt=$ctrefamt+$trefamt;
$ctdiscount=$ctdiscount+$tdiscount;
$ctnet=$ctnet+$tnet;
$trefamt="";
$tdiscount="";
$tnet="";
$tcost="";


}
}



$pdf->SetFillColor(255, 255, 200);
$pdf->SetFont('Arial','B',8);
$pdf->Ln(5);
$pdf->Cell(5);
$pdf->Cell(63,5,"TOTAL REPORT",1,0,'C',1);
$pdf->Cell(30,5,"$ctcost",1,0,'C',1);
$pdf->Cell(30,5,"$ctdiscount",1,0,'C',1);
$pdf->Cell(40,5,"$ctrefamt",1,0,'C',1);
$pdf->Cell(25,5,"$ctnet",1,1,'C',1);
$s++;



    $pdf->Output();


}





















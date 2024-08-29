<?php
require('fpdf.php');
include('adminsession.php');
		
include('connection3.php');







class PDF extends FPDF
{
	function Header()
	{	

			

		
		

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
		
		
	
		
		
		
include('connection3.php');

$date1=$_POST['date1'];
$date2=$_POST['date2'];
$doctor=$_POST['searchid'];
$category=$_POST['category'];

$option=0;

$i=0;

$d=0;


$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

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
      $pdf->Cell(100,5," $title",0,1,'C',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);

if($category=="ALL")
{
    
      $pdf->Cell(50);
$pdf->Cell(100,5,"Doctors Payment Report form  $date1 to $date2 category $category",0,1,'C',1);
  $pdf->Ln(10);




      $pdf->Cell(3);
$pdf->Cell(10,5,"S.NO",1,0,'C',1);
$pdf->Cell(80,5,"DOCTOR NAME",1,0,'C',1);
$pdf->Cell(22,5,"No.Of CASES",1,0,'C',1);
$pdf->Cell(22,5,"REF AMOUNT",1,0,'L',1);
$pdf->Cell(22,5,"DISCOUNT",1,0,'L',1);
$pdf->Cell(22,5,"NET AMOUNT",1,1,'L',1);

 $d=1;
$sql3="Select did,doctorname from doctor where id='$id' order by doctorname ASC";
$rs3=mysql_query($sql3) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs3))
 {
      $did=strtoupper($myrowc[0]);
$doct=strtoupper($myrowc[1]);
 
 $find=0;

$sql4="Select did from dataentry where date between '$date1' and '$date2' and did='$did' and id='$id'";
$rs4=mysql_query($sql4) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs4))
 {
  
   $dname=strtoupper($myrowc[0]);
 $find++;
 }
 if($find>0)
 {
 
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  
  
      $pdf->Cell(3);
$pdf->Cell(10,5,"$d",1,0,'L',0);
$pdf->Cell(80,5,"$doct",1,0,'L',0);

$i=0;


$sql6="Select refamount,discount from dataentry where did='$did' and  date between '$date1' and '$date2' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$refamt=strtoupper($myrowc[0]);$discount=strtoupper($myrowc[1]);

$i++;

$trefamt=$refamt+$trefamt;
$tdiscount=$tdiscount+$discount;
}
$casetot=$casetot+$i;
$pdf->Cell(22,5,"$i",1,0,'C',1);

$pdf->Cell(22,5,"$trefamt",1,0,'C',1);
$pdf->Cell(22,5,"$tdiscount",1,0,'C',1);

$tnet=$trefamt-$tdiscount;

$pdf->Cell(22,5,"$tnet",1,1,'C',1);

$d++;
  $ttrefamt=$trefamt+$ttrefamt;
$ttdiscount=$ttdiscount+$tdiscount;
$ttnet=$ttrefamt-$ttdiscount;

$trefamt="";
$tdiscount="";


$pdf->SetFillColor(255, 255, 200);
$pdf->SetFont('Arial','B',9);

}


}


 
    $pdf->Cell(3);

$pdf->Cell(90,5,"TOTAL AMOUNT",1,0,'C',1);
$pdf->Cell(22,5,"$casetot",1,0,'C',1);
$pdf->Cell(22,5,"$ttrefamt",1,0,'C',1);
$pdf->Cell(22,5,"$ttdiscount",1,0,'C',1);
$pdf->Cell(22,5,"$ttnet",1,1,'C',1);


}












if($category !="ALL")
{
    
      $pdf->Cell(50);
$pdf->Cell(100,5,"Doctors Payment Report form  $date1 to $date2 Category $category ",0,1,'C',1);
  $pdf->Ln(10);




      $pdf->Cell(3);
$pdf->Cell(10,5,"S.NO",1,0,'C',1);
$pdf->Cell(80,5,"DOCTOR NAME",1,0,'C',1);
$pdf->Cell(22,5,"No.Of CASES",1,0,'C',1);
$pdf->Cell(22,5,"REF AMOUNT",1,0,'L',1);
$pdf->Cell(22,5,"DISCOUNT",1,0,'L',1);
$pdf->Cell(22,5,"NET AMOUNT",1,1,'L',1);

 $d=1;
$sql3="Select did,doctorname from doctor where id='$id' order by doctorname ASC";
$rs3=mysql_query($sql3) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs3))
 {
      $did=strtoupper($myrowc[0]);
$doct=strtoupper($myrowc[1]);
 
 $find=0;

$sql4="Select did from dataentry where date between '$date1' and '$date2' and did='$did' and category='$category' and id='$id'";
$rs4=mysql_query($sql4) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs4))
 {
  
   $dname=strtoupper($myrowc[0]);
 $find++;
 }
 if($find>0)
 {
 
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  
  
      $pdf->Cell(3);
$pdf->Cell(10,5,"$d",1,0,'L',0);
$pdf->Cell(80,5,"$doct",1,0,'L',0);

$i=0;


$sql6="Select refamount,discount from dataentry where did='$did' and  date between '$date1' and '$date2' and category='$category' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$refamt=strtoupper($myrowc[0]);$discount=strtoupper($myrowc[1]);

$i++;

$trefamt=$refamt+$trefamt;
$tdiscount=$tdiscount+$discount;
}
$casetot=$casetot+$i;
$pdf->Cell(22,5,"$i",1,0,'C',1);

$pdf->Cell(22,5,"$trefamt",1,0,'C',1);
$pdf->Cell(22,5,"$tdiscount",1,0,'C',1);

$tnet=$trefamt-$tdiscount;

$pdf->Cell(22,5,"$tnet",1,1,'C',1);

$d++;
  $ttrefamt=$trefamt+$ttrefamt;
$ttdiscount=$ttdiscount+$tdiscount;
$ttnet=$ttrefamt-$ttdiscount;

$trefamt="";
$tdiscount="";


$pdf->SetFillColor(255, 255, 200);
$pdf->SetFont('Arial','B',9);

}


}


 
    $pdf->Cell(3);

$pdf->Cell(90,5,"TOTAL AMOUNT",1,0,'C',1);
$pdf->Cell(22,5,"$casetot",1,0,'C',1);
$pdf->Cell(22,5,"$ttrefamt",1,0,'C',1);
$pdf->Cell(22,5,"$ttdiscount",1,0,'C',1);
$pdf->Cell(22,5,"$ttnet",1,1,'C',1);


}











    $pdf->Output();



?>















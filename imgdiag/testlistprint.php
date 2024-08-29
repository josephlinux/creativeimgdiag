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
$pdf->Cell(100,8,"TOTAL TESTS LIST",0,1,'C',1);




	$pdf->Ln(5);
	
	$pdf->SetFillColor(255, 220, 220);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(40);
$pdf->Cell(10,5,"S.NO",1,0,'C',1);

$pdf->Cell(50,5,"CATEGORIES",1,0,'C',1);
$pdf->Cell(50,5,"NUMBER OF TESTS",1,1,'C',1);

$s=1;
$sql5="Select category from category where id='$id'";
$rs5=mysql_query($sql5) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs5))
 {
        $categ=strtoupper($myrowc[0]);
$count=0;
$sql8="Select category from tests where id='$id' and category='$categ'";
$rs8=mysql_query($sql8) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs8))
 {
        $categ1=strtoupper($myrowc[0]);
        $count++;
}
  
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);
  $pdf->Cell(40); 
$pdf->Cell(10,5,"$s",1,0,'C',1);
$pdf->Cell(50,5,"$categ",1,0,'C',1);
$pdf->Cell(50,5,"$count",1,1,'C',1);

$s++;
}

	$pdf->Ln(3);

	
$sql6="Select category from category where id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs6))
 {
            
$cate=strtoupper($myrowc[0]);


$pdf->SetFillColor(255, 220, 220);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(30);
$pdf->Cell(120,5,"CATEGORY : $cate",1,1,'C',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30);
$pdf->Cell(10,5,"S.no",1,0,'C',1);
$pdf->Cell(90,5,"Test Name",1,0,'C',1);
$pdf->Cell(20,5,"Cost",1,1,'C',1);

$q=1;
	
	
$sql9="SELECT testname,cost from tests where category='$cate' and id='$id'";
$rs9=mysql_query($sql9) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs9))
{      
 $test=strtoupper($myrowc[0]); $cost=strtoupper($myrowc[1]);
          

             
$pdf->SetFont('Arial','',8);
            
$pdf->Cell(30);
$pdf->Cell(10,6, $q, 1, 0, 'C',0);
$pdf->Cell(90,6,$test, 1, 0, 'L',0);
$pdf->Cell(20,6, $cost, 1, 1, 'C',0);
$q++;
}
}

   ob_clean(); 


    $pdf->Output();



?>


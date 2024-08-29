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
$category=$_POST['category'];

$order=$_POST['order'];


$option=0;

$i=0;

$d=0;

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

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
$pdf->SetFont('Arial','B',9);
    
  $pdf->Ln(1);
      $pdf->Cell(50);
$pdf->Cell(100,5,"$category Category Tests Count Report from $date1 to $date2",0,1,'C',1);
  $pdf->Ln(1);


 if($category !="ALL")
 {

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  

   $pdf->Ln(2);

$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);

      $pdf->Cell(15);
$pdf->Cell(20,5,"S.No",1,0,'C',1);
$pdf->Cell(90,5,"TESTNAME",1,0,'C',1);
$pdf->Cell(20,5,"COUNT",1,0,'C',1);
$pdf->Cell(30,5,"TOTAL AMOUNT",1,1,'C',1);

$i=1;

$sql6="Select DISTINCT testname from dataentry where  category='$category' and date between '$date1' and '$date2' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs6))
 {
            
$test=strtoupper($myrowc[0]);

$count=0;
$tcst='';

$sql7="Select testname,cost from dataentry where category='$category' and date between '$date1' and '$date2' and testname='$test' and id='$id'";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
 {
$count++;
$cst=strtoupper($myrowc[1]);
$tcst=$tcst+$cst;

}



$sql8="Select cost from tests where testname='$test' and id='$id'";
$rs8=mysql_query($sql8) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs8))
 {
$tcost=strtoupper($myrowc[0]);
}

$totcost=$tcost*$count;

$pdf->SetFont('Arial','',7);
$pdf->Cell(15);
$pdf->Cell(20,5, $i++, 1, 0, 'C',0);
$pdf->Cell(90,5, $test, 1, 0, 'L',0);
$pdf->Cell(20,5, $count, 1, 0, 'C',0);
$pdf->Cell(30,5, $tcst, 1, 1, 'C',0);

$tcount=$tcount+$count;
$fcost=$tcst+$fcost;
}
$pdf->SetFillColor(255, 255, 220);
$pdf->SetFont('Arial','B',10);
  
 $pdf->Cell(15);
$pdf->Cell(160,5,"TOTAL TESTS COUNT  :$tcount ---TOTAL AMOUNT:$fcost",1,1,'C',1);



}





if($category =="ALL")
 {

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  

   $pdf->Ln(2);

$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);

      $pdf->Cell(15);
$pdf->Cell(20,5,"S.No",1,0,'C',1);
$pdf->Cell(90,5,"TESTNAME",1,0,'C',1);
$pdf->Cell(20,5,"COUNT",1,0,'C',1);
$pdf->Cell(30,5,"TOTAL AMOUNT",1,1,'C',1);

$i=1;


$sql="select category from category where id='$id'";
    
    $rs=mysql_query($sql);

    while($myrow=mysql_fetch_array($rs))
     {
   
        $category=strtoupper($myrow[0]);
        
    

$sql7="Select DISTINCT category from dataentry where category='$category' and date between '$date1' and '$date2'  and id='$id'";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
 {
 $pdf->SetFillColor(255, 200, 200);
$pdf->SetFont('Arial','B',8);
  $pdf->Cell(15);
$pdf->Cell(160,5,"CATEGORY: $category",1,1,'C',1);
}

$sql6="Select DISTINCT testname from dataentry where  category='$category' and date between '$date1' and '$date2' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs6))
 {
            
$test=strtoupper($myrowc[0]);

$count=0;
$tcst='';

$sql7="Select testname,cost from dataentry where category='$category' and date between '$date1' and '$date2' and testname='$test' and id='$id'";
$rs7=mysql_query($sql7) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs7))
 {
$count++;
$cst=strtoupper($myrowc[1]);
$tcst=$tcst+$cst;

}



$sql8="Select cost from tests where testname='$test' and id='$id'";
$rs8=mysql_query($sql8) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs8))
 {
$tcost=strtoupper($myrowc[0]);
}

$totcost=$tcost*$count;

$pdf->SetFont('Arial','',7);
$pdf->Cell(15);
$pdf->Cell(20,5, $i++, 1, 0, 'C',0);
$pdf->Cell(90,5, $test, 1, 0, 'L',0);
$pdf->Cell(20,5, $count, 1, 0, 'C',0);
$pdf->Cell(30,5, $tcst, 1, 1, 'C',0);

$tcount=$tcount+$count;
$fcost=$tcst+$fcost;
}

}
$pdf->SetFillColor(255, 255, 220);
$pdf->SetFont('Arial','B',10);
  
 $pdf->Cell(15);
$pdf->Cell(160,5,"TOTAL TESTS COUNT  :$tcount ---TOTAL AMOUNT:$fcost",1,1,'C',1);



}









    $pdf->Output();



?>















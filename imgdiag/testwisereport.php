<?php
require('fpdf.php');
include('adminsession.php');
		
include('connection3.php');






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
		
include('connection3.php');



$date1=$_POST['date1'];
$date2=$_POST['date2'];
$test=$_POST['searchid'];
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
      $pdf->Cell(100,5," $title",0,1,'L',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
    
  $pdf->Ln(1);
      $pdf->Cell(50);
$pdf->Cell(100,5,"$category Category -$test Test Report from $date1 to $date2",0,1,'C',1);
  $pdf->Ln(1);






if($test=="ALL" && $category =="ALL")
{

$option++;
$sql3="Select category from category where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs3))
 {
  
 $categ=strtoupper($myrowc[0]);
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
 
 

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  
  
  $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(100,5," $categ Wise Report($date1 to $date2)",0,1,'L',1);


 
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  

   $pdf->Ln(9);

$pdf->Ln(-5);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(18,5,"MRD No.",1,0,'C',1);
$pdf->Cell(20,5,"DATE",1,0,'C',1);
$pdf->Cell(30,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(30,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(40,5,"REF.DOCTOR",1,0,'C',1);
$pdf->Cell(15,5,"COST",1,0,'C',1);
$pdf->Cell(20,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(18,5," NETAMOUNT",1,1,'C',1);



$i=0;


$sql6="Select date,name,testname,cost,discount,refdoctor,mrdnumber,raddiscount from dataentry where  category='$categ' and date between '$date1' and '$date2' and id='$id' ORDER BY $order ASC";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$date=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$test=strtoupper($myrowc[2]);
$refamt=strtoupper($myrowc[3]);$discount=strtoupper($myrowc[4]);$refdoctor=strtoupper($myrowc[5]);$mrdnumber=strtoupper($myrowc[6]);
$raddiscount=strtoupper($myrowc[7]);
$i++;


$pdf->SetFont('Arial','',6);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(18,5, $mrdnumber, 1, 0, 'C',0);
$pdf->Cell(20,5, $date, 1, 0, 'C',0);
$pdf->Cell(30,5, $name, 1, 0, 'C',0);
$pdf->SetFont('Arial','',5);

$pdf->Cell(30,5, $test, 1, 0, 'L',0);

$pdf->Cell(40,5, $refdoctor, 1, 0, 'L',0);
$pdf->SetFont('Arial','',6);

$pdf->Cell(15,5, $refamt, 1, 0, 'C',0);
$pdf->Cell(20,5, $discount+$raddiscount, 1, 0, 'C',0);

$dis=$discount+$raddiscount;
$net=$refamt-$dis;

$pdf->Cell(18,5, $net, 1, 1, 'C',0);

$trefamt=$trefamt+$refamt;
$tdiscount=$dis+$tdiscount;
$tnet=$net+$tnet;
}

$d++;

$pdf->Ln(1);
$pdf->setFont('Arial','I',9);
if($d==1)
{
$pdf->Cell(10);
}
if($d !=1)
{
$pdf->Cell(-10);
}

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 135;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Amount Report  :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 18;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $trefamt, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 18;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tnet, 0, Alignment.LEFT, true);

$ctrefamt=$ctrefamt+$trefamt;
$ctdiscount=$ctdiscount+$tdiscount;
$ctnet=$ctnet+$tnet;
$trefamt="";
$tdiscount="";
$tnet="";


}
}



$pdf->Ln(2);
$pdf->setFont('Arial','I',9);
$pdf->Cell(1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 125;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "cumulative Report $date1 to $date2 :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctrefamt, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 18;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctnet, 0, Alignment.LEFT, true);
}















if($category !='' && $category !="ALL" && $test =="ALL" && $test !='' && $option =="0")
{
$option++;


$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  
  
  $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(100,5," $category Wise Report ($date1 to $date2)",0,1,'L',1);


 
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  

   $pdf->Ln(9);

$pdf->Ln(-5);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(18,5,"MRD No.",1,0,'C',1);
$pdf->Cell(20,5,"DATE",1,0,'C',1);
$pdf->Cell(30,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(30,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(40,5,"REF.DOCTOR",1,0,'C',1);
$pdf->Cell(15,5,"COST",1,0,'C',1);
$pdf->Cell(20,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(18,5," NETAMOUNT",1,1,'C',1);

$i=0;

$sql6="Select date,name,testname,cost,discount,refdoctor,mrdnumber,raddiscount from dataentry where  category='$category' and date between '$date1' and '$date2' and id='$id' ORDER BY $order ASC";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$date=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$test=strtoupper($myrowc[2]);
$refamt=strtoupper($myrowc[3]);$discount=strtoupper($myrowc[4]);$refdoctor=strtoupper($myrowc[5]);$mrdnumber=strtoupper($myrowc[6]);
$raddiscount=strtoupper($myrowc[7]);
$i++;



$pdf->SetFont('Arial','',6);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(18,5, $mrdnumber, 1, 0, 'C',0);
$pdf->Cell(20,5, $date, 1, 0, 'C',0);
$pdf->Cell(30,5, $name, 1, 0, 'C',0);
$pdf->Cell(30,5, $test, 1, 0, 'L',0);
$pdf->SetFont('Arial','',5);

$pdf->Cell(40,5, $refdoctor, 1, 0, 'L',0);
$pdf->SetFont('Arial','',6);

$pdf->Cell(15,5, $refamt, 1, 0, 'C',0);
$pdf->Cell(20,5, $discount+$raddiscount, 1, 0, 'C',0);


$dis=$discount+$raddiscount;
$net=$refamt-$dis;

$pdf->Cell(18,5, $net, 1, 1, 'C',0);

$trefamt=$trefamt+$refamt;
$tdiscount=$dis+$tdiscount;
$tnet=$net+$tnet;
}

$d++;

$pdf->Ln(1);
$pdf->setFont('Arial','I',9);
if($d==1)
{
$pdf->Cell(10);
}
if($d !=1)
{
$pdf->Cell(-10);
}

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 135;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Amount Report  :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 18;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $trefamt, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 18;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tnet, 0, Alignment.LEFT, true);

$ctrefamt=$ctrefamt+$trefamt;
$ctdiscount=$ctdiscount+$tdiscount;
$ctnet=$ctnet+$tnet;
$trefamt="";
$tdiscount="";
$tnet="";

}




















if($category !='' && $category !="ALL" && $test !='' && $test!="ALL" && $option =="0")
{
$option++;



$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  
  
  $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(100,5," $category - $test Wise Report($date1 to $date2)",0,1,'L',1);


 
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  

   $pdf->Ln(9);

$pdf->Ln(-5);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(18,5,"MRD No.",1,0,'C',1);
$pdf->Cell(20,5,"DATE",1,0,'C',1);
$pdf->Cell(30,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(30,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(40,5,"REF.DOCTOR",1,0,'C',1);
$pdf->Cell(15,5,"COST",1,0,'C',1);
$pdf->Cell(20,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(18,5," NETAMOUNT",1,1,'C',1);


$i=0;

$sql6="Select date,name,cost,discount,refdoctor,mrdnumber,raddiscount from dataentry where  category='$category' and date between '$date1' and '$date2' and testname='$test' and id='$id' ORDER BY $order ASC";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$date=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);
$refamt=strtoupper($myrowc[2]);$discount=strtoupper($myrowc[3]);$refdoctor=strtoupper($myrowc[4]);$mrdnumber=strtoupper($myrowc[5]);
$raddiscount=strtoupper($myrowc[6]);
$i++;


$pdf->SetFont('Arial','',6);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(18,5, $mrdnumber, 1, 0, 'C',0);
$pdf->Cell(20,5, $date, 1, 0, 'C',0);
$pdf->Cell(30,5, $name, 1, 0, 'C',0);
$pdf->Cell(30,5, $test, 1, 0, 'L',0);
$pdf->SetFont('Arial','',5);

$pdf->Cell(40,5, $refdoctor, 1, 0, 'L',0);
$pdf->SetFont('Arial','',6);

$pdf->Cell(15,5, $refamt, 1, 0, 'C',0);
$pdf->Cell(20,5, $discount+$raddiscount, 1, 0, 'C',0);

$dis=$discount+$raddiscount;

$net=$refamt-$dis;

$pdf->Cell(18,5, $net, 1, 1, 'C',0);

$trefamt=$trefamt+$refamt;
$tdiscount=$dis+$tdiscount;
$tnet=$net+$tnet;
}


$d++;

$pdf->Ln(1);
$pdf->setFont('Arial','I',9);
if($d==1)
{
$pdf->Cell(10);
}
if($d !=1)
{
$pdf->Cell(-10);
}

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 135;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Amount Report  :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 18;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $trefamt, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 18;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tnet, 0, Alignment.LEFT, true);

$ctrefamt=$ctrefamt+$trefamt;
$ctdiscount=$ctdiscount+$tdiscount;
$ctnet=$ctnet+$tnet;
$trefamt="";
$tdiscount="";
$tnet="";

}


 
 

    $pdf->Output();



?>















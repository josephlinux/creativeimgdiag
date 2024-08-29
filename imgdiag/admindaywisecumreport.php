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

$usr=$_POST['usr'];

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
      $pdf->Cell(35);
      $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(100,5," USER ($usr) BETWEEN DAYS TRANSACTIONS REPORT ($date1 to $date2)",0,1,'L',1);



$i=0;
$ss=0;$kk=0;

if($usr=="ALL")
{

$sql3="Select category from category where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs3))
 {
            
 $cate=strtoupper($myrowc[0]);

$i=0;

$find=0;
$sql6="Select category from dataentry where date between '$date1' and '$date2' and category='$cate' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
  $cname=strtoupper($myrowc[0]);
  $find++;
  }  
  
if($find>0)
{  



$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
  
  
  $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(100,5," CATEGORY : $cname",0,1,'L',1);

   $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(32,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(38,5,"DOCTOR NAME",1,0,'C',1);
$pdf->Cell(12,5,"DATE",1,0,'C',1);

$pdf->Cell(42,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(17,5,"TOTAL",1,0,'C',1);
$pdf->Cell(17,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(17,5,"RAD.DIS",1,0,'C',1);

$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);


$sql6="Select mrdnumber,name,refdoctor,testname,cost,discount,raddiscount,date from dataentry where date between '$date1' and '$date2' and category='$cate' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$dt=strtoupper($myrowc[7]);


$i++;
$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(32,5, $name, 1, 0, 'L',0);
$pdf->SetFont('Arial','',6);
$pdf->Cell(38,5, $doctor, 1, 0, 'L',0);
$pdf->Cell(12,5, $dt, 1, 0, 'L',0);

$pdf->Cell(42,5, $test, 1, 0, 'C',0);
$pdf->SetFont('Arial','',9.5);
$pdf->Cell(17,5, $cost, 1, 0, 'C',0);
$pdf->Cell(17,5, $discount, 1, 0, 'C',0);
$pdf->Cell(17,5, $raddis, 1, 0, 'C',0);

$net=$cost-($discount+$raddis);

$pdf->Cell(22,5, $net, 1, 1, 'C',0);

$tcost=$tcost+$cost;
$tdiscount=$discount+$tdiscount;
$tnet=$net+$tnet;
$trad=$raddis+$trad;
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
$pdf->SetFont('Arial','B',10);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 120;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Amount Report ($date1 to $date2) :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 18;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tcost, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 16;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tdiscount, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $trad, 0, Alignment.LEFT, true);




$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tnet, 0, Alignment.LEFT, true);


$ctcost=$ctcost+$tcost;
$ctdiscount=$ctdiscount+$tdiscount;
$ctrad=$trad+$ctrad;
$ctnet=$ctnet+$tnet;
$tcost="";
$tdiscount="";
$tnet="";
$trad="";
}
}







$pdf->Ln(1);
$pdf->setFont('Arial','I',10);
$pdf->Cell(10);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 100;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Cumulative Report ($date1 to $date2) :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctcost, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctdiscount, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctrad, 0, Alignment.LEFT, true);


$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctnet, 0, Alignment.LEFT, true);



    $pdf->Output();





    $pdf->Output();

}




















if($usr != "ALL")
{

$usrr=strtolower($usr);

$sql3="Select category from category where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs3))
 {
            
 $cate=strtoupper($myrowc[0]);

$i=0;

$find=0;
$sql6="Select category from dataentry where date between '$date1' and '$date2' and category='$cate' and user='$usrr' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
  $cname=strtoupper($myrowc[0]);
  $find++;
  }  
  
if($find>0)
{  



$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
  
  
  $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(100,5," CATEGORY : $cname",0,1,'L',1);

   $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(32,5,"PATIENT NAME",1,0,'C',1);

$pdf->Cell(38,5,"DOCTOR NAME",1,0,'C',1);
$pdf->Cell(12,5,"DATE",1,0,'C',1);

$pdf->Cell(42,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(17,5,"TOTAL",1,0,'C',1);
$pdf->Cell(17,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(17,5,"RAD.DIS",1,0,'C',1);

$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);


$sql6="Select mrdnumber,name,refdoctor,testname,cost,discount,raddiscount,date from dataentry where date between '$date1' and '$date2' and category='$cate' and user='$usrr' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$dt=strtoupper($myrowc[7]);

$i++;
$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(32,5, $name, 1, 0, 'L',0);
$pdf->SetFont('Arial','',6);
$pdf->Cell(38,5, $doctor, 1, 0, 'L',0);
$pdf->Cell(12,5, $dt, 1, 0, 'L',0);

$pdf->Cell(42,5, $test, 1, 0, 'C',0);
$pdf->Cell(17,5, $cost, 1, 0, 'C',0);
$pdf->Cell(17,5, $discount, 1, 0, 'C',0);
$pdf->Cell(17,5, $raddis, 1, 0, 'C',0);

$net=$cost-($discount+$raddis);

$pdf->Cell(22,5, $net, 1, 1, 'C',0);

$tcost=$tcost+$cost;
$tdiscount=$discount+$tdiscount;
$tnet=$net+$tnet;
$trad=$raddis+$trad;
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
$cell_width = 120;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Amount Report ($date) :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 18;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tcost, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 16;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tdiscount, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $trad, 0, Alignment.LEFT, true);




$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tnet, 0, Alignment.LEFT, true);


$ctcost=$ctcost+$tcost;
$ctdiscount=$ctdiscount+$tdiscount;
$ctrad=$trad+$ctrad;
$ctnet=$ctnet+$tnet;
$tcost="";
$tdiscount="";
$tnet="";
$trad="";
}
}







$pdf->Ln(1);
$pdf->setFont('Arial','I',9);
$pdf->Cell(10);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 100;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Daywise Cumulative Report ($date) :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctcost, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctdiscount, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 15;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctrad, 0, Alignment.LEFT, true);


$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctnet, 0, Alignment.LEFT, true);



    $pdf->Output();





    $pdf->Output();

}





?>


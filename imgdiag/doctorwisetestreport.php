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
      $pdf->Cell(55);
$pdf->Cell(100,5,"Doctor $doctor -$category Category Report from $date1 to $date2",0,1,'C',1);
  $pdf->Ln(1);





if($doctor=="ALL" && $category =="ALL")
{
$option++;
 
$sql3="Select did,doctorname from doctor where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs3))
 {
   $did=strtoupper($myrowc[0]);$doct=strtoupper($myrowc[1]);

 
 $find=0;
$sql4="Select did from dataentry where date between '$date1' and '$date2' and did='$did' and  id='$id'";
$rs4=mysql_query($sql4) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs4))
 {
  
   $dname=strtoupper($myrowc[0]);
 $find++;
 }
 if($find>0)
 {
 
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
  
  
  $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(100,5," Doctor $doct Report ($date1 to $date2)",0,1,'L',1);


 
$sql5="Select category from category where  id='$id'";
$rs5=mysql_query($sql5) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs5))
 {
            
 $cate=strtoupper($myrowc[0]);
 
 $findd=0;


 
 
 $sql6="Select category from dataentry where date between '$date1' and '$date2' and category='$cate' and did='$did' and  id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs6))
 {
 $cname=strtoupper($myrowc[0]);
 $findd++;
 }

 if($findd>0)
 {

$pdf->Ln(1);
      $pdf->Cell(1);
$pdf->Cell(100,5," Category :$cate",0,1,'L',1);


 
$pdf->Ln(1);
      $pdf->Cell(1);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(20,5,"DATE",1,0,'C',1);
$pdf->Cell(30,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(50,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(20,5,"TEST COST",1,0,'C',1);
$pdf->Cell(20,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);

$i=0;


$sql6="Select date,name,testname,refamount,discount,cost,raddiscount from dataentry where did='$did' and category='$cate' and date between '$date1' and '$date2' and  id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$date=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$test=strtoupper($myrowc[2]);
$refamt=strtoupper($myrowc[3]);$discount=strtoupper($myrowc[4]);$cost=strtoupper($myrowc[5]);$rdiscount=strtoupper($myrowc[6]);

$i++;

$pdf->SetFont('Arial','',7);
            
$pdf->Cell(1);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(20,5, $date, 1, 0, 'C',0);
$pdf->Cell(30,5, $name, 1, 0, 'C',0);
$pdf->Cell(50,5, $test, 1, 0, 'C',0);
$pdf->Cell(20,5, $cost, 1, 0, 'C',0);
$pdf->Cell(20,5, $discount+$rdiscount, 1, 0, 'C',0);


$dis=$discount+$rdiscount;


$net=$cost-$dis;

$pdf->Cell(22,5, $net, 1, 1, 'C',0);

$tcost=$tcost+$cost;
$trefamt=$trefamt+$refamt;
$tdiscount=$tdiscount+$dis;
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
$cell_width = 105;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Amount Report  :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tcost, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tnet, 0, Alignment.LEFT, true);

$ctrefamt=$ctrefamt+$trefamt;
$ctdiscount=$ctdiscount+$tdiscount;
$ctnet=$ctnet+$tnet;
$ctcost=$ctcost+$tcost;

$trefamt="";
$tdiscount="";
$tnet="";
$tcost="";
$ded="";
}
}

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 95;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Cumulative Amount Report  :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctcost, 0, Alignment.LEFT, true);




$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $ctnet, 0, Alignment.LEFT, true);


$cctrefamt=$cctrefamt+$ctrefamt;
$cctdiscount=$cctdiscount+$ctdiscount;
$cctnet=$cctnet+$ctnet;
$cctcost=$cctcost+$ctcost;


$ctrefamt="";
$ctdiscount="";
$ctnet="";
$ctcost="";
$pdf->AddPage();

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
$cell_width = 93;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "cumulative Report $date1 to $date2 :", 0, Alignment.LEFT, true);


$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $cctcost, 0, Alignment.LEFT, true);




$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $cctdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $cctnet, 0, Alignment.LEFT, true);


}














if($doctor=="ALL" && $category !='' && category !="ALL" && $option =="0")
{
$option++;


$sql3="Select did,doctorname from doctor where  id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs3))
 {
  
  $did=strtoupper($myrowc[0]);
$doct=strtoupper($myrowc[1]);

 $find=0;
 
$sql4="Select did from dataentry where date between '$date1' and '$date2' and did='$did' and  id='$id'";
$rs4=mysql_query($sql4) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs4))
 {
  
 $dname=strtoupper($myrowc[0]);
 $find++;
 }
  $findd=0;
 
 $sql6="Select category from dataentry where date between '$date1' and '$date2' and category='$category' and did='$did' and  id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs6))
 {
 $cname=strtoupper($myrowc[0]);
 $findd++;
 }

 
 if($find>0 && $findd >0)
 {

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
  
$pdf->Ln(1);
      $pdf->Cell(1);
$pdf->Cell(10,5," $doct $category Wise Report($date1 to $date2)",0,1,'L',1);


$pdf->Ln(1);
   $pdf->Cell(1);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(20,5,"DATE",1,0,'C',1);
$pdf->Cell(30,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(50,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(20,5,"TEST COST",1,0,'C',1);
$pdf->Cell(20,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);



$sql6="Select date,name,testname,refamount,discount,cost,raddiscount from dataentry where did='$did' and category='$category' and date between '$date1' and '$date2' and  id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$date=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$test=strtoupper($myrowc[2]);
$refamt=strtoupper($myrowc[3]);$discount=strtoupper($myrowc[4]);$cost=strtoupper($myrowc[5]);
$raddiscount=strtoupper($myrowc[6]);


$i++;


$pdf->SetFont('Arial','',7);
            
$pdf->Cell(1);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(20,5, $date, 1, 0, 'C',0);
$pdf->Cell(30,5, $name, 1, 0, 'C',0);
$pdf->Cell(50,5, $test, 1, 0, 'C',0);
$pdf->Cell(20,5, $cost, 1, 0, 'C',0);
$pdf->Cell(20,5, $discount+$raddiscount, 1, 0, 'C',0);


$dis=$discount+$raddiscount;


$net=$cost-$dis;

$pdf->Cell(22,5, $net, 1, 1, 'C',0);

$trefamt=$trefamt+$refamt;
$tdiscount=$dis+$tdiscount;
$tnet=$net+$tnet;
$tcost=$tcost+$cost;
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
$cell_width = 105;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Amount Report  :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tcost, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tnet, 0, Alignment.LEFT, true);

$ctrefamt=$ctrefamt+$trefamt;
$ctdiscount=$ctdiscount+$tdiscount;
$ctnet=$ctnet+$tnet;
$ctcost=$ctcost+$tcost;
$trefamt="";
$tdiscount="";
$tnet="";
$tcost="";




}
}
$cctdiscount=$cctdiscount+$ctdiscount;
$cctnet=$cctnet+$ctnet;
$cctcost=$cctcost+$ctcost;

$pdf->Ln(2);
$pdf->setFont('Arial','I',9);
$pdf->Cell(1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 93;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "cumulative Report $date1 to $date2 :", 0, Alignment.LEFT, true);


$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $cctcost, 0, Alignment.LEFT, true);




$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $cctdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $cctnet, 0, Alignment.LEFT, true);


}
























if($doctor !='' && $category =="ALL" && $doctor !="ALL" && $option =="0")
{
$option++;




$sql3="Select category from category where  id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs3))
 {
  
 $cate=strtoupper($myrowc[0]);


$sql4="Select did from doctor where doctorname='$doctor' and  id='$id'";
$rs4=mysql_query($sql4) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs4))
 {
  
  $did=strtoupper($myrowc[0]);
}

  $findd=0;
 
 $sql6="Select category from dataentry where date between '$date1' and '$date2' and category='$cate' and did='$did' and  id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs6))
 {
 $cname=strtoupper($myrowc[0]);
 $findd++;
 }


 if($findd >0)
 {
 
 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
  
$pdf->Ln(1);
      $pdf->Cell(1);
$pdf->Cell(10,5," $doct $cate Wise Report($date1 to $date2)",0,1,'L',1);


$pdf->Ln(1);
   $pdf->Cell(1);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(20,5,"DATE",1,0,'C',1);
$pdf->Cell(30,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(50,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(20,5,"TEST COST",1,0,'C',1);
$pdf->Cell(20,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);

 
 $sql6="Select date,name,testname,refamount,discount,cost,raddiscount from dataentry where did='$did' and category='$cate' and date between '$date1' and '$date2' and  id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$date=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$test=strtoupper($myrowc[2]);
$refamt=strtoupper($myrowc[3]);$discount=strtoupper($myrowc[4]);$cost=strtoupper($myrowc[5]);
$raddiscount=strtoupper($myrowc[6]);



$i++;


$pdf->SetFont('Arial','',7);
            
$pdf->Cell(1);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(20,5, $date, 1, 0, 'C',0);
$pdf->Cell(30,5, $name, 1, 0, 'C',0);
$pdf->Cell(50,5, $test, 1, 0, 'C',0);
$pdf->Cell(20,5, $cost, 1, 0, 'C',0);
$pdf->Cell(20,5, $discount+$raddiscount, 1, 0, 'C',0);

$dis=$discount+$raddiscount;

$net=$cost-$dis;

$pdf->Cell(22,5, $net, 1, 1, 'C',0);

$trefamt=$trefamt+$refamt;
$tdiscount=$dis+$tdiscount;
$tnet=$net+$tnet;
$tcost=$tcost+$cost;
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
$cell_width = 105;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Amount Report  :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tcost, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tnet, 0, Alignment.LEFT, true);

$ctrefamt=$ctrefamt+$trefamt;
$ctdiscount=$ctdiscount+$tdiscount;
$ctnet=$ctnet+$tnet;
$ctcost=$ctcost+$tcost;
$trefamt="";
$tdiscount="";
$tnet="";
$tcost="";

}
}
$cctdiscount=$cctdiscount+$ctdiscount;
$cctnet=$cctnet+$ctnet;
$cctcost=$cctcost+$ctcost;

$pdf->Ln(2);
$pdf->setFont('Arial','I',9);
$pdf->Cell(1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 93;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "cumulative Report $date1 to $date2 :", 0, Alignment.LEFT, true);


$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $cctcost, 0, Alignment.LEFT, true);




$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $cctdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $cctnet, 0, Alignment.LEFT, true);

}


 
 
 
 



if($doctor !='' && $category !='' && $doctor !="ALL" && $category !="ALL" && $option =="0")
{
 
 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
  
$pdf->Ln(1);
      $pdf->Cell(1);
$pdf->Cell(10,5," $doctor ($category) Wise Report($date1 to $date2)",0,1,'L',1);


$sql3="Select did from doctor where doctorname='$doctor' and  id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());

while($myrowc=mysql_fetch_row($rs3))
 {
  
  $did=strtoupper($myrowc[0]);
}
$pdf->Ln(1);
   $pdf->Cell(1);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(20,5,"DATE",1,0,'C',1);
$pdf->Cell(30,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(50,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(20,5,"TEST COST",1,0,'C',1);
$pdf->Cell(20,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);

$sql6="Select date,name,testname,refamount,discount,cost,raddiscount from dataentry where did='$did' and category='$category' and date between '$date1' and '$date2' and  id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$date=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$test=strtoupper($myrowc[2]);
$refamt=strtoupper($myrowc[3]);$discount=strtoupper($myrowc[4]);$cost=strtoupper($myrowc[5]);$raddiscount=strtoupper($myrowc[6]);



$i++;

$pdf->SetFont('Arial','',7);
            
$pdf->Cell(1);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(20,5, $date, 1, 0, 'C',0);
$pdf->Cell(30,5, $name, 1, 0, 'C',0);
$pdf->Cell(50,5, $test, 1, 0, 'C',0);
$pdf->Cell(20,5, $cost, 1, 0, 'C',0);
$pdf->Cell(20,5, $discount+$raddiscount, 1, 0, 'C',0);


$dis=$discount+$raddiscount;
$net=$cost-$dis;

$pdf->Cell(22,5, $net, 1, 1, 'C',0);
$tcost=$tcost+$cost;
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
$cell_width = 105;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Total Amount Report  :", 0, Alignment.LEFT, true);


$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tcost, 0, Alignment.LEFT, true);





$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tdiscount, 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 20;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5,  $tnet, 0, Alignment.LEFT, true);

$ctrefamt=$ctrefamt+$trefamt;
$ctdiscount=$ctdiscount+$tdiscount;
$ctnet=$ctnet+$tnet;
$ctcost=$ctcost+$tcost;
$trefamt="";
$tdiscount="";
$tnet="";
$ctcost="";

}




 
 

    $pdf->Output();



?>















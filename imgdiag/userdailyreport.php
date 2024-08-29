<?php
require('fpdf.php');

include('usersession.php');

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


$date=$_POST['date'];
$order=$_POST['order'];
$mode=$_POST['mode'];

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
      $pdf->Cell(40);
      $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(100,5," $date DAY WISE REPORT OF USER :$uu( Payment Mode:$mode)",0,1,'L',1);



$i=0;
$ss=0;$kk=0;

if($mode=="ALL")
{

$sql3="Select category from category where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs3))
 {
            
 $cate=strtoupper($myrowc[0]);

$i=0;

$find=0;
$sql6="Select category from dataentry where date='$date' and category='$cate' and id='$id' and user='$uu'";
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
$pdf->Cell(40,5,"DOCTOR NAME",1,0,'C',1);
$pdf->Cell(42,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(17,5,"TOTAL",1,0,'C',1);
$pdf->Cell(17,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(17,5,"RAD.DIS",1,0,'C',1);

$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);


$sql6="Select mrdnumber,name,refdoctor,testname,cost,discount,raddiscount from dataentry where date='$date' and category='$cate' and id='$id' and user='$uu'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);

$i++;
$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(32,5, $name, 1, 0, 'L',0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(40,5, $doctor, 1, 0, 'L',0);
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
$cell_width = 110;
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
$pdf->setFont('Arial','I',10);
$pdf->Cell(10);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 90;
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





$pdf->AddPage();


  $pdf->Ln(1);
      $pdf->Cell(40);
$pdf->Cell(100,5," TODAY UPDATED RECORDS OF USER($uu) DATE($date)",0,1,'L',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);


 $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(15,5,"T Number",1,0,'C',1);
$pdf->Cell(15,5,"Mrd Number",1,0,'C',1);
$pdf->Cell(32,5,"P Name",1,0,'C',1);
$pdf->Cell(36,5,"Ref Doctor",1,0,'C',1);
$pdf->Cell(36,5,"Test Name",1,0,'C',1);
$pdf->Cell(17,5,"Test cost",1,0,'C',1);
$pdf->Cell(15,5,"Dis Amt",1,0,'C',1);
$pdf->Cell(15,5,"rad Dis",1,0,'C',1);
$pdf->Cell(15,5,"ref Amt",1,1,'C',1);


$c=1;
$sql6="Select mrd,name,doctor,test,cost,discount,raddis,date,code,category,refamt,tnumber,user from modi where date='$date' and user='$uu' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$date=strtoupper($myrowc[7]);
$code=strtoupper($myrowc[8]);$category=strtoupper($myrowc[9]);$refamt=strtoupper($myrowc[10]);$tnumber=strtoupper($myrowc[11]);$user=strtoupper($myrowc[12]);


$i++;
$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5,$c,1,0,'C',1);
$pdf->Cell(15,5,$tnumber,1,0,'C',1);
$pdf->Cell(15,5,$mrd,1,0,'C',1);
$pdf->Cell(32,5,$name,1,0,'C',1);
$pdf->Cell(36,5,$doctor,1,0,'C',1);
$pdf->Cell(36,5,$test,1,0,'C',1);
$pdf->Cell(17,5,$cost,1,0,'C',1);
$pdf->Cell(15,5,$discount,1,0,'C',1);
$pdf->Cell(15,5,$raddis,1,0,'C',1);
$pdf->Cell(15,5,$refamt,1,1,'C',1);


{

$sql9="Select mrd,name,doctor,test,cost,discount,raddis,date,code,category,refamt,tnumber,user from updates where tnumber='$tnumber' and id='$id'";
$rs9=mysql_query($sql9) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs9))
 {
            
$mrd1=strtoupper($myrowc[0]);$name1=strtoupper($myrowc[1]);$doctor1=strtoupper($myrowc[2]);$test1=strtoupper($myrowc[3]);
$cost1=strtoupper($myrowc[4]);$discount1=strtoupper($myrowc[5]);$raddis1=strtoupper($myrowc[6]);$date1=strtoupper($myrowc[7]);
$code1=strtoupper($myrowc[8]);$category1=strtoupper($myrowc[9]);$refamt1=strtoupper($myrowc[10]);$tnumber1=strtoupper($myrowc[11]);$user1=strtoupper($myrowc[12]);

$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5,' ',0,0,'C',1);
$pdf->Cell(15,5,$tnumber1,1,0,'C',1);
$pdf->Cell(15,5,$mrd1,1,0,'C',1);
$pdf->Cell(32,5,$name1,1,0,'C',1);
$pdf->Cell(36,5,$doctor1,1,0,'C',1);
$pdf->Cell(36,5,$test1,1,0,'C',1);
$pdf->Cell(17,5,$cost1,1,0,'C',1);
$pdf->Cell(15,5,$discount1,1,0,'C',1);
$pdf->Cell(15,5,$raddis1,1,0,'C',1);
$pdf->Cell(15,5,$refamt1,1,1,'C',1);

}
$c++;
$pdf->Cell(-5);

$pdf->Cell(205,5," ",0,1,'C',1);

}
}




$pdf->AddPage();

$pdf->SetFont('Arial','B',10);

$pdf->Cell(75);
$pdf->Cell(100,5," RETURNS REPORT OF USER($uu) DATE($date)",0,1,'L',1);



$i=0;
$ss=0;$kk=0;




$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  
   $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);

$pdf->Cell(40,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(40,5,"DOCTOR NAME",1,0,'C',1);
$pdf->Cell(42,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(17,5,"TOTAL",1,0,'C',1);
$pdf->Cell(17,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(17,5,"RAD.DIS",1,0,'C',1);

$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);


$sql6="Select mrdnumber,name,refdoctor,testname,cost,discount,raddiscount,date from returns  where date='$date' and user='$uu' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$date=strtoupper($myrowc[7]);


$i++;
$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->SetFont('Arial','',6);

$pdf->Cell(40,5, $name, 1, 0, 'L',0);
$pdf->Cell(40,5, $doctor, 1, 0, 'L',0);
$pdf->Cell(42,5, $test, 1, 0, 'C',0);
$pdf->SetFont('Arial','',7);

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
   $pdf->Ln(2);

      $pdf->Cell(-5);
      $pdf->SetFont('Arial','B',8);


$pdf->Cell(130,5, "CUMULATIVE REPORT", 0, 0, 'C',0);

$pdf->Cell(17,5, $tcost, 0, 0, 'C',0);
$pdf->Cell(17,5, $tdiscount,0, 0, 'C',0);
$pdf->Cell(17,5, $trad, 0, 0, 'C',0);
$pdf->Cell(22,5, $tnet, 0, 1, 'C',0);



    $pdf->Output();

}
















if($mode != "ALL")
{

$sql3="Select category from category where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs3))
 {
            
 $cate=strtoupper($myrowc[0]);

$i=0;

$find=0;
$sql6="Select category from dataentry where date='$date' and category='$cate' and id='$id' and user='$uu' and mode='$mode'";
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
$pdf->Cell(40,5,"DOCTOR NAME",1,0,'C',1);
$pdf->Cell(42,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(17,5,"TOTAL",1,0,'C',1);
$pdf->Cell(17,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(17,5,"RAD.DIS",1,0,'C',1);

$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);


$sql6="Select mrdnumber,name,refdoctor,testname,cost,discount,raddiscount from dataentry where date='$date' and category='$cate' and id='$id' and user='$uu' and mode='$mode'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);

$i++;
$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->Cell(32,5, $name, 1, 0, 'L',0);
$pdf->SetFont('Arial','',7);
$pdf->Cell(40,5, $doctor, 1, 0, 'L',0);
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
$cell_width = 110;
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
$pdf->setFont('Arial','I',10);
$pdf->Cell(10);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 90;
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





$pdf->AddPage();


  $pdf->Ln(1);
      $pdf->Cell(40);
$pdf->Cell(100,5," TODAY UPDATED RECORDS OF USER($uu) DATE($date)",0,1,'L',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);


 $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);
$pdf->Cell(15,5,"T Number",1,0,'C',1);
$pdf->Cell(15,5,"Mrd Number",1,0,'C',1);
$pdf->Cell(32,5,"P Name",1,0,'C',1);
$pdf->Cell(36,5,"Ref Doctor",1,0,'C',1);
$pdf->Cell(36,5,"Test Name",1,0,'C',1);
$pdf->Cell(17,5,"Test cost",1,0,'C',1);
$pdf->Cell(15,5,"Dis Amt",1,0,'C',1);
$pdf->Cell(15,5,"rad Dis",1,0,'C',1);
$pdf->Cell(15,5,"ref Amt",1,1,'C',1);


$c=1;
$sql6="Select mrd,name,doctor,test,cost,discount,raddis,date,code,category,refamt,tnumber,user from modi where date='$date' and user='$uu' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$date=strtoupper($myrowc[7]);
$code=strtoupper($myrowc[8]);$category=strtoupper($myrowc[9]);$refamt=strtoupper($myrowc[10]);$tnumber=strtoupper($myrowc[11]);$user=strtoupper($myrowc[12]);


$i++;
$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5,$c,1,0,'C',1);
$pdf->Cell(15,5,$tnumber,1,0,'C',1);
$pdf->Cell(15,5,$mrd,1,0,'C',1);
$pdf->Cell(32,5,$name,1,0,'C',1);
$pdf->Cell(36,5,$doctor,1,0,'C',1);
$pdf->Cell(36,5,$test,1,0,'C',1);
$pdf->Cell(17,5,$cost,1,0,'C',1);
$pdf->Cell(15,5,$discount,1,0,'C',1);
$pdf->Cell(15,5,$raddis,1,0,'C',1);
$pdf->Cell(15,5,$refamt,1,1,'C',1);


{

$sql9="Select mrd,name,doctor,test,cost,discount,raddis,date,code,category,refamt,tnumber,user from updates where tnumber='$tnumber' and id='$id'";
$rs9=mysql_query($sql9) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs9))
 {
            
$mrd1=strtoupper($myrowc[0]);$name1=strtoupper($myrowc[1]);$doctor1=strtoupper($myrowc[2]);$test1=strtoupper($myrowc[3]);
$cost1=strtoupper($myrowc[4]);$discount1=strtoupper($myrowc[5]);$raddis1=strtoupper($myrowc[6]);$date1=strtoupper($myrowc[7]);
$code1=strtoupper($myrowc[8]);$category1=strtoupper($myrowc[9]);$refamt1=strtoupper($myrowc[10]);$tnumber1=strtoupper($myrowc[11]);$user1=strtoupper($myrowc[12]);

$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5,' ',0,0,'C',1);
$pdf->Cell(15,5,$tnumber1,1,0,'C',1);
$pdf->Cell(15,5,$mrd1,1,0,'C',1);
$pdf->Cell(32,5,$name1,1,0,'C',1);
$pdf->Cell(36,5,$doctor1,1,0,'C',1);
$pdf->Cell(36,5,$test1,1,0,'C',1);
$pdf->Cell(17,5,$cost1,1,0,'C',1);
$pdf->Cell(15,5,$discount1,1,0,'C',1);
$pdf->Cell(15,5,$raddis1,1,0,'C',1);
$pdf->Cell(15,5,$refamt1,1,1,'C',1);

}
$c++;
$pdf->Cell(-5);

$pdf->Cell(205,5," ",0,1,'C',1);

}
}




$pdf->AddPage();

$pdf->SetFont('Arial','B',10);

$pdf->Cell(75);
$pdf->Cell(100,5," RETURNS REPORT OF USER($uu) DATE($date)",0,1,'L',1);



$i=0;
$ss=0;$kk=0;




$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
  
   $pdf->Ln(1);
      $pdf->Cell(-5);
$pdf->Cell(8,5,"S.No",1,0,'C',1);

$pdf->Cell(40,5,"PATIENT NAME",1,0,'C',1);
$pdf->Cell(40,5,"DOCTOR NAME",1,0,'C',1);
$pdf->Cell(42,5,"TEST NAME",1,0,'C',1);
$pdf->Cell(17,5,"TOTAL",1,0,'C',1);
$pdf->Cell(17,5,"DISCOUNT",1,0,'C',1);
$pdf->Cell(17,5,"RAD.DIS",1,0,'C',1);

$pdf->Cell(22,5," NETAMOUNT",1,1,'C',1);


$sql6="Select mrdnumber,name,refdoctor,testname,cost,discount,raddiscount,date from returns  where date='$date' and user='$uu' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$mrd=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$test=strtoupper($myrowc[3]);
$cost=strtoupper($myrowc[4]);$discount=strtoupper($myrowc[5]);$raddis=strtoupper($myrowc[6]);$date=strtoupper($myrowc[7]);


$i++;
$pdf->SetFont('Arial','',7);
            
$pdf->Cell(-5);
$pdf->Cell(8,5, $i, 1, 0, 'C',0);
$pdf->SetFont('Arial','',6);

$pdf->Cell(40,5, $name, 1, 0, 'L',0);
$pdf->Cell(40,5, $doctor, 1, 0, 'L',0);
$pdf->Cell(42,5, $test, 1, 0, 'C',0);
$pdf->SetFont('Arial','',7);

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
   $pdf->Ln(2);

      $pdf->Cell(-5);
      $pdf->SetFont('Arial','B',8);


$pdf->Cell(130,5, "CUMULATIVE REPORT", 0, 0, 'C',0);

$pdf->Cell(17,5, $tcost, 0, 0, 'C',0);
$pdf->Cell(17,5, $tdiscount,0, 0, 'C',0);
$pdf->Cell(17,5, $trad, 0, 0, 'C',0);
$pdf->Cell(22,5, $tnet, 0, 1, 'C',0);



    $pdf->Output();

}











?>


<?php
require('fpdf.php');
include('adminsession.php');


function convert_number_to_words($number) 
{
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

include('connection.php');

	


class PDF extends FPDF
{
	function Header()
	{	

			$this->DefOrientation='P';
			$this->wPt=$this->fhPt;
		$this->hPt=$this->fwPt;
		
		
		$this->Ln(0);
		$this->setFont('Arial','B',16);
		$this->Cell(10);



		
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
	
	$mrd=$_POST['mrdnumber'];

$sql3="select title,address1,phone from title where id='$id'";
$rs3=mysql_query($sql3) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs3))
{      
 $title=strtoupper($myrowc[0]); 
  $address1=strtoupper($myrowc[1]); 
 $phone=strtoupper($myrowc[2]); 

	}
	


  $time_now=mktime(date('h')+5,date('i')+30,date('s'));
 $date1=date('h:i:s A',$time_now);





$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

		

 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',16);

 
$pdf->Ln(8);
$pdf->Cell(50);
$pdf->Cell(100,8,"$title",0,1,'C',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
$pdf->Ln(1);
$pdf->Cell(50);
$pdf->Cell(100,5,"$address1",0,1,'C',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',7);
$pdf->Ln(1);
$pdf->Cell(50);
$pdf->Cell(100,5,"$phone",0,1,'C',1);

$pdf->SetFillColor(300, 120, 150);
$pdf->SetFont('Arial','B','U',7);
$pdf->Ln(1);
$pdf->Cell(85);
$pdf->Cell(30,5,"Reprint Receipt",0,1,'C',1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',7);
$pdf->Ln(1);
$pdf->Cell(50);
$pdf->Cell(100,2,"_________________________________________________________________________________________________________________________________",0,1,'C',1);




		
$sql6="Select date,name,refdoctor,age,gender,phone,address from dataentry where mrdnumber='$mrd' and id='$id'";
$rs6=mysql_query($sql6) or die(mysql_error());


while($myrowc=mysql_fetch_row($rs6))
 {
            
$date=strtoupper($myrowc[0]);$name=strtoupper($myrowc[1]);$doctor=strtoupper($myrowc[2]);$age=strtoupper($myrowc[3]);
$gender=strtoupper($myrowc[4]);$phone=strtoupper($myrowc[5]);$address=strtoupper($myrowc[6]);


}


$pdf->Ln(3);
		$pdf->setFont('Arial','I',9);
		$pdf->Cell(30);

 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

$cell_width = 25;
$pdf->MultiCell($cell_width, 5, "BILL Number :",0, Alignment.LEFT, true);
            
$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 50;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, $mrd,0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 25;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Date :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 50;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, $date, 0, Alignment.LEFT, true);



		$pdf->Ln(1);
		$pdf->setFont('Arial','I',9);
		$pdf->Cell(-20);

 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 25;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Name :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 50;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, $name, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 25;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width,5, "Ref.Doctor :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 50;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, $doctor, 0, Alignment.LEFT, true);



		$pdf->Ln(1);
		$pdf->setFont('Arial','I',9);
		$pdf->Cell(-20);

 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

     

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 25;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Age :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 50;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, $age, 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 25;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Gender :", 0, Alignment.LEFT, true);



$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 50;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, $gender, 0, Alignment.LEFT, true);


		$pdf->Ln(1);
		$pdf->setFont('Arial','I',9);
		$pdf->Cell(-20);

 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 25;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "Phone :", 0, Alignment.LEFT, true);


$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 50;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, $phone, 0, Alignment.LEFT, true);




		$pdf->Ln(1);
		$pdf->setFont('Arial','I',9);
		$pdf->Cell(-20);

 $pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',9);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 25;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, "address :", 0, Alignment.LEFT, true);

$pdf->SetXY($current_x + $cell_width, $current_y);
$cell_width = 100;
$current_x = $pdf->GetX();
$pdf->MultiCell($cell_width, 5, $address, 0, Alignment.LEFT, true);

 $d=0;
 $sql4="SELECT discount FROM dataentry where mrdnumber='$mrd' and id='$id' and discount !=''";
$rs4=mysql_query($sql4) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs4))
{      
$d++;
}

$rd=0;
 $sql5="SELECT raddiscount FROM dataentry where mrdnumber='$mrd' and id='$id' and raddiscount !=''";
$rs5=mysql_query($sql5) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs5))
{      
$rd++;
}


$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);

  
$pdf->Ln(3);
$pdf->Cell(20);
$pdf->Cell(8,5,"S.no",1,0,'C',1);
$pdf->Cell(65,5,"Test Name",1,0,'C',1);
$pdf->Cell(30,5,"Cost",1,0,'C',1);
if($d !=0)
{
$pdf->Cell(20,5,"Discount",1,0,'C',1);
}
if($rd !=0)
{
$pdf->Cell(25,5,"Rad.Discount",1,0,'C',1);
}

$pdf->Cell(22,5," Netamount",1,1,'C',1);


$q=1;
	
	
$sql9="SELECT testname,cost,discount,raddiscount FROM dataentry where mrdnumber='$mrd' and id='$id'";
$rs9=mysql_query($sql9) or die(mysql_error());
while($myrowc=mysql_fetch_row($rs9))
{      
 $test=strtoupper($myrowc[0]); $cst=strtoupper($myrowc[1]);$discc=strtoupper($myrowc[2]);$raddiscc=strtoupper($myrowc[3]);
          

             
$pdf->SetFont('Arial','',8);
            
$pdf->Cell(20);
$pdf->Cell(8,6, $q, 1, 0, 'C',0);
$pdf->Cell(65,6,$test, 1, 0, 'C',0);
$pdf->Cell(30,6, $cst, 1, 0, 'C',0);
if($d !=0)
{
$pdf->Cell(20,6, $discc, 1, 0, 'C',0);
}
if($rd !=0)
{
$pdf->Cell(25,6, $raddiscc, 1, 0, 'C',0);
}

$ded=$discc+$raddiscc;

		$net=$cst-$ded;

$pdf->Cell(22,6, $net, 1, 1, 'C',0);
$q++;
		$tnet=$tnet+$net;

}
$pdf->SetFont('Arial','B',10);

  		$pdf->Ln(1);
  		
  		$pdf->cell(120);

 $pdf->Cell(20,6,"",0,1,0);

$pdf->cell(120);

 $pdf->Cell(20,6,"Net Amount : $tnet/-",0,1,0);
 
 $to=convert_number_to_words($number=$tnet);


$pdf->Ln(2);
$pdf->cell(20);
 $pdf->Cell(120,7,"Amount in Words :$to Rupees only.",0,1,0);
 

$pdf->SetFont('Arial','B',10);
 $pdf->Cell(20,6,"     ",0,1);

$pdf->SetFont('Arial','B',10);

  		$pdf->Ln(1);


                 $pdf->Cell(150);
   $pdf->Cell(30,6,"Signature",0,0,'L',0);
   $pdf->Ln(5);


              
 $pdf->Cell(150);

   $pdf->Cell(30,6, "Billed by $uu",0,0,'L',0);

   ob_clean(); 


    $pdf->Output();



?>


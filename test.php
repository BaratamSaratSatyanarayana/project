
<?php

$outname=$_POST["enname"];
$outemail=$_POST["en_email_id"];
$outtitle=$_POST["entitle"];
$outlocation=$_POST["enlocation"];
$outurlname=$_POST["enurlname"];
$outurl=$_POST["enurl"];
$outschool=$_POST["enschool"];
$outqual=$_POST["enqualification"];
$outdates=$_POST["endates"];
$outdesc=$_POST["desc"];
$outsummary=$_POST["summary"];
$outexpemp=$_POST["enexpemploye"];
$outexpjobtitle=$_POST["enexpjobtitle"];
$outexpdates=$_POST["enexpdates"];
$outdesc1=$_POST["desc1"]; 
$cellWidth=115;
$cellHeight=5;
$cellWidthName=50;
$cellHeightName=8;
$cellWidthTitle=50;
$cellHeightTitle=6;

require('fpdf.php');           

$pdf = new FPDF('p','mm','Letter'); 
$pdf->SetTitle('your Resume');
$pdf->SetMargins(15,20,20);
$pdf->AddPage(); 
$pdf->SetFont('Times', 'B', 24); 


//name
$pdf->MultiCell($cellWidthName,$cellHeightName,$outname,0);
$pdf->SetLineWidth(0.8);
$pdf->Line(80, 21, 195, 21);



//title
$pdf->SetFont('Times', 'B', 16); 
$pdf->SetTextColor(224,92,11);
$pdf->SetLineWidth(0.2);
$pdf->MultiCell($cellWidthTitle,$cellHeightTitle,$outtitle,0);
$pdf->SetLineWidth(0.8);
$xpos=$pdf->GetX();
$ypos=$pdf->GetY();
 if(!empty($_POST["summary"]))
 {
$pdf->Line(15, $ypos+10, 20, $ypos+10);

$xpos=$pdf->GetX();
$ypos=$pdf->GetY();

$pdf->Line(80, $ypos+10, 195, $ypos+10);
$pdf->SetLineWidth(0.2);


 $pdf->Ln(); 
$pdf->SetTextColor(12,12,12);
$pdf->SetFont('Times', 'B', 12); 
$pdf->SetXY($xpos,$ypos+15);
$pdf->Cell(50, 5, 'Carrer Objective', 0, 0, 'L'); 
 }
 else
 {
	 
 }
 



$xpos=$pdf->GetX();
$ypos=$pdf->GetY();
$pdf->SetXY(80,51);
$pdf->SetFont('Times', 'B', 12); 
$pdf->MultiCell($cellWidth,$cellHeight,$outsummary,0);
if(!empty($_POST["enexpemploye"][0]))
{
	
$pdf->SetLineWidth(0.8);
$xpos=$pdf->GetX();
$ypos=$pdf->GetY();
$pdf->Line(15, $ypos+10, 20, $ypos+10);

$xpos=$pdf->GetX();
$ypos=$pdf->GetY();

$pdf->Line(80, $ypos+10, 195, $ypos+10);
$pdf->SetLineWidth(0.2);
}
else
{
	
}
$xpos=$pdf->GetX();
$ypos=$pdf->GetY();

$pdf->SetFont('Times', 'B', 12); 
$pdf->SetTextColor(12,12,12);
$pdf->SetXY(80,21);


$pdf->Cell(115, 10, $outname, 0, 0, 'L'); 
$pdf->Ln(); 
$pdf->SetFont('Times', 'B', 12); 
$pdf->SetXY(80,28);
$pdf->SetTextColor(12,12,12);
$pdf->Cell(115, 5, $outlocation, 0, 0, 'L'); 

$pdf->SetFont('Times', 'B', 12); 
$pdf->SetTextColor(224,92,11);
$pdf->SetXY(80,36);
$pdf->Cell(115, 5, $outemail, 0, 0, 'L'); 
if(!empty($_POST["enexpemploye"][0]))
{
$pdf->SetTextColor(12,12,12);

$pdf->Ln(); 
$pdf->SetFont('Times', 'B', 12); 
$pdf->SetXY($xpos,$ypos+15);
$pdf->Cell(50, 5, 'Experience', 0, 0, 'L'); 
}
else
{
	
}
$xpos=$pdf->GetX();
$ypos=$pdf->GetY();
$y_var=$ypos;

for($i=0;$i<count($outexpemp)-1;$i++)
{
$pdf->Ln(); 
$pdf->SetXY(80,$y_var);	
$pdf->SetFont('Times', 'B', 11); 
$pdf->Cell(115, 5, $outexpemp[$i].'/'.$outexpjobtitle[$i], 0, 0, 'L'); 
$y_var=$y_var+5;
$pdf->Ln(); 
$pdf->SetXY(80,$y_var);		
$pdf->SetTextColor(196,196,196);
$pdf->Cell(115, 5, $outexpdates[$i], 0, 0, 'L'); 
$pdf->SetTextColor(12,12,12);
$y_var=$y_var+5;	
$pdf->Ln(); 
$pdf->SetXY(80,$y_var);		
$xpos=$pdf->GetX();
$ypos=$pdf->GetY();
$pdf->MultiCell($cellWidth,$cellHeight,$outdesc1[$i],0);
$pdf->SetXY($xpos+$cellWidth,$ypos); 
$y_var=$y_var+30;

}
$xpos=$pdf->GetX();
$ypos=$pdf->GetY();
if(!  empty($_POST["enschool"][0]))
{
$pdf->SetLineWidth(0.8);
$pdf->Line(15, $y_var, 20, $y_var);


$pdf->Line(80, $y_var, 195, $y_var);
}
else
{
	
}
$pdf->SetLineWidth(0.2);
if(!empty($_POST["enschool"][0]))
{
$pdf->SetTextColor(12,12,12);
$pdf->Ln(); 
$pdf->SetFont('Times', 'B', 12); 
$y_var=$y_var+5;
$pdf->SetXY(15,$y_var);
$pdf->Cell(50, 5, 'Education', 0, 0, 'L'); 
}
else
{
	
}
$xpos=$pdf->GetX();
$ypos=$pdf->GetY();
for($i=0;$i<count($outschool)-1;$i++)
{
	$pdf->SetTextColor(12,12,12);
	$pdf->Ln(); 
$pdf->SetXY(80,$y_var);	
$pdf->SetFont('Times', 'B', 11); 
$pdf->Cell(115, 5, $outschool[$i].'/'.$outqual[$i], 0, 0, 'L'); 
$y_var=$y_var+5;
$pdf->Ln(); 
$pdf->SetXY(80,$y_var);		
$pdf->SetTextColor(196,196,196);
$pdf->Cell(115, 5, $outdates[$i], 0, 0, 'L'); 
$pdf->SetTextColor(12,12,12);
$y_var=$y_var+5;	
$pdf->Ln(); 
$pdf->SetXY(80,$y_var);		

$xpos=$pdf->GetX();
$ypos=$pdf->GetY();
$pdf->MultiCell($cellWidth,$cellHeight,$outdesc[$i],0);
$pdf->SetXY($xpos+$cellWidth,$ypos); 
$y_var=$y_var+40;
	
}

for($i=0;$i<count($outurlname);$i++)
{
$pdf->Ln(); 
$pdf->SetFont('Times', 'B', 10); 
$pdf->Cell(176, 15, $outurlname[$i], 0, 0, 'C'); 

$pdf->Ln(); 
$pdf->SetFont('Times', 'B', 10); 
$pdf->Cell(176, 15, $outurl[$i], 0, 0, 'C'); 
}




$pdf->output("I","youresume.pdf");

?>

<?php
require ('../fpdf/fpdf.php');





class PDF extends FPDF
{

// Page header

}

$pdf = new PDF('P','mm','Legal');
//left top right
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf ->AddPage();

    // Logo(x axis, y axis, height, width)
    $pdf->Image('../../assets/img/logo.png',50,5,15,15);
    // text color
    $pdf->SetTextColor(255,0,0);
    // font(font type,style,font size)
    $pdf->SetFont('Arial','B',17);
    // Dummy cell
    $pdf->Cell(45);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(110,3,'Saint Francis of Assisi College',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,3,'96 Bayanan, City of Bacoor, Cavite',0,0,'C');
    // Line break
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',9,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,4,'Senior High School Department',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',9,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,3,'Track:Academic',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',9,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,4,'Science, Technology, and Mathematics (STEM)',0,1,'C');

    // Line break

    $pdf->SetFont('Arial','',9,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,4,'(Effective Academic Year 2018-2019)',0,1,'C');
     // Line break
    $pdf->Ln(1);
   



//cell(width,height,text,border,end line,[align])
//student name
$pdf ->Cell(15 ,5,'Name',0,0); 
$pdf->SetFont('Arial','B',9);
$pdf ->Cell(115 ,5,'','B',0); //end of line


//student no
$pdf->SetFont('Arial','',9);
$pdf ->Cell(25 ,5,'Student No:',0,0);
$pdf->SetFont('Arial','B','9.5');
$pdf ->Cell(30 ,5,'','B',0); //end of line

//dummy cells
$pdf ->Cell(20 ,5,'',0,1);
$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10.5');
$pdf ->Cell(20 ,7,'CODE',0,0);
$pdf ->Cell(90 ,7,'Description',0,0,'C');
$pdf ->Cell(34 ,7,'UNITS',0,0,'C');
$pdf ->Cell(60 ,7,'Pre-Requisites',0,0);

// UNITS
$pdf ->Cell(132 ,5,'',0,0);
$pdf ->Cell(10 ,5,'LEC',0,0);
$pdf ->Cell(10 ,5,'LAB',0,0);
$pdf ->Cell(10 ,5,'TOTAL',0,1);

//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Grade 11, First Semester',0,1);
$pdf->SetFont('Arial','','9');
// SUBJECTS

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ENG',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Oral Communication',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FIL',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Kominukasyon at pananaliksik at wikang Filipino at kulturang Pilipino',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HUM',0,0);
$pdf ->Cell(15 ,4,'112',0,0);
$pdf ->Cell(90 ,4,'Contemporary Philippine Arts from the Region',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MAT',0,0);
$pdf ->Cell(15 ,4,'113',0,0);
$pdf ->Cell(90 ,4,'General Mathematics',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCI',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Earth and Life Science (Lec/Lab)',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SOC',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Personal Development',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PEH',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Physical Education and Health 1',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MAT',0,0);
$pdf ->Cell(15 ,4,'112',0,0);
$pdf ->Cell(90 ,4,'Pre-Calculus',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(9 ,4,'','',0);
$pdf ->Cell(7 ,4,'','',1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHE',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'General Chemistry 1 ',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(9 ,4,'','',0);
$pdf ->Cell(7 ,4,'','',1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHL',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Christian Living 1',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(9 ,4,'','',0);
$pdf ->Cell(7 ,4,'','',1);

$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','','10');
$pdf ->Cell(10 ,6,'',0,0);
$pdf ->Cell(180 ,6,'',0,1);



//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Grade 11, Second Semester',0,1);


// SUBJECTS
$pdf->SetFont('Arial','','9');

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ENG',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Reading and Writing',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FIL',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Pagbasa at Pagsuri ng iba t ibang tekso tungo sa Pananaliksik',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HUM',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'21st Century Literature from the Philippines and the World',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MAT',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Basic Calculus',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MAT',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Statistics and Probability',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'DIS',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Disaster Readiness and Risk Reductions',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RES',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Qualitative Research in Daily Life',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PEH',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,5,'Physical Education and Health 2',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(9 ,4,'','',0);
$pdf ->Cell(11 ,4,'','',0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHL',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,5,'Christian Living 2',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(9 ,4,'','',0);
$pdf ->Cell(11 ,4,'','',0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'BIO',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,5,'General Biology 1',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(9 ,4,'','',0);
$pdf ->Cell(11 ,4,'','',0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHE',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,5,'General Chemistry',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(9 ,4,'','',0);
$pdf ->Cell(11 ,4,'','',0);
$pdf ->Cell(20 ,4,'',0,1);


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','','10');
$pdf ->Cell(10 ,6,'',0,0);
$pdf ->Cell(180 ,6,'',0,1);



//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Grade 12, First Semester',0,1);

// SUBJECTS
$pdf->SetFont('Arial','','9');

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SOC',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Understanding Culture, Society, and Politics',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20, 4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHY',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Introduction to Philosophy of the Human Person ',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PEH',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Physical Education and Health 3',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHL',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Christian Living 3',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->SetFont('Arial','',8);
$pdf ->Cell(20 ,4,'',0,1);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ENG',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'English for Academic and Professional Purpos',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RES',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Quantitaive Research in Daily Life',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FIL',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,5,'Pagsusulat sa Filipino sa Piling Larangan',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ENT',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,5,'Entrepreneurship',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'BIO',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,5,'General Biology 2',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHY',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,5,'General Physics 1',0,0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(10 ,4,'','',0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(20 ,5,'',0,0);


$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','','10');
$pdf ->Cell(10 ,6,'',0,0);
$pdf ->Cell(180 ,6,'',0,1);


//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Grade 12, Second Semester',0,1);
$pdf->SetFont('Arial','','9');

// SUBJECTS
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'COM',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Media',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PEH',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Physical Education and Health 4',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf->SetFont('Arial','','8');
$pdf ->Cell(20 ,4,'',0,1);

$pdf->SetFont('Arial','','9');
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHL',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Christian Living 4',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'COM',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Empowerment Technologies',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RES',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Inquiries, Investigation, and Immersion',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHY',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'General Physics 2',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RES',0,0);
$pdf ->Cell(15 ,4,'222',0,0);
$pdf ->Cell(90 ,4,'Capstone Project',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(20, 4,'',0,1);



$pdf ->Cell(20 ,5,'',0,0);


$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','','10');
$pdf ->Cell(10 ,6,'',0,0);
$pdf ->Cell(180 ,6,'',0,1);

$pdf ->Output();
?>
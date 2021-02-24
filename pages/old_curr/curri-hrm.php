<?php
require ('../fpdf/fpdf.php');





class PDF extends FPDF
{

// Page header

}

$pdf = new PDF('P','mm','Legal');
//left top right
$pdf->SetRightMargin(10);
$pdf ->AddPage();

    // Logo(x axis, y axis, height, width)
    $pdf->Image('../../assets/img/logo.png',50,5,15,15);
    // text color
    $pdf->SetTextColor(255,0,0);
    // font(font type,style,font size)
    $pdf->SetFont('Arial','B',18);
    // Dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(110,5,'Saint Francis of Assisi College',0,0,'C');
    // Line break
    $pdf->Ln(5);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,3,'96 Bayanan, City of Bacoor, Cavite',0,0,'C');
    // Line break
    $pdf->Ln(8);
    $pdf->SetFont('Arial','B',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,4,'FOUR-YEAR CURRICULUM',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,4,'FOR',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->SetFont('Arial','B',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,4,'BACHELOR OF SCIENCE IN HOTEL AND RESTAURANT MANAGEMENT',0,1,'C');
    
    // Line break
    $pdf->Ln(6);
    $pdf->SetFont('Arial','',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,4,'Effective Aacademic Year 2008-2009',0,0,'C');
     // Line break
    $pdf->Ln(4);
    $pdf->SetFont('Arial','',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,4,'as per CMO # 30 series of 2006',0,0,'C');
    $pdf->Ln(10);



//cell(width,height,text,border,end line,[align])
//student name
$pdf ->Cell(15 ,5,'Name:',0,0); 
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(115 ,5,'','B',0); //end of line


//student no
$pdf->SetFont('Arial','','10');
$pdf ->Cell(25 ,5,'Student No:',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(30 ,5,'','B',1); //end of line

//dummy cells
$pdf ->Cell(20 ,5,'',0,1);
$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'CODE',0,0);
$pdf ->Cell(90 ,5,'Description',0,0,'C');
$pdf ->Cell(34 ,5,'UNITS',0,0,'C');
$pdf ->Cell(60 ,5,'Pre-Requisites',0,1);

// UNITS
$pdf ->Cell(132 ,5,'',0,0);
$pdf ->Cell(10 ,5,'LEC',0,0);
$pdf ->Cell(10 ,5,'LAB',0,0);
$pdf ->Cell(10 ,5,'TOTAL',0,1);

//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'First Year, First Semester',0,1);
$pdf->SetFont('Arial','','10');
// SUBJECTS

    $pdf ->Cell(5 ,4,'',0,1);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ENGL',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Communication Skills 1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FILI',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Komunikasyon Sa Akademikong Filipino',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MATH',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'College Algebra',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NSCI',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Biological Science',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MGMT',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Principles of Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'COMP',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'I.T. Concepts & Fundamentals',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHCL',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Christian Community Living 1',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(89 ,4,'Physical Education 1',0,0);
$pdf ->Cell(11 ,4,'(2)',0,0);
$pdf ->Cell(9 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'(2)',0,1);

// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NSTP',0,0);
$pdf ->Cell(15 ,4,'11',0,0);
$pdf ->Cell(89 ,4,'National Service Training Program 1',0,0);
$pdf ->Cell(11 ,4,'(3)','B',0);
$pdf ->Cell(9 ,4,'0','B',0);
$pdf ->Cell(7 ,4,'(3)','B',1);




$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(94 ,6,'TOTAL',0,0,'C');
$pdf ->Cell(11 ,6,'18',0,0);
$pdf ->Cell(9 ,6,'1',0,0);
$pdf ->Cell(10 ,6,'19',0,1);
$pdf ->Cell(180 ,6,'',0,1);










//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'First Year, Second Semester',0,1);


// SUBJECTS
$pdf->SetFont('Arial','','10');

$pdf ->Cell(5 ,4,'',0,1);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ENGL',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Communication Skills 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'ENGL 111',0,1);
    


$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FILI',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Pagbasa at Pagsulat Tungo sa Pananaliksik',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'FILI 111',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MATH',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Business Mathematics',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MATH 111',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HYGN',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Principles of Safety, Hygiene & Sanitation',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRMO',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Food & Beverage Service Procedure',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRME',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Asian Cuisine',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MKGT',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Principles of Marketing',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TRSM',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Principles of Tourism 1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TRSM',0,0);
$pdf ->Cell(15 ,4,'122',0,0);
$pdf ->Cell(90 ,4,'Culinary Arts & Sciences',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHCL',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Christian Community Living 2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(20 ,4,'CHCL 111',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(89 ,4,'Physical Education 2',0,0);
$pdf ->Cell(11 ,4,'(2)',0,0);
$pdf ->Cell(9 ,4,'0',0,0);
$pdf ->Cell(11 ,4,'(2)',0,0);
$pdf ->Cell(20 ,4,'PHED 111',0,1);

// LAST LINE PER SEM
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NSTP',0,0);
$pdf ->Cell(15 ,4,'12',0,0);
$pdf ->Cell(89 ,5,'National Service Training Program 2',0,0);
$pdf ->Cell(11 ,4,'(3)','B',0);
$pdf ->Cell(9 ,4,'0','B',0);
$pdf ->Cell(11 ,4,'(3)','B',0);
$pdf ->Cell(20 ,4,'NSTP 11',0,1);


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(94 ,6,'TOTAL',0,0,'C');
$pdf ->Cell(11 ,6,'25',0,0);
$pdf ->Cell(9 ,6,'3',0,0);
$pdf ->Cell(10 ,6,'28',0,1);
$pdf ->Cell(180 ,6,'',0,1);









//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Second Year, First Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','10');
$pdf ->Cell(5 ,4,'',0,1);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ENGL',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Oral Communication & Public Speaking',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'ENGL 121',0,1);
   
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HIST',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Philippine History',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NSCI',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Environmental Science',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FINA',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Basic Finance',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ACTG',0,0);
$pdf ->Cell(15 ,4,'212',0,0);
$pdf ->Cell(90 ,4,'Introduction to Accounting',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TRSM',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'Principles of Tourism 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'TRSM 121',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'GPSY',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,4,'General Psychology',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRME',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,5,'Western, International & Classical Cuisine',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'HRME 121',0,1);

$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRMO',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(90 ,5,'Banquet, Function and Catering Service',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'HRMO 121',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'211',0,0);
$pdf ->Cell(89 ,5,'Physical Education 3',0,0);
$pdf ->Cell(11 ,4,'(2)','B',0);
$pdf ->Cell(9 ,4,'0','B',0);
$pdf ->Cell(11 ,4,'(2)','B',0);
$pdf ->Cell(20 ,4,'PHED 121',0,1);

$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(94 ,6,'TOTAL',0,0,'C');
$pdf ->Cell(11 ,6,'25',0,0);
$pdf ->Cell(9 ,6,'2',0,0);
$pdf ->Cell(10 ,6,'27',0,1);
$pdf ->Cell(180 ,6,'',0,1);









//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Second Year, Second Semester',0,1);
$pdf->SetFont('Arial','','10');

// SUBJECTS

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ENGL',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Business and Technical Writing',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'ENGL 121',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CONS',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Philippine Government & Constitution',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);




$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RZAL',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Rizal\'s Life, Works & Writings',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);



$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRMO',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Front Office Procedure with Personality Development',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'COMP 111',0,1);



$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TRSM',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Tourism Planning & Development',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'TRSM 211',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ENTR',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Entrepreneurship & Business Planning',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FRLG',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,4,'Foreign Language 1 (Niponggo)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PRAC',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(90 ,5,'Practicum 1 (300 Hours)',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'6',0,0);
$pdf ->Cell(10 ,4,'6',0,1);
$pdf ->Cell(50 ,4,'',0,0);
$pdf ->Cell(95 ,5,'I. Food & Beverage Operation (200 Hours)',0,1);
$pdf ->Cell(50 ,4,'',0,0);
$pdf ->Cell(95 ,5,'II. Special Training (100 Hours)',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'221',0,0);
$pdf ->Cell(89 ,5,'Physical Education 4',0,0);
$pdf ->Cell(11 ,4,'(2)','B',0);
$pdf ->Cell(9 ,4,'0','B',0);
$pdf ->Cell(11 ,4,'(2)','B',0);
$pdf ->Cell(20 ,4,'PHED 211',0,1);

$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(94 ,6,'TOTAL',0,0,'C');
$pdf ->Cell(11 ,6,'21',0,0);
$pdf ->Cell(9 ,6,'6',0,0);
$pdf ->Cell(10 ,6,'27',0,0);
$pdf ->Cell(180 ,6,'',0,1);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(50 ,4,'',0,1);
$pdf ->Cell(180 ,5,'At the end of the Second Year Curriculum, the student will be granted a Certificate in',0,1,'C');

$pdf ->Cell(180 ,5,'Associate in Hotel and Restaurant Management',0,1,'C');





$pdf->Cell(180,10,'',0,1);
$pdf->Cell(180,10,'',0,1);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Third Year, First Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','10');
$pdf ->Cell(5 ,4,'',0,1);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECON',0,0);
$pdf ->Cell(15 ,4,'311',0,0);
$pdf ->Cell(90 ,4,'Economics with Agrarian Reform & Taxation',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MGMT',0,0);
$pdf ->Cell(15 ,4,'311',0,0);
$pdf ->Cell(90 ,4,'Human Resource Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MGMT 111',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MGMT',0,0);
$pdf ->Cell(15 ,4,'312',0,0);
$pdf ->Cell(90 ,4,'Total Quality Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MGMT 111',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRMO',0,0);
$pdf ->Cell(15 ,4,'311',0,0);
$pdf ->Cell(90 ,4,'Rooms Division Management & Control',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'HRMO 221',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRMO',0,0);
$pdf ->Cell(15 ,4,'312',0,0);
$pdf ->Cell(90 ,4,'Food & Beverage Control System',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'HRMO 121',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRMO',0,0);
$pdf ->Cell(15 ,4,'313',0,0);
$pdf ->Cell(90 ,4,'Housekeeping Procedure',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRME',0,0);
$pdf ->Cell(15 ,4,'311',0,0);
$pdf ->Cell(90 ,4,'Hospitality Organizational Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MGMT 111',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SOCS',0,0);
$pdf ->Cell(15 ,4,'411',0,0);
$pdf ->Cell(90 ,4,'Society & Culture w/ Family Planning',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HUMA',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Music, Art Education & Appreciation',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0,1);

$pdf ->Cell(20 ,5,'',0,1);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(40 ,5,'',0,0);
$pdf ->Cell(94 ,6,'TOTAL',0,0,'C');
$pdf ->Cell(11 ,6,'26',0,0);
$pdf ->Cell(9 ,6,'1',0,0);
$pdf ->Cell(10 ,6,'27',0,1);
$pdf ->Cell(180 ,6,'',0,1);






$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Third Year, Second Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','10');
$pdf ->Cell(5 ,4,'',0,1);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'LITE',0,0);
$pdf ->Cell(15 ,4,'321',0,0);
$pdf ->Cell(90 ,4,'Introduction to Literature',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);




$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MGMT',0,0);
$pdf ->Cell(15 ,4,'121',0,0);
$pdf ->Cell(90 ,4,'Human Behavior in Organization',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MGMT 111',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MATH',0,0);
$pdf ->Cell(15 ,4,'122',0,0);
$pdf ->Cell(90 ,4,'Basic Statistics',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MATH 121',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RESE',0,0);
$pdf ->Cell(15 ,4,'311',0,0);
$pdf ->Cell(90 ,4,'Introduction to Research Writing',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'ENGL 221',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRME',0,0);
$pdf ->Cell(15 ,4,'321',0,0);
$pdf ->Cell(90 ,4,'Banquet & Catering Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'HRMO 211',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRME',0,0);
$pdf ->Cell(15 ,4,'322',0,0);
$pdf ->Cell(90 ,4,'Hospitality Operational Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'HRME 311',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRME',0,0);
$pdf ->Cell(15 ,4,'323',0,0);
$pdf ->Cell(90 ,4,'Leisure, Sports & Recreation Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MGMT 111',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRME',0,0);
$pdf ->Cell(15 ,4,'324',0,0);
$pdf ->Cell(90 ,4,'Bar Management & Mixology',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'HRMO 121',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRME',0,0);
$pdf ->Cell(15 ,4,'325',0,0);
$pdf ->Cell(90 ,4,'Baking Science',0,0);
$pdf ->Cell(10 ,4,'2','B',0);
$pdf ->Cell(10 ,4,'1','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(20 ,4,'HRMO 121',0,1);


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(94 ,6,'TOTAL',0,0,'C');
$pdf ->Cell(11 ,6,'25',0,0);
$pdf ->Cell(9 ,6,'2',0,0);
$pdf ->Cell(10 ,6,'27',0,1);
$pdf ->Cell(180 ,6,'',0,1);










$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Fourth Year, First Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','10');
$pdf ->Cell(5 ,4,'',0,1);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FSDY',0,0);
$pdf ->Cell(15 ,4,'1',0,0);
$pdf ->Cell(90 ,4,'Feasibility Study 1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'RESE 311',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PRAC',0,0);
$pdf ->Cell(15 ,4,'421',0,0);
$pdf ->Cell(90 ,4,'Practicum 2 (600 Hours)',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'6',0,0);
$pdf ->Cell(10 ,4,'6',0,0);
$pdf ->Cell(20 ,4,'',0,1);
$pdf ->Cell(50 ,4,'',0,0);
$pdf ->Cell(95 ,5,'I. Front Office (200 Hours)',0,1);
$pdf ->Cell(50 ,4,'',0,0);
$pdf ->Cell(95 ,5,'II. Housekeeping (200 Hours)',0,1);
$pdf ->Cell(50 ,4,'',0,0);
$pdf ->Cell(95 ,5,'III. Hotel Support Service Department (100 Hours)',0,1);
$pdf ->Cell(50 ,4,'',0,0);
$pdf ->Cell(95 ,5,'IV. Specialization in any areas - Hotel / Restaurant',0,1);
$pdf ->Cell(105 ,4,'',0,0);
$pdf ->Cell(95 ,5,'(100 Hours)',0,1);



$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(94 ,6,'TOTAL',0,0,'C');
$pdf ->Cell(11 ,6,'3','T',0);
$pdf ->Cell(9 ,6,'6','T',0);
$pdf ->Cell(10 ,6,'9','T',1);
$pdf ->Cell(180 ,6,'',0,1);






$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Fourth Year, Second Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','10');
$pdf ->Cell(5 ,4,'',0,1);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHIL',0,0);
$pdf ->Cell(15 ,4,'421',0,0);
$pdf ->Cell(90 ,4,'Philosophy of Man with Logic',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'BLAW',0,0);
$pdf ->Cell(15 ,4,'321',0,0);
$pdf ->Cell(90 ,4,'Law on Obligations & Contracts',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FSDY',0,0);
$pdf ->Cell(15 ,4,'2',0,0);
$pdf ->Cell(90 ,4,'Feasibility Study 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'FSDY 1',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MGIS',0,0);
$pdf ->Cell(15 ,4,'321',0,0);
$pdf ->Cell(90 ,4,'Management Information System',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TRSM',0,0);
$pdf ->Cell(15 ,4,'411',0,0);
$pdf ->Cell(90 ,4,'Events Management',0,0);
$pdf ->Cell(10 ,4,'4',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'4',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'HRME',0,0);
$pdf ->Cell(15 ,4,'411',0,0);
$pdf ->Cell(90 ,4,'Convention Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'All MGMT/TRSM',0,1);

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FRLG',0,0);
$pdf ->Cell(15 ,4,'411',0,0);
$pdf ->Cell(90 ,4,'Foreign Language 2 (Mandarin/French)',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(20 ,4,'FRLG 221',0,1);


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'',0,0);
$pdf ->Cell(94 ,6,'TOTAL',0,0,'C');
$pdf ->Cell(11 ,6,'22',0,0);
$pdf ->Cell(9 ,6,'0',0,0);
$pdf ->Cell(10 ,6,'22',0,1);
$pdf ->Cell(180 ,6,'',0,1);








$pdf ->Cell(20 ,5,'',0,1);
$pdf ->Cell(20 ,5,'',0,1);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,4,'',0,0);
$pdf ->Cell(94 ,4,'TOTAL NUMBER OF UNITS',0,0,'C');
$pdf ->Cell(11 ,4,'',0,0);
$pdf ->Cell(9 ,4,'',0,0);
$pdf ->Cell(10 ,4,'186','B',1,1);
$pdf ->Cell(20 ,4,'',0,0);
$pdf ->Cell(94 ,4,'',0,0,'C');
$pdf ->Cell(11 ,4,'',0,0);
$pdf ->Cell(9 ,4,'',0,0);
$pdf ->Cell(10 ,1,'','B',1,1);



$pdf ->Output();
?>
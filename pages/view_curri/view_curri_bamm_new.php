<?php
include '../../includes/session.php';
require ('../fpdf/fpdf.php');

$server = 'localhost';
    $username = 'root';
    $password = '';
    $dbase = 'enrollment';

    $con = new mysqli($server, $username, $password, $dbase);

    date_default_timezone_set('Asia/Manila');

$query = mysqli_query($con,"SELECT *,CONCAT(tbl_students.lastname, ' ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_students LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_students.course_id
    where stud_id = '".$_GET['stud_id']."'");
    $row = mysqli_fetch_array($query);

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
    $pdf->SetFont('Arial','B',12);
    // Dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,5,'Saint Francis of Assisi College',0,0,'C');
    // Line break
    $pdf->Ln(4);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',8,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,3,'96 Bayanan, City of Bacoor, Cavite',0,0,'C');
    // Line break
    $pdf->Ln(6);
    $pdf->SetFont('Arial','B',8,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,3,'FOUR-YEAR CURRICULUM',0,1,'C');
    // Line break

    $pdf->SetFont('Arial','B',8,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,3,'FOR',0,1,'C');
    // Line break

    $pdf->SetFont('Arial','B',8,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,3,'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION',0,1,'C');
        $pdf->Cell(50);
    $pdf->Cell(90,3,'major in MARKETING MANAGEMENT (BSBA-MM)',0,1,'C');
    // Line break


    // Line break

    $pdf->SetFont('Arial','',8,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,3,'(Effective Academic Year 2018-2019)',0,1,'C');
     // Line break
    $pdf->Ln(1);
   



//cell(width,height,text,border,end line,[align])
//student name
$pdf ->Cell(15 ,4,'Name:',0,0); 
$pdf->SetFont('Arial','B','8');
$pdf ->Cell(115 ,4,$row['fullname'],'B',0); //end of line


//student no
$pdf->SetFont('Arial','','8');
$pdf ->Cell(25 ,4,'Student No:',0,0);
$pdf->SetFont('Arial','B','8');
$pdf ->Cell(30 ,4,$row['stud_no'],'B',0); //end of line

//dummy cells
$pdf ->Cell(20 ,4,'',0,1);
$pdf ->Cell(20 ,4,'',0,0);

$pdf->SetFont('Arial','B','8');
$pdf ->Cell(20 ,6,'CODE',0,0);
$pdf ->Cell(90 ,6,'Description',0,0,'C');
$pdf ->Cell(34 ,6,'UNITS',0,0,'C');
$pdf ->Cell(60 ,6,'Pre-Requisites',0,1);


$pdf->SetFont('Arial','BI','9');
//YEAR , SEMESTER
$pdf ->Cell(10 ,4,'',0,0);
$pdf ->Cell(45 ,4,'First Year, First Semester',0,0);

$pdf->SetFont('Arial','','8');
// UNITS
$pdf ->Cell(78 ,4,'',0,0);
$pdf ->Cell(10 ,4,'LEC',0,0);
$pdf ->Cell(10 ,4,'LAB',0,0);
$pdf ->Cell(10 ,4,'TOTAL',0,1);

$pdf->SetFont('Arial','','8.5');
// SUBJECTS
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Komunikasyon sa Akademikong Filipino'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'FILI',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Komunikasyon sa Akademikong Filipino',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,$row1['numgrade'],0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'FILI',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Komunikasyon sa Akademikong Filipino',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
}
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Science, Technology and Society'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Science, Technology and Society',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Science, Technology and Society',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Readings in Philippine History'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Readings in Philippine History',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Readings in Philippine History',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Understanding the Self'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Understanding the Self',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'103',0,0);
$pdf ->Cell(90 ,3.7,'Understanding the Self',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Franciscan Orientation'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CHCL',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Franciscan Orientation',0,0);
$pdf ->Cell(10 ,3.7,'1',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'1',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CHCL',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Franciscan Orientation',0,0);
$pdf ->Cell(10 ,3.7,'1',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'1',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Operations Management (TQM)'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'BUSC',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Operations Management (TQM)',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'BUSC',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Operations Management (TQM)',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Gymnastics'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'PHED',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Gymnastics',0,0);
$pdf ->Cell(10 ,3.7,'2',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'2',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'PHED',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Gymnastics',0,0);
$pdf ->Cell(10 ,3.7,'2',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'2',0,1);

// LAST LINE PER SEM
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'National Service Training Program 1'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'NSTP',0,0);
$pdf ->Cell(15 ,3.7,'1',0,0);
$pdf ->Cell(90 ,3.7,'National Service Training Program 1',0,0);
$pdf ->Cell(10 ,3.7,'3','B',0);
$pdf ->Cell(10 ,3.7,'0','B',0);
$pdf ->Cell(10 ,3.7,'(3)','B',1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'NSTP',0,0);
$pdf ->Cell(15 ,3.7,'1',0,0);
$pdf ->Cell(90 ,3.7,'National Service Training Program 1',0,0);
$pdf ->Cell(10 ,3.7,'3','B',0);
$pdf ->Cell(9 ,3.7,'0','B',0);
$pdf ->Cell(7 ,3.7,'(3)','B',1);
}
}



$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','9');
$pdf ->Cell(102 ,5,'','',0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','9');
$pdf ->Cell(10 ,6,'18',0,0);
$pdf ->Cell(180 ,6,'',0,1);









$pdf->SetFont('Arial','BI','9');
//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'First Year, Second Semester',0,1);
$pdf ->SetLineWidth(.5);
$pdf -> Line(204, 85, 14, 85);//1st yr, 1st sem
$pdf -> Line(204, 126, 14, 126);//1st yr 2nd sem
$pdf -> Line(204, 167, 14, 167);//2nd yr 1st sem
$pdf -> Line(204, 207, 14, 207);//2nd yr 2nd sem
$pdf -> Line(204, 242, 14, 242);//3rd yr 1st sem
$pdf -> Line(204, 277, 14, 277);//3rd yr 2nd sem
$pdf -> Line(204, 312, 14, 312);//4th yr 1st sem
$pdf -> Line(204, 327, 14, 327);//4th yr 2nd sem
$pdf ->SetLineWidth(.1);
// SUBJECTS
$pdf->SetFont('Arial','','8.5');
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Pagbasa at Pagsulat Tungo sa Pananaliksik'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'FILI',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Pagbasa at Pagsulat Tungo sa Pananaliksik',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20 ,3.7,'FILI 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'FILI',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Pagbasa at Pagsulat Tungo sa Pananaliksik',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20, 3.7,'FILI 101',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Mathematics in the Modern World'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'104',0,0);
$pdf ->Cell(90 ,3.7,'Mathematics in the Modern World',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20 ,3.7,'CCGE 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'104',0,0);
$pdf ->Cell(90 ,3.7,'Mathematics in the Modern World',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20, 3.7,'CCGE 101',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Contemporary World'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'105',0,0);
$pdf ->Cell(90 ,3.7,'The Contemporary World',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'105',0,0);
$pdf ->Cell(90 ,3.7,'The Contemporary World',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Living in the I.T. Era'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'ECGE',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Living in the I.T. Era',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'ECGE',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Living in the I.T. Era',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Franciscan Core Values and Culture'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CHCL',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Franciscan Core Values and Culture',0,0);
$pdf ->Cell(10 ,3.7,'1',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'1',0,0);
$pdf ->Cell(20 ,3.7,'CHCL 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CHCL',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Franciscan Core Values and Culture',0,0);
$pdf ->Cell(10 ,3.7,'1',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'1',0,0);
$pdf ->Cell(20 ,3.7,'CHCL 101',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Strategic Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'BUSC',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Strategic Management',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20 ,3.7,'BUSC 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'BUSC',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Strategic Management',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20, 3.7,'BUSC 101',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Individual / Dual Sports'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'PHED',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Individual / Dual Sports',0,0);
$pdf ->Cell(10 ,3.7,'2',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'2',0,0);
$pdf ->Cell(20 ,3.7,'PHED 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'PHED',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Individual / Dual Sports',0,0);
$pdf ->Cell(10 ,3.7,'2',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'2',0,0);
$pdf ->Cell(20 ,3.7,'PHED 101',0,1);

// LAST LINE PER SEM
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'National Service Training Program 2'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'NSTP',0,0);
$pdf ->Cell(15 ,3.7,'2',0,0);
$pdf ->Cell(90 ,3.7,'National Service Training Program 2',0,0);
$pdf ->Cell(10 ,3.7,'3','B',0);
$pdf ->Cell(10 ,3.7,'0','B',0);
$pdf ->Cell(10 ,3.7,'(3)','B',0);
$pdf ->Cell(20 ,3.7,'NSTP 1',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'NSTP',0,0);
$pdf ->Cell(15 ,3.7,'2',0,0);
$pdf ->Cell(90 ,3.7,'National Service Training Program 2',0,0);
$pdf ->Cell(10 ,3.7,'3','B',0);
$pdf ->Cell(9 ,3.7,'0','B',0);
$pdf ->Cell(11 ,3.7,'(3)','B',0);
$pdf ->Cell(20 ,3.7,'NSTP 1',0,1);
}
}


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','9');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','9');
$pdf ->Cell(10 ,6,'18',0,0);
$pdf ->Cell(180 ,6,'',0,1);








$pdf->SetFont('Arial','BI','9');
//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Second Year, First Semester',0,1);

// SUBJECTS
$pdf->SetFont('Arial','','8.5');
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Panitikang Filipino'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'FILI',0,0);
$pdf ->Cell(15 ,3.7,'104',0,0);
$pdf ->Cell(90 ,3.7,'Panitikang Filipino',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'FILI',0,0);
$pdf ->Cell(15 ,3.7,'104',0,0);
$pdf ->Cell(90 ,3.7,'Panitikang Filipino',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20, 3.7,'',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Philippine Literature'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'PLIT',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Philippine Literature',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'PLIT',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Philippine Literature',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20, 3.7,'',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Purposive Communication'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'106',0,0);
$pdf ->Cell(90 ,3.7,'Purposive Communication',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'106',0,0);
$pdf ->Cell(90 ,3.7,'Purposive Communication',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Art Appreciation'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'107',0,0);
$pdf ->Cell(90 ,3.7,'Art Appreciation',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->SetFont('Arial','','8');
$pdf ->Cell(20 ,3.7,'CCGE 104, CCGE 105',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'107',0,0);
$pdf ->Cell(90 ,3.7,'Art Appreciation',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->SetFont('Arial','','8');
$pdf ->Cell(20, 3.7,'CCGE 104, CCGE 105',0,1);

} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Entrepreneurial Mind'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'ECGE',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'The Entrepreneurial Mind',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'ECGE',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'The Entrepreneurial Mind',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Basic Microeconomics'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'BMGT',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Basic Microeconomics',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'BMGT',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Basic Microeconomics',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Business Law (Obligation and Contracts)'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'BMGT',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Business Law (Obligation and Contracts)',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'BMGT',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'Business Law (Obligation and Contracts)',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Team Sports'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'PHED',0,0);
$pdf ->Cell(15 ,3.7,'103',0,0);
$pdf ->Cell(90 ,3.7,'Team Sports',0,0);
$pdf ->Cell(10 ,3.7,'2','B',0);
$pdf ->Cell(10 ,3.7,'0','B',0);
$pdf ->Cell(10 ,3.7,'2','B',0);
$pdf ->Cell(20 ,3.7,'PHED 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'PHED',0,0);
$pdf ->Cell(15 ,3.7,'103',0,0);
$pdf ->Cell(90 ,3.7,'Team Sports',0,0);
$pdf ->Cell(10 ,3.7,'2','B',0);
$pdf ->Cell(10 ,3.7,'0','B',0);
$pdf ->Cell(10 ,3.7,'2','B',0);
$pdf ->Cell(20 ,3.7,'PHED 101',0,1);
}
}

$pdf ->Cell(20 ,5,'',0,0);


$pdf->SetFont('Arial','','9');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','9');
$pdf ->Cell(10 ,6,'23',0,0);
$pdf ->Cell(180 ,6,'',0,1);








$pdf->SetFont('Arial','BI','9');
//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Second Year, Second Semester',0,1);
$pdf->SetFont('Arial','','8.5');

// SUBJECTS
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'World Literature'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'WLIT',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'World Literature',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'WLIT',0,0);
$pdf ->Cell(15 ,3.7,'102',0,0);
$pdf ->Cell(90 ,3.7,'World Literature',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20 ,3.7,'',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Ethics'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'108',0,0);
$pdf ->Cell(90 ,3.7,'Ethics',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20 ,3.7,'CCGE 103',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'CCGE',0,0);
$pdf ->Cell(15 ,3.7,'108',0,0);
$pdf ->Cell(90 ,3.7,'Ethics',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20 ,3.7,'CCGE 103',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Reading Visual Art'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'ECGE',0,0);
$pdf ->Cell(15 ,3.7,'103',0,0);
$pdf ->Cell(90 ,3.7,'Reading Visual Art',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->SetFont('Arial','','8');
$pdf ->Cell(20 ,3.7,'CCGE 106, CCGE 107',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'ECGE',0,0);
$pdf ->Cell(15 ,3.7,'103',0,0);
$pdf ->Cell(90 ,3.7,'Reading Visual Art',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->SetFont('Arial','','8');
$pdf ->Cell(20, 3.7,'CCGE 106, CCGE 107',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Rizal\'s Life, Works & Writings'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'RIZL',0,0);
$pdf ->Cell(15 ,3.7,'100',0,0);
$pdf ->Cell(90 ,3.7,'Rizal\'s Life, Works & Writings',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20 ,3.7,'CCGE 102',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){

$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'RIZL',0,0);
$pdf ->Cell(15 ,3.7,'100',0,0);
$pdf ->Cell(90 ,3.7,'Rizal\'s Life, Works & Writings',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20, 3.7,'CCGE 102',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Income Taxation'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'BMGT',0,0);
$pdf ->Cell(15 ,3.7,'103',0,0);
$pdf ->Cell(90 ,3.7,'Income Taxation',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'BMGT',0,0);
$pdf ->Cell(15 ,3.7,'103',0,0);
$pdf ->Cell(90 ,3.7,'Income Taxation',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Social Responsibility and Good Governance'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'BMGT',0,0);
$pdf ->Cell(15 ,3.7,'104',0,0);
$pdf ->Cell(90 ,3.7,'Social Responsibility and Good Governance',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'BMGT',0,0);
$pdf ->Cell(15 ,3.7,'104',0,0);
$pdf ->Cell(90 ,3.7,'Social Responsibility and Good Governance',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Professional Salesmanship'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'MMGT',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Professional Salesmanship',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'MMGT',0,0);
$pdf ->Cell(15 ,3.7,'101',0,0);
$pdf ->Cell(90 ,3.7,'Professional Salesmanship',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(10 ,3.7,'0',0,0);
$pdf ->Cell(10 ,3.7,'3',0,0);
$pdf ->Cell(20, 3.7,'',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Sports Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,'','B',0);
$pdf ->Cell(15 ,3.7,'PHED',0,0);
$pdf ->Cell(15 ,3.7,'104',0,0);
$pdf ->Cell(90 ,3.7,'Sports Management',0,0);
$pdf ->Cell(10 ,3.7,'2','B',0);
$pdf ->Cell(10 ,3.7,'0','B',0);
$pdf ->Cell(10 ,3.7,'2','B',0);
$pdf ->Cell(20 ,3.7,'PHED 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,3.7,'',0,0);
$pdf ->Cell(10 ,3.7,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,3.7,'PHED',0,0);
$pdf ->Cell(15 ,3.7,'104',0,0);
$pdf ->Cell(90 ,5,'Sports Management',0,0);
$pdf ->Cell(10 ,3.7,'2','B',0);
$pdf ->Cell(10 ,3.7,'0','B',0);
$pdf ->Cell(10 ,3.7,'2','B',0);
$pdf ->Cell(20 ,3.7,'PHED 101',0,1);
}
}

$pdf ->Cell(20 ,5,'',0,0);


$pdf->SetFont('Arial','','9');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','9');
$pdf ->Cell(10 ,6,'23',0,0);
$pdf ->Cell(180 ,6,'',0,1);

$pdf->SetFont('Arial','BI','9');
//YEAR, SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Third Year, First Semester',0,1);


// SUBJECTS

$pdf->SetFont('Arial','','8.5');
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Human Resource Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'BMGT',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Human Resource Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'BUSC 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'BMGT',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Human Resource Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'BUSC 101',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'International Business Agreements'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'BMGT',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'International Business Agreements',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'BMGT 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'BMGT',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'International Business Agreements',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'BMGT 101',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Marketing Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Marketing Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'BMGT 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Marketing Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'BMGT 101',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Distribution Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Distribution Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Distribution Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Advertising'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Advertising',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Advertising',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Marketing Research'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Marketing Research',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Marketing Research*',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
}
}

$pdf ->Cell(20 ,5,'',0,0);


$pdf->SetFont('Arial','','9');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','9');
$pdf ->Cell(10 ,6,'18',0,0);
$pdf ->Cell(180 ,6,'',0,1);




$pdf->SetFont('Arial','BI','9');
//YEAR, SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Third Year, Second Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','8.5');
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Fundamentals of Leadership and Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'LEMA',0,0);
$pdf ->Cell(15 ,4,'100',0,0);
$pdf ->Cell(90 ,4,'Fundamentals of Leadership and Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'LEMA',0,0);
$pdf ->Cell(15 ,4,'100',0,0);
$pdf ->Cell(90 ,4,'Fundamentals of Leadership and Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Product Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Product Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'FMGT101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Product Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'FMGT101',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Retail Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Retail Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'FMGT 103',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Retail Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'FMGT103',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Business Research 1'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'BMGT',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Business Research 1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MMGT 105',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'BMGT',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Business Research 1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MMGT 105',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Consumer Behavior'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Consumer Behavior',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Consumer Behavior',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Services Marketing'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Services Marketing',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Services Marketing',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(20 ,4,'3rd Year Standing',0,1);
}
}

$pdf ->Cell(20 ,5,'',0,0);


$pdf->SetFont('Arial','','9');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','9');
$pdf ->Cell(10 ,6,'18',0,0);
$pdf ->Cell(180 ,6,'',0,1);








$pdf->SetFont('Arial','BI','9');

$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Fourth Year, First Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','8.5');
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Pre-Internship'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NTRN',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Pre-Internship',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'4th Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'NTRN',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Pre-Internship',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'4th Year Standing',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Business Research 2 (Thesis Writing)'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'BMGT',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->Cell(90 ,4,'Business Research 2 (Thesis Writing)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'BMGT 107',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'BMGT',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->Cell(90 ,4,'Business Research 2 (Thesis Writing)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'BMGT 107',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Pricing Strategy'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'110',0,0);
$pdf ->Cell(90 ,4,'Pricing Strategy',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MMGT 107',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MMGT',0,0);
$pdf ->Cell(15 ,4,'110',0,0);
$pdf ->Cell(90 ,4,'Pricing Strategy',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'MMGT 107',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Franchising'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Franchising',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'4th Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Franchising',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'4th Year Standing',0,1);

} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Special Topics in Marketing Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Special Topics in Marketing Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'4th Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Special Topics in Marketing Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'4th Year Standing',0,1);
} 
}
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Sales Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Sales Management',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(20 ,4,'4th Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'MELE',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Sales Management',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(20 ,4,'4th Year Standing',0,1);
}
}

$pdf ->Cell(20 ,5,'',0,0);


$pdf->SetFont('Arial','','9');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','9');
$pdf ->Cell(10 ,6,'18',0,0);
$pdf ->Cell(180 ,6,'',0,1);





$pdf->SetFont('Arial','BI','9');
//YEAR, SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Fourth Year, Second Semester',0,1);


// SUBJECTS

$pdf->SetFont('Arial','','8.5');
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Internship'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NTRN',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Internship',0,0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'12','B',0);
$pdf ->Cell(10 ,4,'12','B',0);
$pdf ->Cell(20 ,4,'NTRN 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'NTRN',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Internship',0,0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'12','B',0);
$pdf ->Cell(10 ,4,'12','B',0);
$pdf ->Cell(20 ,4,'NTRN 101',0,1);
}
}

$pdf ->Cell(20 ,5,'',0,0);


$pdf->SetFont('Arial','','9');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(33 ,5,'TOTAL',0,0);
$pdf->SetFont('Arial','B','9');
$pdf ->Cell(10 ,5,'12',0,0);

$pdf ->Cell(180 ,6,'',0,1);



$pdf ->Cell(20 ,5,'',0,1);

$pdf->SetFont('Arial','B','9');
$pdf ->Cell(95 ,3.5,'',0,0);
$pdf ->Cell(34 ,3.5,'TOTAL NUMBER OF UNITS',0,0,'C');
$pdf ->Cell(16 ,3.5,'',0,0);
$pdf ->Cell(9 ,3.5,'',0,0);
$pdf ->Cell(10 ,3.5,'154','',1,0);



$pdf->SetFont('Arial','I','9');
$pdf ->Cell(95 ,3.5,'',0,0);
$pdf ->Cell(34 ,3.5,'(Including 6 units NSTP)',0,0,'C');


$pdf ->Output();
?>
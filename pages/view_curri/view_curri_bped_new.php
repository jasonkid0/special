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
$pdf->SetRightMargin(8);
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
    $pdf->Cell(90,4,'BACHELOR OF PHYSICAL EDUCATION',0,1,'C');

    // Line break

    $pdf->SetFont('Arial','',10,'C');
    // dummy cell
    $pdf->Cell(50);
    // //cell(width,height,text,border,end line,[align])
    $pdf->Cell(90,4,'(Effective Academic Year 2019-2020)',0,1,'C');
     // Line break
    $pdf->Ln(4);
   



//cell(width,height,text,border,end line,[align])
//student name
$pdf ->Cell(15 ,5,'Name:',0,0); 
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(115 ,5,$row['fullname'],'B',0); //end of line


//student no
$pdf->SetFont('Arial','','10');
$pdf ->Cell(25 ,5,'Student No:',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(30 ,5,$row['stud_no'],'B',1); //end of line

//dummy cells
$pdf ->Cell(20 ,5,'',0,1);
$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(20 ,5,'CODE',0,0);
$pdf ->Cell(90 ,5,'Description',0,0,'C');
$pdf ->Cell(34 ,5,'UNITS',0,0,'C');
$pdf ->Cell(60 ,5,'Pre-Requisites',0,1);

//YEAR , SEMESTER
$pdf ->Cell(45 ,5,'First Year, First Semester',0,0);
// UNITS
$pdf ->Cell(87 ,5,'',0,0);
$pdf ->Cell(10 ,5,'LEC',0,0);
$pdf ->Cell(10 ,5,'LAB',0,0);
$pdf ->Cell(10 ,5,'TOTAL',0,1);






$pdf->SetFont('Arial','','9');
// SUBJECTS

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Science, Technology and Society'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Science, Technology and Society',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Science, Technology and Society',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Readings in Philippine History'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Readings in Philippine History',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Readings in Philippine History',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}


$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Understanding the Self'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Understanding the Self',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Understanding the Self',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}


$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Komunikasyon sa Akademikong Filipino'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FILI',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Komunikasyon sa Akademikong Filipino',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'FILI',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Komunikasyon sa Akademikong Filipino',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}


$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Franciscan Orientation'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHCL',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Franciscan Orientation',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CHCL',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Franciscan Orientation',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);
}}


$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Child and Adolescent Learners and Learning Principles'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TCED',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'The Child and Adolescent Learners and Learning Principles',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'TCED',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'The Child and Adolescent Learners and Learning Principles',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Philosophical and Socio-anthropological Foundations of PE and Sports'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf->SetFont('Arial','','8');
$pdf ->Cell(90 ,4,'Philosophical and Socio-anthropological Foundations of PE and Sports',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf->SetFont('Arial','','8');
$pdf ->Cell(90 ,4,'Philosophical and Socio-anthropological Foundations of PE and Sports',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);



}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Anatomy and Physiology of Human Movement'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Anatomy and Physiology of Human Movement',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Anatomy and Physiology of Human Movement',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Gymnastics'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Gymnastics',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'2',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Gymnastics',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'2',0,1);

// LAST LINE PER SEM

}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'National Service Training Program 1'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NSTP',0,0);
$pdf ->Cell(15 ,4,'1',0,0);
$pdf ->Cell(90 ,4,'National Service Training Program 1',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(9 ,4,'0','B',0);
$pdf ->Cell(7 ,4,'(3)','B',1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'NSTP',0,0);
$pdf ->Cell(15 ,4,'1',0,0);
$pdf ->Cell(90 ,4,'National Service Training Program 1',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(9 ,4,'0','B',0);
$pdf ->Cell(7 ,4,'(3)','B',1);
}}



$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);

$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'24',0,1);
$pdf ->Cell(180 ,6,'',0,1);
$pdf ->Cell(180 ,6,'',0,1);









//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'First Year, Second Semester',0,1);


// SUBJECTS
$pdf->SetFont('Arial','','9');

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Mathematics in the Modern World'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Mathematics in the Modern World',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Mathematics in the Modern World',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Contemporary World'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'The Contemporary World',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'The Contemporary World',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Living in the I.T. Era'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECGE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Living in the I.T. Era',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'CCGE 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'ECGE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Living in the I.T. Era',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'CCGE 101',0,1);



}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Pagbasa at Pagsulat tungo sa Pananaliksik'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FILI',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Pagbasa at Pagsulat tungo sa Pananaliksik',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'FILI 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'FILI',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Pagbasa at Pagsulat tungo sa Pananaliksik',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'FILI 101',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Franciscan Core Values and Culture'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CHCL',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Franciscan Core Values and Culture',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(20 ,4,'CHCL 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CHCL',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Franciscan Core Values and Culture',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(20 ,4,'CHCL 101',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Teaching Profession'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TCED',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'The Teaching Profession',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'TCED',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'The Teaching Profession',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Facilitating Learner-Centered Teaching'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Facilitating Learner-Centered Teaching',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'TCED 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Facilitating Learner-Centered Teaching',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'TCED 101',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Physiology of Exercise and Physical Activity'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Physiology of Exercise and Physical Activity',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Physiology of Exercise and Physical Activity',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Individual/ Dual Sports'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Individual/ Dual Sports',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'PHED 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Individual/ Dual Sports',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(20 ,4,'PHED 101',0,1);


// LAST LINE PER SEM
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'National Service Training Program 2'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'NSTP',0,0);
$pdf ->Cell(15 ,4,'2',0,0);
$pdf ->Cell(90 ,4,'National Service Training Program 2',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(9 ,4,'0','B',0);
$pdf ->Cell(11 ,4,'(3)','B',0);
$pdf ->Cell(20 ,4,'NSTP 1',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'NSTP',0,0);
$pdf ->Cell(15 ,4,'2',0,0);
$pdf ->Cell(90 ,4,'National Service Training Program 2',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(9 ,4,'0','B',0);
$pdf ->Cell(11 ,4,'(3)','B',0);
$pdf ->Cell(20 ,4,'NSTP 1',0,1);
}}

$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'24',0,1);
$pdf ->Cell(180 ,6,'',0,1);
$pdf ->Cell(180 ,6,'',0,1);










//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Second Year, First Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','9');

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Purposive Communication'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Purposive Communication',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf->SetFont('Arial','','9');
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Purposive Communication',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Art Appreciation'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Art Appreciation',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Art Appreciation',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Entrepreneurial Mind'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECGE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'The Entrepreneurial Mind',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20,4,'CCGE 104, CCGE 105',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'ECGE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'The Entrepreneurial Mind',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20,4,'CCGE 104, CCGE 105',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Masining na Pagpapahayag'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FILI',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Masining na Pagpapahayag',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20,4,'FILI 102',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'FILI',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Masining na Pagpapahayag',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20,4,'FILI 102',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Teacher and the Community, School Culture and Org. Leadership'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TCED',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->SetFont('Arial','','8');
$pdf ->Cell(90 ,4,'The Teacher and the Community, School Culture and Org. Leadership',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'TCED',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->SetFont('Arial','','8');
$pdf ->Cell(90 ,4,'The Teacher and the Community, School Culture and Org. Leadership',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


$pdf ->SetFont('Arial','','9');


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Assessment in Learning 1'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Assessment in Learning 1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Assessment in Learning 1',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Principles of Motor Control and Learning of Exercise, Sports and Dance'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->SetFont('Arial','','7.8');
$pdf ->Cell(90 ,4,'Principles of Motor Control and Learning of Exercise, Sports and Dance',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->SetFont('Arial','','7.8');
$pdf ->Cell(90 ,4,'Principles of Motor Control and Learning of Exercise, Sports and Dance',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);



}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Technology for Teaching in the Elementary Grades'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Technology for Teaching in the Elementary Grades',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'105',0,0);
$pdf ->Cell(90 ,4,'Technology for Teaching in the Elementary Grades',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Curriculum and Assessment for Physical Ed. & Health Ed.'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Curriculum and Assessment for Physical Ed. & Health Ed.',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'106',0,0);
$pdf ->Cell(90 ,4,'Curriculum and Assessment for Physical Ed. & Health Ed.',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);


}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Team Sports'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Team Sports',0,0);
$pdf ->Cell(10 ,4,'2','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'2','B',1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Team Sports',0,0);
$pdf ->Cell(10 ,4,'2','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'2','B',1);
}
}

$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'29',0,1);
$pdf ->Cell(180 ,6,'',0,1);
$pdf ->Cell(180 ,6,'',0,1);






//YEAR , SEMESTER
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Second Year, Second Semester',0,1);
$pdf->SetFont('Arial','','9');

// SUBJECTS
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Ethics'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->Cell(90 ,4,'Ethics',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'CCGE 103',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'CCGE',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->Cell(90 ,4,'Ethics',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'CCGE 103',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Reading Visual Art'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ECGE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Reading Visual Art',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20, 4,'CCGE 106, CCGE 107',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'ECGE',0,0);
$pdf ->Cell(15 ,4,'103',0,0);
$pdf ->Cell(90 ,4,'Reading Visual Art',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'CCGE 106, CCGE 107',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Rizal\'s Life, Works & Writings'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RIZL',0,0);
$pdf ->Cell(15 ,4,'100',0,0);
$pdf ->Cell(90 ,4,'Rizal\'s Life, Works & Writings',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20, 4,'CCGE 102',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){

$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'RIZL',0,0);
$pdf ->Cell(15 ,4,'100',0,0);
$pdf ->Cell(90 ,4,'Rizal\'s Life, Works & Writings',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'CCGE 102',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Foundation of Special and Inclusive Education'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TCED',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Foundation of Special and Inclusive Education',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'TCED',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Foundation of Special and Inclusive Education',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Assessment in Learning 2'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Assessment in Learning 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20, 4,'PKED 106',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Assessment in Learning 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'PKED 106',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Process of Teaching PE & Health Education'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Process of Teaching PE & Health Education',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'107',0,0);
$pdf ->Cell(90 ,4,'Process of Teaching PE & Health Education',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Philippine Traditional Games'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'115',0,0);
$pdf ->Cell(90 ,4,'Philippine Traditional Games',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'115',0,0);
$pdf ->Cell(90 ,4,'Philippine Traditional Games',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Applied Motor Control and Learning of Exercise, Sports and Dance'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'109',0,0);
$pdf ->SetFont('Arial','','8.5');
$pdf ->Cell(90 ,4,'Applied Motor Control and Learning of Exercise, Sports and Dance',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'109',0,0);
$pdf ->SetFont('Arial','','8.5');
$pdf ->Cell(90 ,4,'Applied Motor Control and Learning of Exercise, Sports and Dance',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Introduction to Research'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RESE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Introduction to Research',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'RESE',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'Introduction to Research',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Sports Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Sports Management',0,0);
$pdf ->Cell(10 ,4,'2','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'2','B',1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PHED',0,0);
$pdf ->Cell(15 ,4,'104',0,0);
$pdf ->Cell(90 ,4,'Sports Management',0,0);
$pdf ->Cell(10 ,4,'2','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'2','B',1);
}}


$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'27',0,1);
$pdf ->Cell(180 ,6,'',0,1);
$pdf ->Cell(180 ,6,'',0,1);
$pdf ->Cell(180 ,6,'',0,1);


$pdf->Cell(180,10,'',0,1);
$pdf->Cell(180,10,'',0,1);
$pdf->Cell(180,10,'',0,1);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Third Year, First Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','9');
$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Technology for Teaching and Learning 1'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->Cell(90 ,4,'Technology for Teaching and Learning 1',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->Cell(90 ,4,'Technology for Teaching and Learning 1',0,0);
$pdf ->Cell(10 ,4,'2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Teacher and the School Curriculum'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'109',0,0);
$pdf ->Cell(90 ,4,'The Teacher and the School Curriculum',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'109',0,0);
$pdf ->Cell(90 ,4,'The Teacher and the School Curriculum',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Building and Enhancing New Literacies Across the Curriculum'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'110',0,0);
$pdf ->Cell(90 ,4,'Building and Enhancing New Literacies Across the Curriculum',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'PKED',0,0);
$pdf ->Cell(15 ,4,'110',0,0);
$pdf ->Cell(90 ,4,'Building and Enhancing New Literacies Across the Curriculum',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'General Elective 1 (Contemporary Issues in P.E., Health and Sports)'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'GEED',0,0);
$pdf ->Cell(15 ,4,'',0,0);
$pdf->SetFont('Arial','',8);
$pdf ->Cell(90 ,4,'General Elective 1 (Contemporary Issues in P.E., Health and Sports)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20, 4,'Third Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'GEED',0,0);
$pdf ->Cell(15 ,4,'',0,0);
$pdf->SetFont('Arial','',8);
$pdf ->Cell(90 ,4,'General Elective 1(Contemporary issues in P.E, Health and Sports)',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'Third Year Standing',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Movement Education'");
if(mysqli_num_rows($squery1)== 0){
$pdf->SetFont('Arial','',9);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'110',0,0);
$pdf ->Cell(90 ,4,'Movement Education',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf->SetFont('Arial','',9);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'110',0,0);
$pdf ->Cell(90 ,4,'Movement Education',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Philippine Traditional Dances'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Philippine Traditional Dances',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->Cell(90 ,4,'Philippine Traditional Dances',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'International Dance and Other Forms'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'112',0,0);
$pdf ->Cell(90 ,4,'International Dance and Other Forms',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'112',0,0);
$pdf ->Cell(90 ,4,'International Dance and other Forms',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Individual and Dual Sports (Racket Sports, Athletics, Martial Arts)'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'113',0,0);
$pdf ->SetFont('Arial','','8.5');
$pdf ->Cell(90 ,4,'Individual and Dual Sports (Racket Sports, Athletics, Martial Arts)',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'113',0,0);
$pdf->SetFont('Arial','','8.5');
$pdf ->Cell(90 ,4,'Individual and Dual Sports (Racket Sports, Atheletics, Martial Arts)',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Team Sports'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'114',0,0);
$pdf ->Cell(90 ,4,'Team Sports',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'114',0,0);
$pdf ->Cell(90 ,4,'Team Sports ',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',1);
}}



$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'27',0,1);
$pdf ->Cell(180 ,6,'',0,1);






$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Third Year, Second Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','9');
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
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'LEMA',0,0);
$pdf ->Cell(15 ,4,'100',0,0);
$pdf ->Cell(90 ,4,'Fundamentals of Leadership and Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Research in Early Childhood Education'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'RESE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Research in Early Childhood Education',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20, 4,'RESE 101',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'RESE',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'Research in Early Childhood Education',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20 ,4,'RESE 101',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Franciscan Educator 1'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FRED',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'The Franciscan Educator 1',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'FRED',0,0);
$pdf ->Cell(15 ,4,'101',0,0);
$pdf ->Cell(90 ,4,'The Franciscan Educator 1',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'General Elective 2'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'GEED',0,0);
$pdf ->Cell(15 ,4,'',0,0);
$pdf ->Cell(90 ,4,'General Elective 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20, 4,'Third Year Standing',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'GEED',0,0);
$pdf ->Cell(15 ,4,'',0,0);
$pdf ->Cell(90 ,4,'General Elective 2',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(45 ,4,'Third Year Standing',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Technology for Teaching and Learning 2 (Tech. App in Teaching PE and Health Ed.'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->SetFont('Arial','','6.5');
$pdf ->Cell(90 ,4,'Technology for Teaching and Learning 2 (Tech. App in Teaching PE and Health Ed.',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(20, 4,'PKED 108',0,1);
$pdf ->Cell(45, 4,'',0,0);
$pdf ->SetFont('Arial','','6.5');
$pdf ->Cell(75,4,' incl. Inst. Mats. Dev\'t.)',0,0);
$pdf ->Cell(20,4,'',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'108',0,0);
$pdf ->SetFont('Arial','','6.5');
$pdf ->Cell(90 ,4,'Technology for Teaching and Learning 2 (Tech. App. in Teaching PE and Health Ed.',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(45 ,4,'PKED 108',0,1);
$pdf ->Cell(45 ,4,'',0,0);
$pdf ->SetFont('Arial','','6.5');
$pdf ->Cell(75 ,4,' incl. Inst. Mats. Dev\'t.)',0,0);
$pdf ->Cell(20 ,4,'',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Swimming and Aquatics'");
if(mysqli_num_rows($squery1)== 0){
    $pdf ->SetFont('Arial','','9');
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'116',0,0);
$pdf ->Cell(90 ,4,'Swimming and Aquatics',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'116',0,0);
$pdf ->Cell(90 ,4,'Swimming and Aquatics',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Coordinated School Health Program'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'117',0,0);
$pdf ->Cell(90 ,4,'Coordinated School Health Program',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'117',0,0);
$pdf ->Cell(90 ,4,'Coordinated School Health Program',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Personal, Community and Environmental Health'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'118',0,0);
$pdf ->Cell(90 ,4,'Personal, Community and Environmental Health',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'118',0,0);
$pdf ->Cell(90 ,4,'Personal, Community and Environmental Health',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Emergency Preparedness and Safety Management'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'119',0,0);
$pdf ->Cell(90 ,4,'Emergency Preparedness and Safety Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'119',0,0);
$pdf ->Cell(90 ,4,'Emergency Preparedness and Safety Management',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Drug, Education, Consumer Health Education and Healthy Eating'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'120',0,0);
$pdf ->SetFont('Arial','','8.5');
$pdf ->Cell(90 ,4,'Drug, Education, Consumer Health Education and Healthy Eating',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'SCPE',0,0);
$pdf ->Cell(15 ,4,'120',0,0);
$pdf->SetFont('Arial','','8.5');
$pdf ->Cell(90 ,4,'Drug Education, Consumer Health Education and Healthy Eating',0,0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',1);
}}



$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(32 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'28',0,1);
$pdf ->Cell(180 ,6,'',0,1);










$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Fourth Year, First Semester',0,1);

// SUBJECTS

$pdf->SetFont('Arial','','9');


$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'The Franciscan Educator 2'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'FRED',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'The Franciscan Educator 2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'FRED',0,0);
$pdf ->Cell(15 ,4,'102',0,0);
$pdf ->Cell(90 ,4,'The Franciscan Educator 2',0,0);
$pdf ->Cell(10 ,4,'1',0,0);
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'1',0,1);

$pdf->SetFont('Arial','','9');

}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Field Study 1 (Observations of Teaching-Learning in Actual School Environment)'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ELED',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf ->SetFont('Arial','','7');
$pdf ->Cell(90 ,4,'Field Study 1 (Observations of Teaching-Learning in Actual School Environment)',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'3',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'ELED',0,0);
$pdf ->Cell(15 ,4,'111',0,0);
$pdf->SetFont('Arial','','7');
$pdf ->Cell(90 ,4,'Field Study 1 (Observations of Teaching-Learning in Actual School Environment)',0,0);
$pdf->SetFont('Arial','','9');
$pdf ->Cell(10 ,4,'0',0,0);
$pdf ->Cell(10 ,4,'3',0,0);
$pdf ->Cell(10 ,4,'3',0,1);

}}

$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Field Study 2 (Participation and Teaching Assistantship)'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'ELED',0,0);
$pdf ->Cell(15 ,4,'112',0,0);
$pdf ->SetFont('Arial','','9');
$pdf ->Cell(90 ,4,'Field Study 2 (Participation and Teaching Assistantship)',0,0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'3','B',1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf->SetFont('Arial','','9');
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'ELED',0,0);
$pdf ->Cell(15 ,4,'112',0,0);
$pdf ->Cell(90 ,4,'Field Study 2 (Participation and Teaching Assistantship)',0,0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'3','B',0);
$pdf ->Cell(10 ,4,'3','B',1);
}}




$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(33 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'7',0,1);
$pdf ->Cell(180 ,6,'',0,1);




$pdf ->Cell(10 ,5,'',0,0);
$pdf ->Cell(45 ,5,'Fourth Year, Second Semester',0,1);

// SUBJECTS
$pdf->SetFont('Arial','','9');



$squery1 = mysqli_query($con, "SELECT * ,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname, tbl_subjects_new.subj_code, tbl_subjects_new.subj_desc, tbl_enrolled_subjects.numgrade
          FROM tbl_enrolled_subjects
          LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_enrolled_subjects.stud_id
          LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id WHERE tbl_students.stud_id = '".$_GET['stud_id']."' AND subj_desc = 'Teaching Internship'");
if(mysqli_num_rows($squery1)== 0){
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,'','B',0);
$pdf ->Cell(15 ,4,'TIED',0,0);
$pdf ->Cell(15 ,4,'113',0,0);
$pdf ->Cell(90 ,4,'Teaching Internship',0,0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'6','B',0);
$pdf ->Cell(10 ,4,'6','B',0);
$pdf ->Cell(20 ,4,'ELED 111 & 112',0,1);
} else {
   while ($row1= mysqli_fetch_array($squery1)){
$pdf ->Cell(5 ,4,'',0,1);
$pdf ->Cell(5 ,4,'',0,0);
$pdf ->Cell(10 ,4,$row1['numgrade'],'B',0);
$pdf ->Cell(15 ,4,'TIED',0,0);
$pdf ->Cell(15 ,4,'113',0,0);
$pdf ->Cell(90 ,4,'Teaching Internship',0,0);
$pdf ->Cell(10 ,4,'0','B',0);
$pdf ->Cell(10 ,4,'6','B',0);
$pdf ->Cell(10 ,4,'6','B',0);
$pdf ->Cell(20 ,4,'ELED 111 & 112',0,1);
}}




$pdf ->Cell(20 ,5,'',0,0);

$pdf->SetFont('Arial','','10');
$pdf ->Cell(102 ,5,'',0,0);
$pdf ->Cell(33 ,6,'TOTAL',0,0);
$pdf->SetFont('Arial','B','10');
$pdf ->Cell(10 ,6,'6',0,1);
$pdf ->Cell(180 ,6,'',0,1);






$pdf ->Cell(20 ,5,'',0,1);


$pdf->SetFont('Arial','B','10');
$pdf ->Cell(95 ,4,'',0,0);
$pdf ->Cell(34 ,4,'TOTAL NUMBER OF UNITS',0,0,'C');
$pdf ->Cell(16 ,4,'',0,0);
$pdf ->Cell(9 ,4,'',0,0);
$pdf ->Cell(10 ,4,'178','',1,1);
$pdf ->Cell(20 ,4,'',0,0);
$pdf ->Cell(94 ,4,'',0,0,'C');
$pdf ->Cell(11 ,4,'',0,0);
$pdf ->Cell(9 ,4,'',0,0);
$pdf ->Cell(10 ,1,'','',1,1);



$pdf ->Output();
?>
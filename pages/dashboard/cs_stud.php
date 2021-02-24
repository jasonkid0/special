<?php 
include '../../includes/session.php';

include '../../includes/db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../includes/head_css.php'; ?>

<body class="">
  <div class="wrapper ">
    <?php include '../../includes/sidebar.php'; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include '../../includes/top_nav.php'; ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <?php 
                    $count = mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '1' AND remark = 'Approved'")) or die(mysql_error());
                    $count0 = mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '1' AND remark = 'Approved' AND status='Old'")) or die(mysql_error());
                    $count01 = mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '1' AND remark = 'Approved' AND status='New'")) or die(mysql_error());
                    ?>
                        <span style="float:right; ">
                        <!---   <a href="borrowed_book.php"><button class="btn btn-primary"><i class="fa fa-info"></i> All Records (<?php /// echo $count['total']; ?>)</button></a> -->
                            <button class="btn btn-success"><i class="fa fa-info"></i> BSCS (<?php echo $count['total']; ?>)</button>
                            <button class="btn btn-primary"><i class="fa fa-info"></i> OLD (<?php echo $count0['total']; ?>)</button>
                            <button class="btn btn-info"><i class="fa fa-info"></i> NEW (<?php echo $count01['total']; ?>)</button>
                        </span>
                   
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
<?php check_message(); ?>
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title mt-0">Lists of Enrolled Stundents in BSCS for A.Y <?php echo $_SESSION['active_acad'].' , '.$_SESSION['active_sem']; ?></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="example1">
                      <thead class="">
                        <th>STUD ID NO.</th>
                        <th>NAME</th>
                        <th>COURSE</th>
                        <th>YEAR LEVEL</th>
                        <th>STATUS</th>
                        <th>DATE APPLIED</th>
                        <th>REMARKS</th>
                       <?php if($_SESSION['role'] == 'Student' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Accounting'){

}else{
  echo'<th>OPTION</th>';
} ?>
                      </thead>
                      <tbody>
                        <?php
                                $query = mysqli_query($db, "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname 
                                  FROM tbl_schoolyears 
                                  LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id
                                  WHERE ay_id = '$_SESSION[active_acad]' and sem_id = '$_SESSION[active_sem]' and department_id= '3' and remark='Approved'") or die(mysqli_error($db));
                                while ($row= mysqli_fetch_array ($query)){
                                    $id=$row['sy_id'];
                                    $stud_id=$row['stud_id'];
                                    ?><tr><form method="POST" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                                    <td><input type="hidden" name="sy_id" value="<?php echo $id; ?>"><?php echo $row['stud_no']; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['course']; ?></td>
                                    <td><?php echo $row['year_level']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['date_enrolled']; ?></td>
                                    <td><input type="hidden" name="remark" value="Approved"><?php echo $row['remark']; ?></td>
                                    <?php if($_SESSION['role'] == 'Student' || $_SESSION['role'] == 'President' || $_SESSION['role'] == 'Accounting'){

}else{ ?>
                                    <td>
                                    <?php if ($row['remark'] == 'Pending') {
                                      echo'<button type="submit" class="btn btn-success" name="submit">
                                    <i class="fa fa-check"></i> Approve</button>';}
                                          else{
                                            echo '';
                                          
                                    } ?>
                                      
                                      
                                    <a class="btn btn-primary" for="ViewAdmin" href="../forms/pre.php<?php echo '?stud_id='.$stud_id; ?>">
                                    <i class="fas fa-eye fa-lg"></i> Pre-enrollment</a>
                                    <a class="btn btn-default" for="ViewAdmin" href="../forms/reg_form.php<?php echo '?stud_id='.$stud_id; ?>">
                                    <i class="fa fa-eye"></i> Reg. Form</a>
  
                                   </td><?php } ?></form>
                                </tr>
                                <?php } ?>
                      </tbody>
                      <?php if (isset($_POST['submit'])) {
                        $sy_id = mysqli_real_escape_string($db,$_POST['sy_id']);
                        $remark = mysqli_real_escape_string($db,$_POST['remark']);

                        $sql = mysqli_query($db, "UPDATE tbl_schoolyears SET remark = '$remark' WHERE sy_id = '$sy_id'")or die(mysqli_error($db)); 

        if($sql == true){
              message("Student has been Approved","success");
              header("Refresh:0");
                }
                      } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include '../../includes/footer.php';?>
    </div>
  </div>
<?php include '../../includes/script.php'; ?>
</body>

</html>

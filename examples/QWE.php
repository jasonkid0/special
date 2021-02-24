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
<?php check_message(); ?>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title ">Subjects for BSCS for all Year Level </h4>
                  <p class="card-category"><h4> A.Y. : <?php echo $_SESSION['active_acad'].' - '.$_SESSION['active_sem']; ?></h4></p>
                </div>
                <div class="card-body">
                 <form method="POST" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                    <div class="table-responsive">
                    <table class="table table-stripped table-condensed">
                      <thead class=" text-primary">
                        <th>Course Code</th>
                        <th>Course Description</th>
                        <th>Unit(s)</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Instructor</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
<?php 
include '../../includes/db.php';

$q = mysqli_query($db,"SELECT *, tbl_semesters.sem_id,tbl_year_levels.year_id,tbl_courses.course_id,tbl_courses.department_id,tbl_departments.department_id FROM tbl_subjects_new
      LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_subjects_new.course_id
      LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
      LEFT JOIN tbl_semesters ON tbl_semesters.sem_id = tbl_subjects_new.sem_id
      LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_subjects_new.year_id where tbl_departments.department_name = '$_SESSION[department]' and tbl_courses.course_id = '1' and tbl_semesters.semester = '$_SESSION[active_sem]' ORDER BY tbl_year_levels.year_level, tbl_semesters.semester") or die(mysqli_error($db));
while($row = mysqli_fetch_array ($q)){
  $id=$row['subj_id']; ?>
                        <tr>
                          <td><?php echo $row['subj_code']; ?></td>
                          <td><?php echo $row['subj_desc']; ?></td>
                          <td><?php echo $row['unit_total']; ?></td>
                          <td>day</td>
                          <td>time</td>
                          <td>room</td>
                          <td>instructor</td>
                          <td><a href="" class="btn btn-success">
                    <i class="material-icons">edit</i> Edit Schedule
                  </a></td>
                        </tr>
<?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <a href="enroll_subj.php?stud_id=<?php echo $_GET['stud_id'] ?>" class="btn btn-default">
                    <i class="material-icons">keyboard_backspace</i> Back
                  </a>
                  <a href="select_subj.php?stud_id=<?php echo $_GET['stud_id'] ?>" class="btn btn-success">
                    <i class="material-icons">add</i> Add Subject
                  </a>
                  </form>
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
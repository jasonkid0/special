<?php 
include '../../includes/session.php';
include '../../includes/db.php'; 



if (isset($_POST['submit'])) {

  $or_id = $_GET['or_id'];
  // $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $course = mysqli_real_escape_string($db,$_POST['course']);
  $gender = mysqli_real_escape_string($db,$_POST['gender']);
  $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
  $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
  $middlename = mysqli_real_escape_string($db,$_POST['middlename']);
  $address = mysqli_real_escape_string($db,$_POST['address']);
  $birthdate = mysqli_real_escape_string($db,$_POST['birthdate']);
  $birthplace = mysqli_real_escape_string($db,$_POST['birthplace']);
  $age = mysqli_real_escape_string($db,$_POST['age']);
  $religion = mysqli_real_escape_string($db,$_POST['religion']);
  $citizenship = mysqli_real_escape_string($db,$_POST['citizenship']);
  $civilstatus = mysqli_real_escape_string($db,$_POST['civilstatus']);
  $contact = mysqli_real_escape_string($db,$_POST['contact']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $flastname = mysqli_real_escape_string($db,$_POST['flastname']);
  $ffirstname = mysqli_real_escape_string($db,$_POST['ffirstname']);
  $fmiddlename = mysqli_real_escape_string($db,$_POST['fmiddlename']);
  $fage = mysqli_real_escape_string($db,$_POST['fage']);
  $foccupation = mysqli_real_escape_string($db,$_POST['foccupation']);
  $mlastname = mysqli_real_escape_string($db,$_POST['mlastname']);
  $mfirstname = mysqli_real_escape_string($db,$_POST['mfirstname']);
  $mmiddlename = mysqli_real_escape_string($db,$_POST['mmiddlename']);
  $mage = mysqli_real_escape_string($db,$_POST['mage']);
  $moccupation = mysqli_real_escape_string($db,$_POST['moccupation']);
  $familyincome = mysqli_real_escape_string($db,$_POST['familyincome']);
  $nosiblings = mysqli_real_escape_string($db,$_POST['nosiblings']);
  $glastname = mysqli_real_escape_string($db,$_POST['glastname']);
  $gfirstname = mysqli_real_escape_string($db,$_POST['gfirstname']);
  $gmiddlename = mysqli_real_escape_string($db,$_POST['gmiddlename']);
  $relationship = mysqli_real_escape_string($db,$_POST['relationship']);
  $gaddress = mysqli_real_escape_string($db,$_POST['gaddress']);
  $hs = mysqli_real_escape_string($db,$_POST['hs']);
  $hsSY = mysqli_real_escape_string($db,$_POST['hsSY']);
  $hsAddress = mysqli_real_escape_string($db,$_POST['hsAddress']);
  $lastschool = mysqli_real_escape_string($db,$_POST['lastschool']);
  $course_year = mysqli_real_escape_string($db,$_POST['course-year']);
  $lastSY = mysqli_real_escape_string($db,$_POST['lastSY']);
  $lastAddress = mysqli_real_escape_string($db,$_POST['lastAddress']);
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $password = mysqli_real_escape_string($db,$_POST['password']);
  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
  $stud_no = mysqli_real_escape_string($db,$_POST['stud_no']);
  $curri = 'New Curri';



  $up = mysqli_query($db,"UPDATE tbl_online_registrations SET status = 'Approved' where or_id = '$or_id'");

  $query = mysqli_query($db,"INSERT INTO tbl_students (img,stud_no, course_id, gender_id, lastname, firstname, middlename, birthdate, birthplace, age, religion, citizenship, civilstatus, contact, email, flastname, ffirstname,fmiddlename, fage, foccupation, mlastname, mfirstname, mmiddlename, mage, moccupation, familyincome, nosiblings, glastname, gfirstname, gmiddlename, relationship, gaddress, elem, elemSY, elemAddress, hs, hsSY, hsAddress, lastschool, course_year, lastSY, lastAddress, username, password,curri) values ('','$stud_no','$course', '$gender','$lastname', '$firstname', '$middlename', '$birthdate','$birthplace','$age','$religion','$citizenship','$civilstatus','$contact', '$email', '$flastname', '$ffirstname', '$fmiddlename', '$fage', '$foccupation','$mlastname', '$mfirstname', 'mmiddlename','$mage','moccupation', '$familyincome', '$nosiblings', '$glastname', '$gfirstname', '$gmiddlename', '$relationship', '$gaddress','','','', '$hs', '$hsSY', '$hsAddress', '$lastschool','', '$lastSY', '$lastAddress', '$username', '$hashedPwd','$curri')")or die (mysqli_error($db));

    if($query == true)
    {
      message("Student Successfully Added!","success");
    }
  else{
      message("Student No. already exist!","error");
    }
}


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
                <div class="card-body">

                  
                  <form method="POST" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                     <?php 
                $q = mysqli_query($db,"SELECT *, CONCAT(tbl_online_registrations.lastname, ', ', tbl_online_registrations.firstname, ' ', tbl_online_registrations.middlename)  as fullname
                 FROM tbl_online_registrations
                LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_online_registrations.course_id
                LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_online_registrations.gender_id
                 where or_id = '".$_GET['or_id']."'")or die (mysqli_error($db)) ;
                while ($row = mysqli_fetch_array($q))
                  {echo '
                    
                  <fieldset style="border: 1px solid;padding: 0px 10px;border-color: #d2d2d2">
                    <legend style="text-align:center">PERSONAL DATA</legend>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                        <input name="stud_id" type="hidden" class="form-control" value="'.$row['or_id'].'">
                          <label class="bmd-label-floating">Student Number</label>
                            <input name="stud_no" required type="text" class="form-control" value="">
                       
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <select name="course" id="course" data-style="btn btn-primary btn-round" required class="form-control select-2">
                            <option value="'.$row['course_id'].'" selected>'.$row['course'].'</option>';
                        $q = mysqli_query($db,"SELECT * from tbl_courses where course_id not in ('".$row['course_id']."')");
                        while($row1=mysqli_fetch_array($q)){
                            echo '<option value="'.$row1['course_id'].'">'.$row1['course'].'</option>';
                                }
                             echo '
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <select name="gender" id="gender" data-style="btn btn-primary btn-round" required class="form-control select-2">
                            <option value="'.$row['gender_id'].'" selected>'.$row['gender'].'</option>';
                        $q1 = mysqli_query($db,"SELECT * from tbl_genders where gender_id not in ('".$row['gender_id']."')");
                        while($row2=mysqli_fetch_array($q1)){
                            echo '<option value="'.$row2['gender_id'].'">'.$row2['gender'].'</option>';
                                }
                             echo '
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input name="lastname" type="text" class="form-control" value="'.$row['lastname'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input name="firstname" type="text" class="form-control" value="'.$row['firstname'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input name="middlename" type="text" class="form-control" value="'.$row['middlename'].'">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input name="address" type="text" class="form-control" value="'.$row['address'].'">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Date of Birth</label>
                          <input name="birthdate" type="text" class="form-control" value="'.$row['birthdate'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Place of Birth</label>
                          <input name="birthplace" type="text" class="form-control" value="'.$row['birthplace'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <input name="age" type="text" class="form-control" value="'.$row['age'].'">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Religion</label>
                          <input name="religion" type="text" class="form-control" value="'.$row['religion'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Citizenship</label>
                          <input name="citizenship" type="text" class="form-control" value="'.$row['citizenship'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Civil Status</label>
                          <input name="civilstatus" type="text" class="form-control" value="'.$row['civilstatus'].'">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact Number</label>
                          <input name="contact" type="tel" class="form-control" value="'.$row['contact'].'">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">E-mail</label>
                          <input name="email" type="text" class="form-control" value="'.$row['email'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>
                  </fieldset>
                  <br>
                  <fieldset style="border: 1px solid;padding: 0px 10px;border-color: #d2d2d2">
                    <legend style="text-align:center">FAMILY BACKGROUND</legend>
                    <h4><strong>Father</strong></h4>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input name="flastname" type="text" class="form-control" value="'.$row['flastname'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input name="ffirstname" type="text" class="form-control" value="'.$row['ffirstname'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input name="fmiddlename" type="text" class="form-control" value="'.$row['fmiddlename'].'">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <input name="fage" type="text" class="form-control" value="'.$row['fage'].'">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Occupation</label>
                          <input name="foccupation" type="text" class="form-control" value="'.$row['foccupation'].'">
                        </div>
                      </div>
                    </div>
                    <h4><strong>Mother</strong></h4>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input name="mlastname" type="text" class="form-control" value="'.$row['mlastname'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input name="mfirstname" type="text" class="form-control" value="'.$row['mfirstname'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input name="mmiddlename" type="text" class="form-control" value="'.$row['mmiddlename'].'">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <input name="mage" type="text" class="form-control" value="'.$row['mage'].'">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Occupation</label>
                          <input name="moccupation" type="text" class="form-control" value="'.$row['moccupation'].'">
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Monthly Family Income</label>
                          <input name="familyincome" type="text" class="form-control" value="'.$row['familyincome'].'">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">No. of Siblings</label>
                          <input name="nosiblings" type="text" class="form-control" value="'.$row['nosiblings'].'">
                        </div>
                      </div>
                    </div>
                    <hr>
                    <h4><strong>Guardian</strong></h4>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input name="glastname" type="text" class="form-control" value="'.$row['glastname'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input name="gfirstname" type="text" class="form-control" value="'.$row['gfirstname'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input name="gmiddlename" type="text" class="form-control" value="'.$row['gmiddlename'].'">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Relationship</label>
                          <input name="relationship" type="text" class="form-control" value="'.$row['relationship'].'">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input name="gaddress" type="text" class="form-control" value="'.$row['gaddress'].'">
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <br>
                  <fieldset  style="border: 1px solid;padding: 0px 10px;border-color: #d2d2d2">
                  <legend style="text-align:center">EDUCATIONAL BACKGROUND</legend>
                    
                    
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">High School Graduated from</label>
                          <input name="hs" type="text" class="form-control" value="'.$row['hs'].'">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">School Year</label>
                          <input name="hsSY" type="text" class="form-control" value="'.$row['hsSY'].'">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address of School</label>
                          <input name="hsAddress" type="text" class="form-control" value="'.$row['hsAddress'].'">
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last School Attended</label>
                          <input name="lastschool" type="text" class="form-control" value="'.$row['lastschool'].'">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Course & Year</label>
                          <input name="course-year" type="text" class="form-control" value="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">School Year</label>
                          <input name="lastSY" type="text" class="form-control" value="'.$row['lastSY'].'">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address of School</label>
                          <input name="lastAddress" type="text" class="form-control" value="'.$row['lastAddress'].'">
                        </div>
                      </div>
                    </div>
                    </fieldset>
                    <br>
                    <fieldset  style="border: 1px solid;padding: 0px 10px;border-color: #d2d2d2">
                    <legend style="text-align:center">ACCOUNT DETAILS</legend>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input name="username" type="text" class="form-control" value="'.$row['username'].'">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input name="password" type="password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    </fieldset>
                    <br>';
                    if ($_SESSION['role'] != 'Admission Staff') {
                      if ($row['status'] == 'Approved') {
                      echo'
                    <button type="submit" disabled name="submit" class="btn btn-default pull-right">Approve Inquiry</button>
                    <div class="clearfix"></div>';
                    }else{
                    echo'
                    <button type="submit" name="submit" class="btn btn-default pull-right">Approve Inquiry</button>
                    <div class="clearfix"></div>
                    ';}
                    }else{
                     } 
                    }?>
                  </form>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <?php include '../../includes/footer.php';?>
    </div>
  </div>
<?php include '../../includes/script.php'; ?>
</body>

</html>

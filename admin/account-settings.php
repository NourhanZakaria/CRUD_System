<?php
include '../shared/head.php';
include '../App/config.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../App/functions.php';


$adminID=$_SESSION['admin']['id'];
$select = " SELECT * FROM `admins` WHERE id =$adminID";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);


$ruleID=$_SESSION['admin']['rule'];
$selectRule = " SELECT * FROM `rules` WHERE id =$ruleID";
$rule = mysqli_query($conn, $selectRule);
$rowRule = mysqli_fetch_assoc($rule);




if (isset($_POST['send'])) {
  // var_dump($_POST); var_dump($_FILES);  die();
  $name = $_POST['fullName'];
  $Job = $_POST['job'];
// image code

if(!empty($_FILES['image']['name'])){
  $image_name = rand(0,1000) . rand(0,1000) . $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$location ="upload/" . $image_name;
move_uploaded_file($tmp_name,$location);
$image_old =$row['image'];
unlink("./upload/$image_old");
 }else{
  $image_name =$row['image'];
 }
  
  $insert = "UPDATE  admins SET name='$name',job='$Job',image='$image_name' WHERE id=$adminID";
  $i = mysqli_query($conn, $insert);
  testmessage($i, "update");
  path('admin/users-profile.php'); 
}





// if(isset($_POST['changePassword'])){
  
//     $curr_pass=$_GET['password'];
//     $old_pass=$row['password'];
//     $hash_pass=sha1($curr_pass);
//     $new_pass=$_GET['newpassword'];
//     $new_pass2=$_GET['renewpassword'];
//     $hash_newPass=sha1($new_pass2);
//     if($old_pass==$hash_pass)
//       {
//         if($new_pass==$new_pass2)
//         {
//             $update = "UPDATE  admins SET password='$hash_newPass' where id=$adminID";
//             $i = mysqli_query($conn, $insert);
//             testMessage($i,"The password has been changed successfully");
//             // path('admin/profile.php');             
//         }
//       }


// }


?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="./upload/<?=$row['image']?>" alt="Profile" class="rounded-circle">

              <h2><?=$row['name']?></h2>
              <h3><?=$row['job']?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

           
              </ul>
              <div class="tab-content pt-2">


                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="upload/<?=$row['image']?>" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?=$row['name'] ?>">
                      </div>
                    </div>

                    <div class="mb-3 col-md-12">
                      <span>Edit Image:<img width="50" src="./upload/<?= $row['image']?>" ></span>
                      <input type="file" name="image" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                      </div>
                    </div>

            
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="<?=$row['job']?>">
                      </div>
                    </div>
              
                    <!-- <div class="mb-3 col-md-12">
                        <span>Edit Image:<img width="50" src="./upload/<?= $row['image']?>" ></span>
                        <input type="file" name="image" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                  
      -->

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="send">Save Changes</button>
                    </div>

                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



<?php
include '../shared/footer.php';
include '../shared/script.php';
?>

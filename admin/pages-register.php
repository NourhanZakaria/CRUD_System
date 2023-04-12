<?php

include '../shared/head.php';
include '../App/config.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../App/functions.php';


if(isset($_POST['send'])){
$name=$_POST['name'];
$password=$_POST['password'];
$rule=$_POST['rule'];
$job=$_POST['job'];
$hashPassword=sha1($password);


$imageName=rand(0,5000) . $_FILES['image']['name'];
$tmp_image=$_FILES['image']['tmp_name'];

$location="upload/".$imageName;
move_uploaded_file($tmp_image , $location);

$insert="INSERT INTO admins values(null,'$name','$hashPassword','$imageName','$job',$rule)";
$i=mysqli_query($conn,$insert);

}

$row="SELECT * FROM rules";
$Rules=mysqli_query($conn,$row);

auth();
?>




    <main>
    <div class="container">

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">NiceAdmin</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
              <p class="text-center small">Enter your personal details to create account</p>
            </div>

            <form class="row g-3 needs-validation" method="post" novalidate enctype="multipart/form-data">
             
              <div class="col-12">
                <label for="yourUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                  <input type="text" name="name" class="form-control" id="yourUsername" required>
                  <div class="invalid-feedback">Please choose a username.</div>
                </div>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="yourPassword" required>
                <div class="invalid-feedback">Please enter your password!</div>
              </div>

              
              <div class="col-12">
                <label for="yourPassword" class="form-label">Job</label>
                <input type="text" name="job" class="form-control" id="yourJob" required>
                <div class="invalid-feedback">Please enter your job!</div>
              </div>

              <div class="mb-3 col-md-12">                  
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div> 

              <div class="col-12">
                <select name="rule" id="" class="form-control">
                  <?php foreach ($Rules as $data) : ?>
                  <option value="<?= $data['id'] ?>"> <?= $data['description']; ?> </option>
                <?php endforeach; ?>
                  
                </select>
              </div>
              <div class="col-12">
            
          

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                  <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                  <div class="invalid-feedback">You must agree before submitting.</div>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit" name="send">Create Account</button>
              </div>
              <div class="col-12">
                <p class="small mb-0">Already have an account? <a href="/odc/pages-login.php">Log in</a></p>
              </div>
           
            </form>

          </div>
        </div>

        <div class="credits">

          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>

      </div>
    </div>
  </div>

</section>

</div>
  </main><!-- End #main -->







  <?php
include '../shared/footer.php';
include '../shared/script.php';
?>
    
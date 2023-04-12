



<?php
//include App
error_reporting(1);
include '../App/config.php';
include '../App/functions.php';
//include shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';



$select="SELECT * FROM departments";
$queryList= mysqli_query($conn,$select);

$errors = [];

if(isset($_POST["send"])){
    $name=filterValidation($_POST['name']);
    $salary=filterValidation($_POST['salary']);
    $deptId=filterValidation($_POST['deptID']);
    $imageName=rand(0,5000) . $_FILES['image']['name'];
    $tmp_image=$_FILES['image']['tmp_name'];
    
    $location="upload/".$imageName;
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];

    if (fileSizeValidation($_FILES['image']['name'], $_FILES['image']['size'], 3)) {
        $errors[] = "Your File bigger Than 3 miga";
    }
    if (fileTypeValidation($image_type, "image/jpeg", "image/png", "image/jpg")) {
        $errors[] = "Your file out side types";
    }

    if (stringValidation($name, 2)) {
        $errors[] = "Please enter your name , your name must be string and more than 3 ";
    }
    if (numberValidation($salary)) {
        $errors[] = "Please Enter valida salary";
    }


    if (empty($errors)) {
       
    move_uploaded_file($tmp_image, $location);
    
    $insert="INSERT INTO `employees` values (null,'$name',$salary,'$imageName',$deptId)";
    $i= mysqli_query($conn,$insert);

    path('Employees/add.php');
    }
    
}

auth(2);
?>
<section class="all">
<div class="container">
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?> </li>
                    <hr>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
        <h1 class="head">Add Employees</h1>
        <div class="form col-md-8">
          <form method="POST" enctype="multipart/form-data">
                <div class="mb-3 col-md-12">
                    <input type="text" name="name" class="form-control" placeholder="Add Employee" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="row" id="cost">
                    <div class="mb-3 col-md-3">
                        <input type="text" class="form-control" placeholder="Gross Salary" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-md-3">
                        <input type="text" class="form-control" placeholder="Tax" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-md-3">
                        <input type="text" class="form-control" placeholder="Bonus" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-md-3">
                        <input type="text" name="salary" readonly class="form-control" placeholder="Net Salary" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
            

                <div class="mb-3 col-md-12">                  
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div> 

                <div class="mb-3 col-md-12">
                    <select type="text" class="form-control" name="deptID">
                       <?php foreach($queryList as $data):?>
                         <option value="<?= $data['id']?>"><?= $data['name']?> </option>
                       <?php endforeach;?>
                    </select>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary btn-block mt-3" name="send">Add Employee </button>
                </div>   
                    
           </form>
        </div>
</div>
</section>
<?php include '../shared/footer.php'; ?>
<?php include '../shared/script.php'; ?>
   
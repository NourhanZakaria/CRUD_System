


<?php
//include App
include '../App/config.php';
include '../App/functions.php';
//include shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';

$errors = [];
if(isset($_POST["send"])){
    $name=$_POST['name'];
    if(stringValidation($name,3))
    {
        $errors[] = "Please enter your name , your name must be string and more than 3 ";
    }
    if (empty($errors)) {
    $insert="INSERT INTO `departments` values (null,'$name')";
    $i= mysqli_query($conn,$insert);
    testMessage($i,"insert");
    path('departments/add.php');
    }
}
auth(2,3);
?>

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
        <h1 class="head">Add Departments</h1>
        <div class="form col-md-8">
          <form method="POST" >
                <div class="mb-3 col-md-12">
                    <input type="text" name="name" class="form-control" placeholder="Add Department" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary btn-block mt-3" name="send">Add Department </button>
                </div>   
                    
           </form>
        </div>
</div>

<?php include '../shared/script.php'; ?>
   
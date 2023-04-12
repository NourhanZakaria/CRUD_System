


<?php
//include App
include '../App/config.php';
include '../App/functions.php';
//include shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';


if(isset($_GET["edit"])){
    $id=$_GET['edit'];
    $up="SELECT * FROM `departments`where id=$id ";
    $i= mysqli_query($conn,$up);
    $row=mysqli_fetch_assoc($i);  
   
    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $update="UPDATE `departments` SET name='$name' where id=$id";
        $update2= mysqli_query($conn,$update);
        path("departments/list.php");     
    }
}else{
    path("departments/list.php");
}

// auth();
?>

<div class="container">
        <h1 class="head">Update Departments:<?=$_GET['edit'] ?></h1>
        <div class="form col-md-6">
          <form method="POST">
                <div class="mb-3 col-md-12">
                    <input type="text" name="name" class="form-control" value="<?= $row['name']?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary btn-block mt-3" name="update">Update </button>
                </div>   
                    
           </form>
        </div>
</div>

<?php include '../shared/script.php'; ?>
   
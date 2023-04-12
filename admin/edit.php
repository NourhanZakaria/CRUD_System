
<?php
//include App
include '../App/config.php';
include '../App/functions.php';
//include shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';

$row="SELECT * FROM rules";
$Rules=mysqli_query($conn,$row);

if(isset($_GET["edit"])){
    $id=$_GET['edit'];
    $up="SELECT * FROM `admins`where id=$id ";
    $i= mysqli_query($conn,$up);
    $row=mysqli_fetch_assoc($i);  
   
    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $password=$_POST['password'];
        $hashPassword=sha1($password);
        $rule=$_POST['rule'];
        $update="UPDATE `admins` SET name='$name' ,password='$hashPassword', ruleId=$rule where id=$id";
        $update2= mysqli_query($conn,$update);
        path("admin/list.php");     
    }
}else{
    path("admin/list.php");
}



?>

<div class="container">
        <h1 class="head">Update admins:<?=$_GET['edit'] ?></h1>
        <div class="form col-md-6">
          <form method="POST">
                <div class="mb-3 col-md-12">
                    <input type="text" name="name" class="form-control" value="<?= $row['name']?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 col-md-12">
                    <input type="password" name="password" class="form-control" value="<?= $row['password']?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="col-12">
                        <select name="rule" class="form-control">
                          <?php foreach($Rules as $data):?>
                           <option value="<?=$data['id'] ?>"><?=$data['description']?></option>
                           <?php endforeach;?>
                        </select>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary btn-block mt-3" name="update">Update </button>
                </div>  
                 
                    
           </form>
        </div>
</div>

<?php include '../shared/script.php'; ?>
   
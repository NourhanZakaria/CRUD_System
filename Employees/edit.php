


<?php
//include App
include '../App/config.php';
include '../App/functions.php';
//include shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';


// if(isset($_GET['edit'])){
//     $id=$_GET['edit'];
//     $up="SELECT * FROM `employeeswithdepartmants`where empId=$id ";
//     $i= mysqli_query($conn,$up);
//     $row=mysqli_fetch_assoc($i);  
// }   
//     if(isset($_POST['update'])){
//         $name=$_POST['name'];
//         $salary=$_POST['salary'];
//         $depId=$_POST['depId'];

//         if(!empty( $_FILES['image']['name'])){
            
//             $imageName=rand(0,5000) . $_FILES['image']['name'];
//             $tmp_image=$_FILES['image']['tmp_name'];
            
//             $location="upload/" .$imageName;
//             move_uploaded_file($tmp_image,$location);
//             $oldImage= $row['image'];
//             unlink("./upload/$oldImage");
//         }
//         else{
//             $imageName= $row['image'];
//         }
//         $update="UPDATE `employees` SET name='$name' , salary=$salary , image='$imageName' , departmentID = $depId   where id=$id";
//         $update2= mysqli_query($conn,$update);
//         path("Employees/list.php");        
//     }
// else{
//     path("Employees/list.php");
// }

$row=null;

if (isset($_GET["edit"])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM `employeeswithdepartmants` WHERE empId=$id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
  }
  if (isset($_POST['update'])) {
    // var_dump($_POST); var_dump($_FILES);  die();
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $departmentid = $_POST['departmentid'];
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
    
    $insert = "UPDATE  employees SET name='$name',salary=$salary,image='$image_name',departmentID=$departmentid WHERE id=$id";
    $i = mysqli_query($conn, $insert);
    testmessage($i, "update");
    path('Employees/list.php'); 
  }


$select="SELECT * FROM departments ";
$queryList= mysqli_query($conn,$select);

// auth();
?>
<section class="all">
<div class="container">
        <h1 class="head">Update Employee:<?=$_GET['edit'] ?></h1>
        <div class="form col-md-6">
          <form method="POST" enctype="multipart/form-data">
                <div class="mb-3 col-md-12">
                    <input type="text" name="name" class="form-control" value="<?= $row['empName']?>" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                        <input type="text" name="salary" value="<?= $row['salary'] ?>" readonly class="form-control" placeholder="Net Salary" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="mb-3 col-md-12">
                    <span>Edit Image:<img width="50" src="./upload/<?= $row['image']?>" ></span>
                    <input type="file" name="image" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <div class="mb-3 col-md-12">
                    <select type="text" class="form-control" name="departmentid">
                        
                       <?php foreach($queryList as $data):?>
                         <option value="<?= $data['id']?>" <?php if($data['id']==$row['depId']) echo "selected"; ?> ><?= $data['name']?> </option>
                       <?php endforeach;?>
                    </select>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary btn-block mt-3" name="update">Update </button>
                </div>   
                    
           </form>
        </div>
</div>
</section>
<?php include '../shared/footer.php'; ?>
<?php include '../shared/script.php'; ?>
   
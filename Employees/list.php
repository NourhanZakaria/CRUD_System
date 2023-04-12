
<?php
//include App
include '../App/config.php';
include '../App/functions.php';
//include shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';


$select="SELECT * FROM employeeswithdepartmants";
$queryList= mysqli_query($conn,$select);


if (isset($_GET['Delete'])) {
    $id = $_GET['Delete'];
    $selectone = "SELECT * FROM `employees` WHERE id=$id";
  $sone = mysqli_query($conn, $selectone);
  $row = mysqli_fetch_assoc($sone);
  $imageName = $row['image'];
  unlink("./upload/$imageName");
    $delete = "DELETE FROM `employees` where id=$id";
    mysqli_query($conn, $delete);
   path('Employees/list.php');
  }


// if(isset($_GET['Delete'])){
//     $id=$_GET['Delete'];
//     $delete="DELETE FROM employees where Id=$id ";
//    $del=mysqli_query($conn,$delete);
//     path("Employees/list.php");
// }

auth(2);
?>
<section class="all">
<div class="container col-md-6">
        <h1 class="head">List Employees</h1>
        
        <table class="table table-dark">
        
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Salary</th>
                <th scope="col">Image</th>
                <th scope="col">DepartmentName</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            <?php foreach($queryList as $data): ?>
                <tr>
                    <td><?= $data['empId']?></td>
                    <td><?= $data['empName']?></td>
                    <td><?= $data['salary']?></td>
                    <td><img src="./upload/<?= $data['image']?>" width="50"></td>
                    <td><?= $data['depName']?></td>

                                         
                    <td>
                    <a href="/CRUD_System/Employees/list.php?Delete=<?= $data['empId']?>" onclick="return confirm('Are you want to remove this course')" class="btn btn-danger" >Remove</a>
                    <a href="/CRUD_System/Employees/edit.php?edit=<?= $data['empId']?>" class="btn btn-warning">edit</a>
                    </td> 
                </tr>
                        
            <?php endforeach;?>
            </table>
</div>
</section>
<?php include '../shared/footer.php'; ?>
<?php include '../shared/script.php'; ?>
   
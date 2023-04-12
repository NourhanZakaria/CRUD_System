



<?php
//include App
include '../App/config.php';
include '../App/functions.php';
//include shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';



$select="SELECT * FROM admins";
$queryList= mysqli_query($conn,$select);

if(isset($_GET['Delete'])){
    $id=$_GET['Delete'];
    $delete="DELETE FROM admins where id= $id ";
    $del=mysqli_query($conn,$delete);
    path("admin/list.php");
}

auth();
?>

<div class="container col-md-6">
        <h1 class="head">List Admins</h1>
        
        <table class="table table-dark">
        
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            <?php foreach($queryList as $data): ?>
                <tr>
                    <td><?= $data['id']?></td>
                    <td><?= $data['name']?></td>
                                         
                    <td>
                    <a href="/CRUD_System/admin/list.php?Delete=<?= $data['id']?>" onclick="return confirm('Are you want to remove this course')" class="btn btn-danger" >Remove</a>
                    <a href="/CRUD_System/admin/edit.php?edit=<?= $data['id']?>" class="btn btn-warning">edit</a>
                    </td> 
                </tr>
                        
            <?php endforeach;?>
            </table>
</div>

<?php include '../shared/script.php'; ?>
   
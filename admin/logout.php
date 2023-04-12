

<?php   
session_start();
session_unset();
session_destroy(); 
header("location:/CRUD_System/admin/pages-login.php");

?>
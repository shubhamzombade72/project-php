<?php
// include('DBConfig.php');

$conn=mysqli_connect("localhost","root","","try_basic");
if(mysqli_connect_error()){
echo("connection failed");
}

 ?>
 <?php
 if(isset($_GET['class_id'])){
    $id=$_GET['class_id'];
$query=mysqli_query($conn,"DELETE FROM `class_stud` WHERE `class_id`= $id");
if($query){
    echo("<script> alert('Delete Data Successfully');</script>");
    echo("<script> document.location='class.php'</script>");
}
else{
    echo("<script> You Have Some Error Data not deleted</script>");
}
 }
 ?>
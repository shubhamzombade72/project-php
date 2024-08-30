<?php
// include('DBConfig.php');

$conn=mysqli_connect("localhost","root","","try_basic");
if(mysqli_connect_error()){
echo("connection failed");
}

 ?>
 <?php
 if(isset($_GET['id'])){
    $id=$_GET['id'];
$query=mysqli_query($conn,"DELETE FROM `std_info` WHERE `std_id`='$id'");
if($query){
    echo("<script> alert('Delete Data Successfully');</script>");
    echo("<script> document.location='StudentInfo.php'</script>");
}
else{
    echo("<script> You Have Some Error Data not deleted</script>");
}
 }
 ?>
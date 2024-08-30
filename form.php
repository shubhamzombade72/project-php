<?php
$conn=mysqli_connect("localhost","root","","try_basic");
if(mysqli_connect_error()){
echo("connection failed");
}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mob=$_POST['mob'];
    $address=$_POST['address'];
    $marks=$_POST['marks'];
    $query=mysqli_query($conn,"INSERT INTO `stud_pro`(`id`,`name`, `mob`, `city`) VALUES ('','$name','$mob','$address','$marks')");
    if($query)
    {
        echo("<script> alert('save successfully')</script>");
        echo("<script> document.location='form.php'</script>");
    }
    else{
        echo("save unsuccessfully");
    }
}
?>

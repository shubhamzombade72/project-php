
<?php 
include("header.php");
include("leftmenu.php");
?>
<div id="page-wrapper">
<div id="page-inner">
<?php
$conn = mysqli_connect("localhost", "root", "", "try_basic");
if (mysqli_connect_error()) {
    echo("Connection failed: ");
}

if (isset($_POST['submit'])) {
    $class = $_POST['class'];


    $query = mysqli_query($conn, "INSERT INTO `class_stud`(`class`) VALUES ('$class')");
    
    if ($query) {
        echo("<script>alert('Save successfully');</script>");
        header("Location: class.php");
        exit();
    } else {
        echo("Save unsuccessfully: ");
    }
}
?>

<!-- New form -->
<form method="POST" action="">
    <div class="form-group input-group-lg">
        <h3><label for="name">class Name:</label></h3>
        <input type="text" class="form-control" name="class" id="class" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>
    
    <div class="d-grid gap-2 d-md-block">
        <button class="btn-lg btn btn-danger" type="submit" name="submit">SUBMIT</button>
    
    <a href="class.php"  class="btn btn-warning btn-lg pt-3">VIEW</a>
    </div>
</form>
</div>
</div>
<?php 
include "footer.php"; 
?>



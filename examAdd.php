
<?php 
include("header.php");
include("leftmenu.php");
// include("DBConfig.php");
?>
<div id="page-wrapper">
<div id="page-inner">

<?php
$conn = mysqli_connect("localhost", "root", "", "try_basic");
if (mysqli_connect_error()) {
    echo("Connection failed: ");
}

if (isset($_POST['submit'])) {
    $exam_name = $_POST['exam_name'];
    $exam_mark = $_POST['exam_mark'];
 

    $query = mysqli_query($conn, "INSERT INTO `tbl_exam`(`exam_name`, `exam_mark`) VALUES ('$exam_name','$exam_mark')");
    
    if ($query) {
        echo("<script>alert('Save successfully');</script>");
        echo ("<script>document.location='examAdd.php'</script>");
        exit();
    } else {
        echo("Save unsuccessfully: ");
    }
}
?>

<!-- New form -->
<form method="POST" action="">
    <div class="form-group input-group-lg">
        <h3><label for="name">Exam Name:</label></h3>
        <input type="text" class="form-control" name="exam_name" id="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>
   
    <div class="form-group input-group-lg">
        <h3><label for="marks">Marks:</label></h3>
        <input type="text" class="form-control" name="exam_mark" id="marks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>
    <div class="d-grid gap-2 d-md-block">
        <button class="btn-lg btn btn-danger" type="submit" name="submit">SUBMIT</button>
    
    <a href="exam.php"  class="btn btn-warning btn-lg pt-3">VIEW</a>
    </div>
</form>


</div>
</div>

<?php 
include("footer.php");
?>
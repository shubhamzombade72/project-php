<?php 
include("header.php");
include("leftmenu.php");

$conn = mysqli_connect("localhost", "root", "", "try_basic");
if (mysqli_connect_error()) {
    echo("Connection failed: " . mysqli_connect_error());
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM `class_stud` WHERE class_id='$id'");
    $row = mysqli_fetch_array($query);

    if (isset($_POST['update'])) {
        $class = $_POST['class'];
      

        $updateQuery = mysqli_query($conn, "UPDATE `class_stud` SET `class`='$class' WHERE `class_id`='$id'");
        if ($updateQuery) {
            echo ("<script> alert('Class Updated');</script>");
            echo ("<script> document.location='class.php';</script>");
        } else {
            echo ("<script> alert('Data Not Updated');</script>");
        }
    }
} else {
    echo ("<script> alert('No student ID provided.');</script>");
    echo ("<script> document.location='402error.php';</script>");
    exit();
}
?>


<div id="page-wrapper">
    <div id="page-inner">
        <form method="POST" action="">
            <div class="form-group input-group-lg">
                <h3><label for="name">class Name:</label></h3>
                <input type="text" class="form-control" name="class" id="class" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo htmlspecialchars($row['class']); ?>" required>
            </div>
          
            <div class="d-grid gap-2 d-md-block">
                <button class="btn-lg btn btn-danger" type="submit" name="update">UPDATE</button>
            </div>
        </form>
    </div>
</div>
</div>

<?php 
include "footer.php"; 
?>

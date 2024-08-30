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
    $query = mysqli_query($conn, "SELECT * FROM `stud_pro` WHERE id='$id'");
    $row = mysqli_fetch_array($query);

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $mob = $_POST['mob'];
        $address = $_POST['address'];
        $marks = $_POST['marks'];

        $updateQuery = mysqli_query($conn, "UPDATE `stud_pro` SET `name`='$name', `mob`='$mob', `address`='$address', `marks`='$marks' WHERE `id`='$id'");
        if ($updateQuery) {
            echo ("<script> alert('Data Updated');</script>");
            echo ("<script> document.location='StudentList.php';</script>");
        } else {
            echo ("<script> alert('Data Not Updated');</script>");
        }
    }
} else {
    echo ("<script> alert('No student ID provided.');</script>");
    echo ("<script> document.location='StudentList.php';</script>");
    exit();
}
?>


<div id="page-wrapper">
    <div id="page-inner">
        <form method="POST" action="">
            <div class="form-group input-group-lg">
                <h3><label for="name">Name:</label></h3>
                <input type="text" class="form-control" name="name" id="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="form-group input-group-lg">
                <h3><label for="mob">Mobile:</label></h3>
                <input type="text" class="form-control" name="mob" id="mob" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo htmlspecialchars($row['mob']); ?>" required>
            </div>
            <div class="form-group input-group-lg">
                <h3><label for="address">Address:</label></h3>
                <input type="text" class="form-control" name="address" id="address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo htmlspecialchars($row['address']); ?>" required>
            </div>
            <div class="form-group input-group-lg">
                <h3><label for="marks">Marks:</label></h3>
                <input type="text" class="form-control" name="marks" id="marks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="<?php echo htmlspecialchars($row['marks']); ?>" required>
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

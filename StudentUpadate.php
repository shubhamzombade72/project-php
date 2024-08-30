<?php 
include("header.php");
include("leftmenu.php");

$conn = mysqli_connect("localhost", "root", "", "try_basic");
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM `std_info` WHERE std_id='$id'");
    $row = mysqli_fetch_array($query);

    if (isset($_POST['std_update'])) {
        $name = $_POST['std_name'];
        $class = $_POST['std_class'];
        $email = $_POST['std_email'];
        $mobile = $_POST['std_mobile'];
        $address = $_POST['std_address'];
        $prn = $_POST['std_prn'];
        $mother = $_POST['std_mother'];

        $updateQuery = mysqli_query($conn, "UPDATE `std_info` SET `std_name`='$name', `std_class`='$class', `std_email`='$email', `std_mobile`='$mobile', `std_address`='$address', `std_prn`='$prn', `std_mother`='$mother' WHERE `std_id`='$id'");
        if ($updateQuery) {
            echo ("<script>alert('Data Updated');</script>");
            echo ("<script>document.location='StudentInfo.php';</script>");
            exit();
        } else {
            echo ("<script>alert('Data Not Updated');</script>");
        }
    }
} else {
    echo ("<script>alert('No student ID provided.');</script>");
    echo ("<script>document.location='StudentInfo.php';</script>");
    exit();
}
?>

<form action="" method="post" class="row g-3">
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Name</label>
                <input type="text" class="form-control" id="validationDefault01" name="std_name" value="<?php echo htmlspecialchars($row['std_name']); ?>" required>
            </div>
            <div class="col-md-4">
                <label for="class" class="form-label">Class</label>
                <select name="std_class" class="form-control" id="">
                    <?php
                    $query  = "SELECT * FROM class_stud";
                    $result = mysqli_query($conn, $query);

                    while ($data = mysqli_fetch_array($result)) {
                        $selected = ($data["class_id"] == $row['std_class']) ? 'selected' : '';
                        echo "<option value='{$data["class_id"]}' $selected>{$data["class"]}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="validationDefaultUsername" class="form-label">Email ID</label>
                <div class="input-group">
                    <input type="email" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="std_email" value="<?php echo htmlspecialchars($row['std_email']); ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationDefault03" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="validationDefault03" name="std_mobile" value="<?php echo htmlspecialchars($row['std_mobile']); ?>" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault04" class="form-label">Address</label>
                <input type="text" class="form-control" id="validationDefault04" name="std_address" value="<?php echo htmlspecialchars($row['std_address']); ?>" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault05" class="form-label">PRN Number</label>
                <input type="text" class="form-control" id="validationDefault05" name="std_prn" value="<?php echo htmlspecialchars($row['std_prn']); ?>" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault06" class="form-label">Mother Name</label>
                <input type="text" class="form-control" id="validationDefault06" name="std_mother" value="<?php echo htmlspecialchars($row['std_mother']); ?>" required>
            </div>
            <div class="col-12">
                <button class="btn btn-danger" type="submit" name="std_update">UPDATE</button>
            </div>
        </div>
    </div>
</form>

<?php 
include "footer.php"; 
?>

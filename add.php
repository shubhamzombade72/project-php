<?php
$conn = mysqli_connect("localhost", "root", "", "try_basic");
if (mysqli_connect_error()) {
    echo("Connection failed: ");
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mob = $_POST['mob'];
    $address = $_POST['address'];
    $marks = $_POST['marks'];

    $query = mysqli_query($conn, "INSERT INTO `stud_pro`(`name`, `mob`, `address`, `marks`) VALUES ('$name', '$mob', '$address', '$marks')");
    
    if ($query) {
        echo("<script>alert('Save successfully');</script>");
        header("Location: StudentAdd.php");
        exit();
    } else {
        echo("Save unsuccessfully: ");
    }
}
?>

<!-- New form -->
<form method="POST" action="">
    <div class="form-group input-group-lg">
        <h3><label for="name">Name:</label></h3>
        <input type="text" class="form-control" name="name" id="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>
    <div class="form-group input-group-lg">
        <h3><label for="mob">Mobile:</label></h3>
        <input type="text" class="form-control" name="mob" id="mob" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>
    <div class="form-group input-group-lg">
        <h3><label for="address">Address:</label></h3>
        <input type="text" class="form-control" name="address" id="address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>
    <div class="form-group input-group-lg">
        <h3><label for="marks">Marks:</label></h3>
        <input type="text" class="form-control" name="marks" id="marks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>
    <div class="d-grid gap-2 d-md-block">
        <button class="btn-lg btn btn-danger" type="submit" name="submit">SUBMIT</button>
    
    <a href="StudentList.php"  class="btn btn-warning btn-lg pt-3">VIEW</a>
    </div>
</form>

<?php 
include "footer.php"; 
?>

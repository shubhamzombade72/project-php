<?php
include("header.php");
include("leftmenu.php");

$conn = mysqli_connect("localhost", "root", "", "try_basic");
if (mysqli_connect_error()) {
  echo ("Connection failed: ");
}

if (isset($_POST['submit'])) {
  $name = $_POST['std_name'];
  $class = $_POST['std_class'];
  $email = $_POST['std_email'];
  $mobile = $_POST['std_mobile'];
  $address = $_POST['std_address'];
  $prn = $_POST['std_prn'];
  $mother = $_POST['std_mother'];

  $query = mysqli_query($conn, "INSERT INTO `std_info`(`std_name`, `std_class`, `std_email`, `std_mobile`, `std_address`, `std_prn`, `std_mother`) VALUES ('$name','$class','$email','$mobile','$address','$prn','$mother')");
  if ($query) {
    echo ("<script>alert('Save successfully');</script>");
    echo ("<script>document.location='StudentInfo.php'</script>");
    exit();
  } else {
    echo ("<script>alert('Save unsuccessfully');</script>");
  }
}
?>

<!-- New form -->
<form action="" method="post" class="row g-3">

  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Name</label>
          <input type="text" class="form-control" id="validationDefault01" name="std_name" required>
        </div>
        <div class="col-md-4">
          <label for="class" class="form-label">Class</label>
          <select name="std_class" class="form-control" id="">
            <?php
            $query  = "SELECT * FROM class_stud";
            $result = mysqli_query($conn, $query);

            while ($data = mysqli_fetch_array($result)) {
            ?>
              <option value="<?= $data["class_id"]; ?>"><?= $data["class"]; ?></option>
            <?php
            } ?>
          </select>
        </div>
        <div class="col-md-4">
          <label for="validationDefaultUsername" class="form-label">Email ID</label>
          <input type="email" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="std_email" required>
        </div>
        <div class="col-md-3">
          <label for="validationDefault03" class="form-label">Mobile</label>
          <input type="text" class="form-control" id="validationDefault03" name="std_mobile" required>
        </div>
        <div class="col-md-3">
          <label for="validationDefault04" class="form-label">Address</label>
          <input type="text" class="form-control" id="validationDefault04" name="std_address" required>
        </div>
        <div class="col-md-3">
          <label for="validationDefault05" class="form-label">PRN Number</label>
          <input type="text" class="form-control" id="validationDefault05" name="std_prn" required>
        </div>
        <div class="col-md-3">
          <label for="validationDefault06" class="form-label">Mother's Name</label>
          <input type="text" class="form-control" id="validationDefault06" name="std_mother" required>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
              Agree to terms and conditions
            </label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
          <a href="StudentInfo.php" class="btn btn-warning btn-lg ">VIEW</a>
        </div>
      </div>
    </div>
  </div>
</form>

<?php
include "footer.php";
?>

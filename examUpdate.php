<?php 
  include("header.php");
  include("leftmenu.php");

  $conn = mysqli_connect("localhost", "root", "", "try_basic");
  if (mysqli_connect_error()) {
      die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = mysqli_query($conn, "SELECT * FROM `tbl_exam` WHERE exam_id='$id'");
      $row = mysqli_fetch_array($query);

      if (isset($_POST['exam_update'])) {
          $exam_name = $_POST['exam_name'];
          $exam_mark = $_POST['exam_mark'];
        

          $updateQuery = mysqli_query($conn, "UPDATE `tbl_exam` SET `exam_name`='$exam_name', `exam_mark`='$exam_mark' WHERE `exam_id`='$id'");
          if ($updateQuery) {
              echo ("<script>alert('Data Updated');</script>");
              echo ("<script>document.location='exam.php';</script>");
              exit();
          } else {
              echo ("<script>alert('Data Not Updated');</script>");
          }
      }
  } else {
      echo ("<script>alert('No student ID provided.');</script>");
      echo ("<script>document.location='exam.php';</script>");
      exit();
  }
  ?>

  <form action="" method="post" class="row g-3">
      <div id="page-wrapper">
      <div id="page-inner">
        <div class="col-md-4">
          <label for="validationDefault01" class="form-label">Exam Name</label>
          <input type="text" class="form-control" id="validationDefault01" name="exam_name" value="<?php echo htmlspecialchars($row['exam_name']); ?>" required>
        </div>
    
        <div class="col-md-4">
          <label for="validationDefaultUsername" class="form-label">Mark</label>
          <div class="input-group">
            <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="exam_mark" value="<?php echo htmlspecialchars($row['exam_mark']); ?>" required>
          </div>
        </div>
        
        <div class="col-12">
          <button class="btn btn-danger" type="submit" name="exam_update">UPDATE</button>
        </div>
      </div>
      </div>
  </form>

  <?php 
  include "footer.php"; 
  ?>

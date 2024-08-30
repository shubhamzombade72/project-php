<?php 
include("header.php");
include("leftmenu.php");

$conn = mysqli_connect("localhost", "root", "", "try_basic");
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM `tbl_exam_q` WHERE q_id='$id'");
    $row = mysqli_fetch_array($query);

    if (isset($_POST['q_update'])) {
        $q_name = $_POST['q_name'];
        $q_ans_1 = $_POST['q_ans_1'];
        $q_ans_2 = $_POST['q_ans_2'];
        $q_ans_3 = $_POST['q_ans_3'];
        $q_ans_4 = $_POST['q_ans_4'];
        $q_main_ans = $_POST['q_main_ans'];
        $q_exam = $_POST['exam_name'];

        $updateQuery = mysqli_query($conn, "UPDATE `tbl_exam_q` SET `q_name`='$q_name',`q_ans_1`='$q_ans_1',`q_ans_2`='$q_ans_2',`q_ans_3`='$q_ans_3',`q_ans_4`='$q_ans_4',`q_main_ans`='$q_main_ans',`q_exam`='$q_exam' WHERE `q_id`='$id'");
        if ($updateQuery) {
            echo ("<script>alert('Data Updated');</script>");
            echo ("<script>document.location='q.php';</script>");
            exit();
        } else {
            echo ("<script>alert('Data Not Updated');</script>");
        }
    }
} else {
    echo ("<script>alert('No student ID provided.');</script>");
    echo ("<script>document.location='q.php';</script>");
    exit();
}
?>

<form action="" method="post" class="row g-3">
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Question Name</label>
                <input type="text" class="form-control" id="validationDefault01" name="q_name" value="<?php echo htmlspecialchars($row['q_name']); ?>" required>
            </div>
            <div class="col-lg-6">
          <label for="class" class="form-label">Exam Name</label>
          <select name="exam_name" class="form-control" id="">
            <?php
            $query  = "SELECT * FROM tbl_exam";
            $result = mysqli_query($conn, $query);

            while ($data = mysqli_fetch_array($result)) {
                $selected = ($data["exam_id"] == $row['std_class']) ? 'selected' : '';
                echo "<option value='{$data["exam_id"]}' $selected>{$data["exam_name"]}</option>";
            }
            ?>
          </select>
        </div>
            <div class="col-md-4">
                <label for="validationDefaultUsername" class="form-label">Option 1</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" name="q_ans_1" value="<?php echo htmlspecialchars($row['q_ans_1']); ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationDefault03" class="form-label">Option 2</label>
                <input type="text" class="form-control" id="validationDefault03" name="q_ans_2" value="<?php echo htmlspecialchars($row['q_ans_2']); ?>" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault04" class="form-label">Option 3</label>
                <input type="text" class="form-control" id="validationDefault04" name="q_ans_3" value="<?php echo htmlspecialchars($row['q_ans_3']); ?>" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault05" class="form-label">Option 4</label>
                <input type="text" class="form-control" id="validationDefault05" name="q_ans_4" value="<?php echo htmlspecialchars($row['q_ans_4']); ?>" required>
            </div>
            <div class="col-md-3">
                <label for="validationDefault06" class="form-label"> Main Answer</label>
                <input type="text" class="form-control" id="validationDefault06" name="q_main_ans" value="<?php echo htmlspecialchars($row['q_main_ans']); ?>" required>
            </div>

            <div class="col-md-3">
                <label for="validationDefault06" class="form-label"> Exam Name</label>
                <input type="text" class="form-control" id="validationDefault06" name="q_exam" value="<?php echo htmlspecialchars($row['q_exam']); ?>" required>
            </div>

            <div class="col-12">
                <button class="btn btn-danger" type="submit" name="q_update">UPDATE</button>
            </div>
        </div>
    </div>
</form>

<?php 
include "footer.php"; 
?>

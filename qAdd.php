
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
    $q_name = $_POST['q_name'];
    $q_ans_1 = $_POST['q_ans_1'];
    $q_ans_2 = $_POST['q_ans_2'];
    $q_ans_3 = $_POST['q_ans_3'];
    $q_ans_4 = $_POST['q_ans_4'];
    $q_main_ans = $_POST['q_main_ans'];
    $q_exam = $_POST['exam_name'];

    $query = mysqli_query($conn, "INSERT INTO `tbl_exam_q`( `q_name`, `q_ans_1`, `q_ans_2`, `q_ans_3`, `q_ans_4`, `q_main_ans`, `q_exam`) VALUES
     ('$q_name','$q_ans_1','$q_ans_2','$q_ans_3','$q_ans_4',' $q_main_ans','$q_exam ')");
    
    if ($query) {
        echo("<script>alert('Save successfully');</script>");
        echo ("<script>document.location='q.php'</script>");
        exit();
    } else {
        echo("Save unsuccessfully: ");
    }
}
?>

<!-- New form -->
<form method="POST" action="">
    <div class="form-group input-group-lg">
        <h3><label for="name">Questions Name:</label></h3>
        <input type="text" class="form-control" name="q_name" id="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>
   
    <div class="form-group input-group-lg">
        <h3><label for="marks">Option 1</label></h3>
        <input type="text" class="form-control" name="q_ans_1" id="marks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>

    <div class="form-group input-group-lg">
        <h3><label for="marks">Option 2</label></h3>
        <input type="text" class="form-control" name="q_ans_2" id="marks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>

    <div class="form-group input-group-lg">
        <h3><label for="marks">Option 3</label></h3>
        <input type="text" class="form-control" name="q_ans_3" id="marks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>

    <div class="form-group input-group-lg">
        <h3><label for="marks">Option 4</label></h3>
        <input type="text" class="form-control" name="q_ans_4" id="marks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>

    <div class="form-group input-group-lg">
        <h3><label for="marks">Main Answer</label></h3>
        <input type="text" class="form-control" name="q_main_ans" id="marks" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>

    <div class="col-lg-6">
          <label for="class" class="form-label">Exam Name</label>
          <select name="exam_name" class="form-control" id="">
            <?php
            $query  = "SELECT * FROM tbl_exam";
            $result = mysqli_query($conn, $query);

            while ($data = mysqli_fetch_array($result)) {
            ?>
              <option value="<?= $data["exam_id"]; ?>"><?= $data["exam_name"]; ?></option>
            <?php
            } ?>
          </select>
        </div>
<br><br>
    
   

    <div class="d-grid gap-2 d-md-block">
        <button class="btn-lg btn btn-danger" type="submit" name="submit">SUBMIT</button>
    
    <a href="q.php"  class="btn btn-warning btn-lg pt-3">VIEW</a>
    </div>
</form>


</div>
</div>

<?php 
include("footer.php");
?>
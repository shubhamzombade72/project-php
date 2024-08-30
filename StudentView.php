<?php 
// include("DBConfig.php");
include("header.php");
include("leftmenu.php");

$conn = mysqli_connect("localhost", "root", "", "try_basic");
if (mysqli_connect_error()) {
    echo "Connection failed";
}

$row = array(); // Initialize the $row array
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM `std_info` WHERE std_id='$id'");
    $row = mysqli_fetch_array($query);
}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div>
            <div>
                <div style="float: left;" class="">Student Info </div>
            </div>
            <form action="" method="post">
                <div class="container-xl px-4 mt-4">
                    <!-- Account page navigation-->
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Account Details</div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="name">Name</label>
                                            <input class="form-control" id="name" name="std_name" type="text" value="<?php echo htmlspecialchars($row['std_name']); ?>">
                                        </div>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Class Name</label>
                                            <input class="form-control" id="inputLastName" type="text" value="<?php echo htmlspecialchars($row['std_class']); ?>">
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputOrgName">Email ID</label>
                                            <input class="form-control" id="inputOrgName" type="email" name="std_email" value="<?php echo htmlspecialchars($row['std_email']); ?>">
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">Mobile number</label>
                                            <input class="form-control" id="inputLocation" type="text" name="std_mobile" value="<?php echo htmlspecialchars($row['std_mobile']); ?>">
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Address</label>
                                        <input class="form-control" id="inputEmailAddress" type="text" name="std_address" value="<?php echo htmlspecialchars($row['std_address']); ?>">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="prn">PRN Number</label>
                                            <input class="form-control" id="prn" type="text" name="std_prn" value="<?php echo htmlspecialchars($row['std_prn']); ?>">
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="mother">Mother Name</label>
                                            <input class="form-control" id="mother" type="text" name="std_mother" value="<?php echo htmlspecialchars($row['std_mother']); ?>">
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <a href="StudentInfo.php" class="btn btn-primary" style="float: right;" >Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
include("footer.php");
?>

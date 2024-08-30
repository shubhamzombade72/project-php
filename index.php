<head>
<style>
.card-custom {
    background-color: #f8f9fa;
    border: 1px solid #ddd;   
    border-radius: 5px;       
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
    padding: 20px;            
}
</style>

</head>
<?php
include "header.php";
include "leftmenu.php";
?>

<div id="page-wrapper">
    <div id="page-inner">
        Hello Admin <!-- /. NAV SIDE  -->
        <div class="row">
            <div class="col-md-12">
                <h2>Admin Dashboard</h2>
                <h5>Welcome in Student Management System</h5>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-envelope-o"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">120 New</p>
                        <p class="text-muted">Messages</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">30 Tasks</p>
                        <p class="text-muted">Remaining</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                        <i class="fa fa-bell-o"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">240 New</p>
                        <p class="text-muted">Notifications</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-brown set-icon">
                        <i class="fa fa-rocket"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">3 Orders</p>
                        <p class="text-muted">Pending</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

            <div class="container">
                <div class="row">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "try_basic");
                    if (mysqli_connect_error()) {
                        echo ("connection failed");
                    }

                    $query = mysqli_query($conn, "SELECT * FROM `tbl_exam_q` INNER JOIN tbl_exam ON tbl_exam_q.q_exam = tbl_exam.exam_id");
                    $count = 0 ;
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-md-4" style="margin-top: 20px;">
                            <div class="card card-custom">
                                <div class="card-body">
                                    <h5 class="card-title">Question <?php echo $count = $count + 1; ?></h5>
                                    <p class="card-text"><?php echo $row['q_name']; ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Option 1: <?php echo $row['q_ans_1']; ?><br>
                                        Option 2: <?php echo $row['q_ans_2']; ?><br>
                                        Option 3: <?php echo $row['q_ans_3']; ?><br>
                                        Option 4: <?php echo $row['q_ans_4']; ?><br>
                                        <hr/>
                                        <div style="color: green; font-weight: 600; ">Answer: <?php echo $row['q_main_ans']; ?></div><hr/>
                                        <div style=" font: size 20px; font-weight:900; color: orange; ">Exam Name: <?php echo $row['exam_name']; ?></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
            </div>
        </div>

        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

    <?php
    include "footer.php";
    ?>
</div>

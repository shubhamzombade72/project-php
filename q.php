<?php 
// include("DBConfig.php");
include("header.php");
include("leftmenu.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div>
            <div>
                <div style="float: left;" class="">Student Info</div>
                <a href="qAdd.php" style="float: right;" class="btn btn-primary">Add Questions</a>
            </div>
            <form action="" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Question ID</th>
                            <th scope="col">Question Name</th>
                            <th scope="col"> Options 1</th>
                            <th scope="col"> Options 2</th>
                            <th scope="col"> Options 3</th>
                            <th scope="col"> Options 4</th>
                            <th scope="col">Main Answer</th>
                            <th scope="col"> Exam Name</th>
                            <th scope="col">Question Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "try_basic");
                        if (mysqli_connect_error()) {
                            echo("connection failed");
                        }
                       
                        $query = mysqli_query($conn, "SELECT * FROM `tbl_exam_q` INNER JOIN tbl_exam ON tbl_exam_q.q_exam = tbl_exam.exam_id");
                        $count = 1;

                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['q_name']; ?></td>
                                <td><?php echo $row['q_ans_1']; ?></td>
                                <td><?php echo $row['q_ans_2']; ?></td>
                                <td><?php echo $row['q_ans_3']; ?></td>    
                                <td><?php echo $row['q_ans_4']; ?></td>    
                                <td><?php echo $row['q_main_ans']; ?></td>    
                                <td><?php echo $row['exam_name']; ?></td>    
                                <td><?php echo $row['q_status']; ?></td>    
                                <td>
                                    <a href="qUpdate.php?id=<?php echo htmlentities($row['q_id']); ?>" class="btn btn-primary">Edit</a>
                                    <a href="qDelete.php?id=<?php echo htmlentities($row['q_id']); ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php  
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<?php 
include("footer.php");
?>

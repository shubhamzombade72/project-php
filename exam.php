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
                <a href="examAdd.php" style="float: right;" class="btn btn-primary">Add Exam</a>
            </div>
            <form action="" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Exam ID</th>
                            <th scope="col">Exam Name</th>
                            <th scope="col">MARKS</th>
                            <th scope="col">Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "try_basic");
                        if (mysqli_connect_error()) {
                            echo("connection failed");
                        }
                       
                        $query = mysqli_query($conn, "SELECT * FROM `tbl_exam` ");
                        $count = 1;

                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['exam_name']; ?></td>
                                <td><?php echo $row['exam_mark']; ?></td>
                                
                                <td>
                                    <a href="examUpdate.php?id=<?php echo htmlentities($row['exam_id']); ?>" class="btn btn-primary">Edit</a>
                                    <a href="examDelete.php?id=<?php echo htmlentities($row['exam_id']); ?>" class="btn btn-danger">Delete</a>
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

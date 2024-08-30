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
                <a href="StudentInfoForm.php" style="float: right;" class="btn btn-primary">Add Student</a>
            </div>
            <form action="" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Class Name</th>
                            <th scope="col">Email ID</th>
                            <th scope="col">Mobile Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">PRN Number</th>
                            <th scope="col">Mother Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "try_basic");
                        if (mysqli_connect_error()) {
                            echo("connection failed");
                        }
                       
                        $query = mysqli_query($conn, "SELECT std_info.*, class_stud.class FROM std_info INNER JOIN class_stud ON std_info.std_class = class_stud.class_id;");
                        $count = 1;

                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['std_name']; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td><?php echo $row['std_email']; ?></td>
                                <td><?php echo $row['std_mobile']; ?></td>    
                                <td><?php echo $row['std_address']; ?></td>    
                                <td><?php echo $row['std_prn']; ?></td>    
                                <td><?php echo $row['std_mother']; ?></td>    
                                <td>
                                    <a href="StudentUpadate.php?id=<?php echo htmlentities($row['std_id']); ?>" class="btn btn-primary">Edit</a>
                                    <a href="StudentDelete.php?id=<?php echo htmlentities($row['std_id']); ?>" class="btn btn-danger">Delete</a>
                                    <a href="StudentView.php?id=<?php echo htmlentities($row['std_id']); ?>" class="btn btn-success">View</a>
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

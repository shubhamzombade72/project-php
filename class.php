
<?php 
include("header.php");
include("leftmenu.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div>
            <div>
                <div style="float: left;" class="">Class</div>
                <a href="classAdd.php" style="float: right;" onclick="add()" class="btn btn-primary" id="addbtn" >Add Class</a>
            </div>
            <form action="" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Class Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                  
                        $conn=mysqli_connect("localhost","root","","try_basic");
                        if(mysqli_connect_error()){
                        echo("connection failed");
                        }
                        
                        $query = mysqli_query($conn, "SELECT * FROM `class_stud`");
                        $count = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td>
                                    <a href="classUpdate.php?id=<?php echo htmlentities($row['class_id']); ?>" class="btn btn-primary">Edit</a>
                                    <!-- echo ("<script> alert('No student ID provided.');</script>"); -->
                                    <a href="classDelete.php?id=<?php echo htmlentities($row['class_id']); ?>" class="btn btn-danger">Delete</a>
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

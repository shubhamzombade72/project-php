<?php 
// include("DBConfig.php");
include("header.php");
include("leftmenu.php");
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div>
            <div>
                <div style="float: left;" class="">Student List</div>
                <a href="StudentAdd.php" style="float: right;" class="btn btn-primary">Add Student</a>
            </div>
            <form action="" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Address</th>
                            <th scope="col">Marks</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                  
                        $conn=mysqli_connect("localhost","root","","try_basic");
                        if(mysqli_connect_error()){
                        echo("connection failed");
                        }
                        
                        $query = mysqli_query($conn, "SELECT * FROM `stud_pro`");
                        $count = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['mob']; ?></td>
                                <td><?php echo $row['address']; ?></td>    
                                <td><?php echo $row['marks']; ?></td>    
                                <td>
                                    <a href="update.php?id=<?php echo htmlentities($row['id']); ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete.php?id=<?php echo htmlentities($row['id']); ?>" class="btn btn-danger">Delete</a>
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

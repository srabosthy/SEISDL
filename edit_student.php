<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>edit student info</title>
</head>
<body>  
    <?php include 'connection.php'; ?>
    <?php 
        $std_id = $_REQUEST['id']; 
        //echo $std_id;
        $query = "SELECT * FROM student WHERE id = $std_id";
        $sql = mysqli_query($conn, $query);
        $student = mysqli_fetch_array($sql);
    ?>
    <div class = "container">
        <div>
            <h2>create Student</h2>
        </div>
        <div class = "col-md-7">
            <form method = "post" action = "">
                <div class="form-group">
                    <label for="">Student Name</label>
                    <input type="text"  value = "<?php echo $student['name'] ?>" class="form-control" name="name" id="">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email"  value = "<?php echo $student['email'] ?>" class="form-control"  name="email" id="">
                </div>
            
                <div class="form-group">
                    <label for="">Date of Birth</label>
                    <input type="date"value = "<?php echo $student['dob'] ?>"  class="form-control" name="dob" id="">
                </div>

                <div class="form-group">
                    <label for="">Department</label>
                    <select name="dept_id"  id="" class="form-control">
                        <?php
                            $query = "SELECT id, short_code FROM departments";
                            $sql = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($sql))
                            { ?>
                                <option <?php echo ($row['id']==$student['department_id'])? 'selected' : '' ?> value="<?php echo $row['id'] ?>" > <?php echo $row['short_code'] ?> </option>
                            <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">        
                    <input type="submit" name="submit" class="btn btn-primary" value="update">
                </div>
            
            </form>
        </div>
    </div>    

</body>
</html>

<?php
    include 'connection.php';
    if(isset($_POST['submit']))
    {
        //recvd data from input/control
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $dept_id = $_POST['dept_id'];
        //db query
        $query = "UPDATE student SET name='$name', email='$email', dob='$dob', department_id='$dept_id' WHERE id ='$std_id'";
        $sql = mysqli_query($conn, $query);
        if($sql)
        {
           header('Location: show_student.php');
           echo "success!!";
        }
    }
?>
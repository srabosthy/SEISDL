<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>dept. creation</title>
</head>
<body>
    <div class = "container">
        <div>
            <h2>create Dept.</h2>
        </div>
        <div class = "col-md-7">
            <form method="post" action="create_dept.php">
                <div class="form-group">
                    <label for="">Dept. Name</label>
                    <input type="text" class="form-control" name="name" id="">
                </div>

                <div class="form-group">
                    <label for="">dept. short code</label>
                    <input type="text"class="form-control"  name="scode" id="">
                </div>

                <div class="form-group">
                    <label for="">Dept. code</label>
                    <input type="text" class="form-control" name="code" id="">
                </div>

                <div class="form-group">        
                    <input type="submit" name="submit" class="btn btn-primary" value="add dept.">
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
        //recvd data from input/control.
        $name = $_POST['name'];
        $scode = $_POST['scode'];
        $code = $_POST['code'];

        //db query

        $query = "INSERT INTO departments(name, short_code, code) VALUES ('$name','$scode','$code')";
        
        if(mysqli_query($conn, $query))
        {
            echo "success!!";
        }
    }


?>
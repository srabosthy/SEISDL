<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="image/logo.png" id="icon" alt="User Icon" />
                <h1>Log in</h1>
                <br>
            </div>
            <form method="post" action="">
                <div>
                    <input type="email" id="email" class="fadeIn second" name="email" placeholder="enter email">
                </div>
                <div>
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="enter password">
                </div>
                <br>
                <div>
                    <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
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
        $email =  $_POST['email'];
        $pass = md5($_POST['password']);

        $query = "select * from users where email = '$email' AND password = '$pass'";
        $sql = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($sql);
        if($row)
        {
            $poss = $row['position'];
            $_SESSION['email'] = $email; 
            $_SESSION['poss'] = $poss;
            header('Location: show_student.php');
        }
    }

?>
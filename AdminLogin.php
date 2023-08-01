<?php
$login = false;
$ShowError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'conn.php';
    $username = $_POST['myUsername'];
    $password = $_POST['myPassword'];
    $sql = "Select * from `admin` where userName='$username' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] =  true;
                $_SESSION['username'] =  $username;
                header("location: dashboard.php");  
            }else{
                $ShowError = 'Invalid Credentials';
            }
        }
    }else{
        $ShowError = 'Invalid Credentials';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?php
        if($login){
            echo '<div class="alertSuccess"><strong>Success! </strong>You are Successfully Logged in</div>';
        }
        if($ShowError){
            echo '<div class="alertDanger"><strong>Error! </strong>'.$ShowError.'</div>';
        }
    ?>
    <section class="container">
        <header>Login</header>
        <form action="/web/AdminLogin.php" method ="POST" class="form">
            <div class="inputs">
                <label for="userName">User Name</label>
                <input type="text" placeholder="Enter your user name" name="myUsername" id="userName" require>
            </div>
            <div class="inputs">
                <label for="password">Password</label>
                <input type="password" placeholder="Enter your Password" name="myPassword" id="password" require>
            </div>
            <div class="btn">
                <button type="submit" class="button" >Log In</button>
                <a id = "reg" href="register.php">Don't have account? Register Now</a>
            </div>
        </form>
    </section>

</body>
</html>
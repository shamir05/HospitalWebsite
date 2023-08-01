<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'conn.php';
    $fullName = $_POST['myFullName'];
    $cnic = $_POST['myCnic'];
    $userName = $_POST['myUserName'];
    $gender = $_POST["myGender"];
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
    $email = $_POST["myEmail"];
    $password = $_POST["myPassword"];
    $contactNo = $_POST["myContactNo"];
    $dob = $_POST["myDob"];
    $existSql = "SELECT * FROM `admin` WHERE userName = '$userName' OR cnic = '$cnic'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows>0){
        $showError = "User Name or Cnic already Exists";
    }else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `admin`(`fullName`, `cnic`, `userName`, `gender`, `image`, `email`, `password`, `contactNo`, `dob`) VALUES ('$fullName','$cnic','$userName','$gender','$imgContent','$email','$hash','$contactNo','$dob') ";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
        }
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php
        if($showAlert){
            echo '<div class="alertSuccess"><strong>Success! </strong>Your account is now created. <a href="AdminLogin.php">Click here to login</a></div>';
        }
        if($showError){
            echo '<div class="alertDanger"><strong>Error! </strong>'.$showError.'</div>';
        }
?>
    <Section class="container">
        <header>Register</header>
        <form action="/web/register.php" method="POST" class="form" enctype="multipart/form-data">
        <div class="inputs">
            <label for="fullname">Full Name</label>
            <input type="text" maxlength="50" placeholder="Enter your Name" name="myFullName" id="fullname" required>
        </div>
        <div class="inputs">
            <label for="cnic">CNIC</label>
            <input type="text" minlength="15" maxlength="15" placeholder="XXXXX-XXXXXXX-X" name="myCnic" id="cnic" required>
        </div>
        <div class="inputs">
            <label for="userName">User Name</label>
            <input type="text" maxlength="15" placeholder="Enter your user name" name="myUserName" id="userName" required>
        </div>
        <div class="inputs">
            <h3>Gender</h3>
            <div class="options">
            <select name="myGender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
    </div>
    <div class="inputs">
                    <label for="image">Select an Image</label>
                    <input type="file" name="image" id="image" accept="image/jpg,png,jpeg,gif">
                </div>
            <div class="coloumn">
            <div class="inputs">
                <label for="email">Email</label>
                <input type="email" maxlength="40" placeholder="Enter your Email" name="myEmail" id="email" required>
            </div>
            <div class="inputs">
                <label for="password">Password</label>
                <input type="password" maxlength="25" placeholder="Enter a Password" name="myPassword" id="password" required>
            </div>
        </div>
        <div class="coloumn">
            <div class="inputs">
                <label for="contactNo">Contact No</label>
                <input type="tel" minlength="11" maxlength="11" placeholder="Enter your Contact No" name="myContactNo" id="contactNo" required>
            </div>
            <div class="inputs">
                <label for="dob">DOB</label>
                <input type="date" name="myDob" id="dob" required>
            </div>
        </div>
        <div class="btn">
        <button type="submit" class="button" >Register</button>
        <a id = "reg" href="AdminLogin.php">Already have account? Login Now</a>
        </div>
    </form>
</Section>
</body>
</html>
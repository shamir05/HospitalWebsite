<?php
    include('Dashboard.php');
    $showAlert = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"]== "POST"){
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
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE `admin` SET `fullName`='$fullName',`cnic`='$cnic',`gender`='$gender',`image`='$imgContent',`email`='$email',`password`='$password',`contactNo`='$contactNo',`dob`='$dob' WHERE `userName` = '$_SESSION[username]'";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
            }
        } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/newadmin.css">
</head>
<body>
<?php
        $sql = "SELECT * FROM `admin` where userName = '$_SESSION[username]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
?>
<?php
        if($showAlert){
            echo '<div class="alertSuccess"><strong>Success! </strong>Your Profile is Updated. <a href="AdminLogin.php">Click here to login</a></div>';
        }
        if($showError){
            echo '<div class="alertDanger"><strong>Error! </strong>'.$showError.'</div>';
        }
?>
<Section class="container">
        <header>Edit Profile</header>
        <form action="/web/editProfile.php" method="POST" class="form" enctype="multipart/form-data">
        <div class="inputs">
            <label for="fullname">Full Name</label>
            <input type="text" maxlength="50" placeholder="Enter your Name" value="<?php echo $row['fullName']?>" name="myFullName" id="fullname" required>
        </div>
        <div class="inputs">
            <label for="cnic">CNIC</label>
            <input type="text" minlength="15" maxlength="15" placeholder="XXXXX-XXXXXXX-X" value="<?php echo $row['cnic']?>" name="myCnic" id="cnic" required>
        </div>
        <div class="inputs">
            <label for="userName">User Name</label>
            <input type="text" maxlength="15" placeholder="Enter your user name" name="myUserName" value="<?php echo $row['userName']?>" id="userName" required>
        </div>
        <div class="inputs">
            <h3>Gender</h3>
            <div class="options">
            <select name="myGender">
                <option value="<?php echo $row['gender']?>">Male</option>
                <option value="<?php echo $row['gender']?>">Female</option>
                <option value="<?php echo $row['gender']?>">Other</option>
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
                <input type="email" maxlength="40" placeholder="Enter your Email" value="<?php echo $row['email']?>" name="myEmail" id="email" required>
            </div>
            <div class="inputs">
                <label for="password">Password</label>
                <input type="password" maxlength="25" placeholder="Enter a Password" name="myPassword" id="password" required>
            </div>
        </div>
        <div class="coloumn">
            <div class="inputs">
                <label for="contactNo">Contact No</label>
                <input type="tel" minlength="11" maxlength="11" placeholder="Enter your Contact No" value="<?php echo $row['contactNo']?>" name="myContactNo" id="contactNo" required>
            </div>
            <div class="inputs">
                <label for="dob">DOB</label>
                <input type="date" value="<?php echo $row['dob']?>" name="myDob" id="dob" required>
            </div>
        </div>
        <div class="btn">
        <button type="submit" class="button" >Update</button>
        </div>
    </form>
</Section>
</body>
</html>
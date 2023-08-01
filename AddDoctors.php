<?php
include 'dashboard.php';
$showError = false;
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['myName'];
    $cnic = $_POST['myCnic'];
    $education = $_POST['myEducation'];
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
    $department = $_POST['myDepartment'];
    $gender = $_POST["myGender"];
    $email = $_POST["myEmail"];
    $contactNo = $_POST["myContactNo"];
    $existSql = "SELECT * FROM `add_doctor` WHERE cnic = '$cnic'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError = "Cnic already Exists";
    } else {
        $sql = "INSERT INTO `add_doctor`(`fullName`, `cnic`,`education`,`image`,`department`,`gender`, `email`, `contactNo`) VALUES ('$fullName','$cnic','$education','$imgContent','$department','$gender','$email','$contactNo')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
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
    <title>Add Doctors</title>
</head>

<body>
    <?php
    if ($showAlert) {
        echo '<div class="alertSuccess"><strong>Success! </strong>Doctor is added</div>';
    }
    if ($showError) {
        echo '<div class="alertDanger"><strong>Error! </strong>' . $showError . '</div>';
    }
    ?>
    <Section class="container">
        <header>Add Doctors</header>
        <form method="POST" action="/web/AddDoctors.php" class="form" enctype="multipart/form-data">
            <div class="coloumn">
                <div class="inputs">
                    <label for="name" class="lbl">First Name</label>
                    <input type="text" maxlength="50" placeholder="Enter your Name" name="myName" id="name" required>
                </div>
                <div class="inputs">
                    <label for="cnic">Cnic</label>
                    <input type="text" minlength="15" maxlength="15" placeholder="XXXXX-XXXXXXX-X" name="myCnic"
                        id="cnic" required>
                </div>
            </div>

            <div class="coloumn">
                <div class="inputs">
                    <label for="education">Education Description</label>
                    <textarea class="textarea" name="myEducation" id="education" cols="30" rows="10"
                        required></textarea>
                </div>
                <div class="inputs">
                    <label for="image">Select an Image</label>
                    <input type="file" name="image" id="image" accept="image/jpg,png,jpeg,gif">
                </div>
            </div>
            <div class="coloumn">
                <div class="inputs">
                    <label for="department">Select a Department</label>
                    <div class="options">
                        <select name="myDepartment">
                            <option>Select Department</option>
                            <?php
                            $sql1 = "SELECT * FROM `add_department`";
                            $result = mysqli_query($conn, $sql1);
                            $num = mysqli_num_rows($result);
                            if ($num > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['deptName'] ?>">
                                        <?php echo $row['deptName'] ?>
                                    </option>
                                    <?php

                                }
                            }
                            ?>
                        </select>
                    </div>
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
            </div>
            <div class="coloumn">
                <div class="inputs">
                    <label for="email">Email</label>
                    <input type="email" maxlength="40" placeholder="Enter your Email" name="myEmail" id="email"
                        required>
                </div>
                <div class="inputs">
                    <label for="contactNo">Contact No</label>
                    <input type="tel" minlength="11" maxlength="11" placeholder="Enter your Contact No"
                        name="myContactNo" id="contactNo" require>
                </div>
            </div>
            <div class="btn">
                <button type="submit" class="button">Submit</button>
            </div>
        </form>
    </Section>
</body>

</html>
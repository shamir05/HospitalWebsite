<?php
include 'dashboard.php';
$showError = false;
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deptId = $_POST['myDeptId'];
    $deptName = $_POST['myDeptName'];
    $deptDesc = $_POST['myDeptDesc'];
    $existSql = "SELECT * FROM `add_department` WHERE deptId = '$deptId' OR deptName = '$deptName'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError = "Department already Exists";
    } else {
        $sql = "INSERT INTO `add_department`(`deptId`, `deptName`, `deptDesc`) VALUES ('$deptId','$deptName','$deptDesc')";
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
    <title>Add Department</title>
    <link rel="stylesheet" href="css/newadmin.css">
</head>

<body>
    <?php
    if ($showAlert) {
        echo '<div class="alertSuccess"><strong>Success! </strong>Department is added</div>';
    }
    if ($showError) {
        echo '<div class="alertDanger"><strong>Error! </strong>' . $showError . '</div>';
    }
    ?>
    <Section class="container">
    <header>Add Departments</header>
        <form method="POST" action="/web/AddDepartment.php" class="form">
            <div class="inputs">
                <label for="deptId">Department ID</label>
                <input type="text" placeholder="Enter Department Id" name="myDeptId" id="deptId" required>
            </div>
            <div class="inputs">
                <label for="deptName">Department Name</label>
                <input type="text" maxlength="25" placeholder="Enter Department Name" name="myDeptName" id="deptName"
                    required>
            </div>
            <div class="inputs">
                <label for="deptDesc">Department Description</label>
                <textarea class="textarea" name="myDeptDesc" id="deptDesc" cols="30" rows="10"></textarea>
            </div>
            <div class="btn">
                <button type="submit" class="button">Submit</button>
            </div>
        </form>
    </Section>
</body>

</html>
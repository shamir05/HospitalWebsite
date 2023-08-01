<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Adminlogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/newadmin.css">
</head>
<body>
    <?php
    include('conn.php');
    ?>
    <div class="main">
    <div class="sidebar">
        <div class="profile">
            <?php
        $sql = "SELECT * FROM `admin` where userName = '$_SESSION[username]'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num>0){
            while($row = $result->fetch_assoc()){
                ?>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode( $row['image'])?>" alt="not working">
            <?php
                            }
                        }
                        ?>
            <h3><?php echo $_SESSION['username'] ?></h3>
            <p>Admin</p>
        </div>
        <div class="navbar">
            <ul>
                <li> <a href="Dashboard.php" class="active"> Dashboard</a></li>
                <li> <a href="Appointments.php"> Appointments</a></li>
                <li> <a href="Doctorslist.php"> Doctors List</a></li>
                <li> <a href="AddDoctors.php"> Add Doctors</a></li>
                <li> <a href="AddDepartment.php"> Add Departments</a></li>
                <li> <a href="DoctorsTimetable.php"> Doctors Timetable</a></li>
                <li> <a href="UploadImages.php"> Add Images</a></li>
                <li> <a href="editProfile.php"> Edit Profile</a></li>
            </ul>
        </div>
    </div>
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <li> <a href="logout.php">Logout</a></li>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
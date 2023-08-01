<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="css/newadmin.css">
</head>
<body>
    <?php
    include('dashboard.php');
    ?>
<section class = "tables">
    <header>Appointments</header>
    <!-- </div>
    <div class="search">
        <label for="search">Search Appointment</label>
        <input type="search" name="mySearch" id="search">
    </div> -->
    <table>
        <tr>
            <th>Full Name</th>
            <th>Contact No</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Doctor</th>
            <th>Appointment Time & Date</th>
            <th>Message</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `appointment_form`";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num>0){
            while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['fullName']?></td>
                    <td><?php echo $row['contactNo']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['department']?></td>
                    <td><?php echo $row['doctor']?></td>
                    <td><?php echo $row['adt']?></td>
                    <td><?php echo $row['message']?></td>
                </tr>
                <?php


            }
        }
        ?>


</table>
</section>
</body>
</html>
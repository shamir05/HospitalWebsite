<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors List</title>
    <link rel="stylesheet" href="css/newadmin.css">
</head>
<body>
<?php
    include('dashboard.php');
    ?>
<section class = "tables">
    <header>Doctors</header>
    <table>
        <tr>
            <th>Full Name</th>
            <th>CNIC</th>
            <th>Education Description</th>
            <th>Image</th>
            <th>Department</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Contact No</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `add_doctor`";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num>0){
            while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['fullName']?></td>
                    <td><?php echo $row['cnic']?></td>
                    <td><?php echo $row['education']?></td>
                    <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode( $row['image'])?>" height="100" width="100"</td>
                    <td><?php echo $row['department']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['contactNo']?></td>
                </tr>
                <?php


            }
        }
        ?>

    </table>
    </section>
</body>
</html>

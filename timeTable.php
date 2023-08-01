<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table</title>
    <!-- <link rel="stylesheet" href="css/newadmin.css"> -->
    <link rel="stylesheet" href="css/homestyle.css">

</head>
<body>
<?php
    include('conn.php');
    ?>
<section class = "container">
    <h2 class="h-primary center">Doctors Time Table</h2>
   <div class="table">

       <table>
           <tr>
            <th>Doctor Name</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `doctor_timetable`";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num>0){
            while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['drName']?></td>
                    <td><?php echo $row['monday']?></td>
                    <td><?php echo $row['tuesday']?></td>
                    <td><?php echo $row['wednesday']?></td>
                    <td><?php echo $row['thursday']?></td>
                    <td><?php echo $row['friday']?></td>
                    <td><?php echo $row['saturday']?></td>
                </tr>
                <?php


}
}
?>

    </table>
</div>
</section>
</body>
</html>
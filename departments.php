<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <!-- <link rel="stylesheet" href="css/departments.css"> -->
    <link rel="stylesheet" href="css/homestyle.css">
</head>

<body>
    <?php
    include('conn.php');
    ?>
<section class="container">
   <h1 class="h-primary center">Departments</h1>
    <div id="ourDepartments">
        <?php
        $sql = "SELECT * FROM `add_department`";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="dept">
                    <h3><?php echo $row['deptName'] ?></h3>
                    <p><?php echo $row['deptDesc']?></p>
                </div>

                <?php

}
        }
        ?>
    </div>
</section>
</body>
</html>
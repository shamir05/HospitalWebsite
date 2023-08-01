<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/homestyle.css">
</head>

<body>
    <?php
    include('conn.php')
    ?>
    <section class="container">

        <h1 class="h-primary center">Gallery</h1>
        <div id="gallery">
            <?php
            $sql = "SELECT * FROM `add_galleryimg`";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="img">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']) ?>">
                    </div>
                    <?php

                }
            }
            ?>
    </div>
</section>
</body>
</html>
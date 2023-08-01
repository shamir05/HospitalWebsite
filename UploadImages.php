<?php
$showError = false;
$showAlert = false;
    include 'Dashboard.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_FILES["image"]["name"])) {
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
            $sql = "INSERT INTO `add_galleryimg`(`image`) VALUES ('$imgContent')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        }
    }else{
        $showError = "Sorry, Only jpg, png, jpeg & gif files are allowed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Images</title>
    <link rel="stylesheet" href="css/newadmin.css">
</head>
<body>
<?php
    if ($showAlert) {
        echo '<div class="alertSuccess"><strong>Success! </strong>Image added</div>';
    }
    if ($showError) {
        echo '<div class="alertDanger"><strong>Error! </strong>' . $showError . '</div>';
    }
    ?>
   <Section class="container">
    <header>Add Image</header>
        <form method = "POST"action="/web/UploadImages.php" class="form" enctype="multipart/form-data">
        <div class="inputs">
                    <label for="image">Select an Image</label>
                    <input type="file" name="image" id="image" accept="image/jpg,png,jpeg,gif">
                </div>
                <div class="btn">
                <button type="submit" class="button">Submit</button>
            </div>
        </form>
   </Section>
</body>
</html>
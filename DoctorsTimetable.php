
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Timetable</title>
    <link rel="stylesheet" href="css/newadmin.css">
</head>
<body>
    <?php
    include('Dashboard.php')
    ?>
    <Section class="container">
    <form action="/web/DoctorsTimetable.php" method="POST" enctype="multipart/form-data">
        <div class="inputs">
            <label for="timeTable">Upload CSV File</label>
            <br>
            <input type="file" name="file" id="timeTable">
        </div>
        <div class="btn">
            <button type="submit" class="button">Submit</button>
        </div>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $location = "file/".$_FILES['file']['name'];
      move_uploaded_file($_FILES['file']['tmp_name'], $location);
        $file = fopen($location, "r");
        while(!feof($file)){
            $line_of_text = fgets($file);
            $timetable = explode(',', $line_of_text);
            Timetable($timetable, $conn);
        }
    }
    function Timetable($timetable, $conn){
        $sql = "INSERT INTO `doctor_timetable`(`drName`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) VALUES ('".$timetable[0]."','".$timetable[1]."','".$timetable[2]."','".$timetable[3]."','".$timetable[4]."','".$timetable[5]."','".$timetable[6]."')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "New Record Created Successfully";
            }else{
                echo "Error: " . $conn->error;
            }
    }
?>
    </Section>
</body>
</html>
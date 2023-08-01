<?php
$showError = false;
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conn.php';
    $fullName = $_POST['myFullName'];
    $contactNo = $_POST["myContactNo"];
    $email = $_POST["myEmail"];
    $gender = $_POST["myGender"];
    $department = $_POST["myDepartment"];
    $doctor = $_POST["myDoctor"];
    $adt = $_POST["myAppointmentDate"];
    $message = $_POST["myMessage"];
    $sql = "INSERT INTO `appointment_form`(`fullName`, `contactNo`, `email`, `gender`, `department`, `doctor`, `adt`, `message`) VALUES ('$fullName','$contactNo','$email','$gender','$department','$doctor','$adt','$message')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $showAlert = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <?php
    if ($showAlert) {
        echo '<div class="alertSuccess"><strong>Success! </strong>Your Appointment form is submitted</div>';
    }
    if ($showError) {
        echo '<div class="alertDanger"><strong>Error! </strong>' . $showError . '</div>';
    }
    ?>
    <Section class="container">
        <header>Appointment Form</header>
        <form action="/web/BookAppointment.php" method="POST" class="form">
            <div class="inputs">
                <label for="fullname">Full Name</label>
                <input type="text" maxlength="50" placeholder="Enter your Name" name="myFullName" id="fullname" require>
            </div>
            <div class="inputs">
                <label for="contactNo">Contact No</label>
                <input type="tel" minlength="11" maxlength="11" placeholder="Enter your Contact No" name="myContactNo"
                    id="contactNo" required>
            </div>
            <div class="inputs">
                <label for="email">Email</label>
                <input type="email" maxlength="40" placeholder="Enter your Email" name="myEmail" id="email" required>
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
            <div class="inputs">
                <h3>Select Department</h3>
                <div class="options">
                    <select name="myDepartment">
                    <option value="Cardiology">Cardiology</option>
                           <option value="Anesthetics">Anesthetics</option>
                           <option value="Gastroenterology">Gastroenterology</option>
                           <option value="General Surgery">General Surgery</option>
                           <option value="Gynecology">Gynecology</option>
                           <option value="Haematology">Haematology</option>
                           <option value="Nephrology">Nephrology</option>
                           <option value="Oncology">Oncology</option>
                           <option value="Ophthalmology">Ophthalmology</option>
                           <option value="Orthopaedics">Orthopaedics</option>
                           <option value="Physiotherapy">Physiotherapy</option>
                           <option value="Rheumatology">Rheumatology</option>
                           <option value="Urology">Urology</option>
                           <option value="Neurosurgery">Neurosurgery</option>
                           <option value="Dentistry">Dentistry</option>
                           <option value="ENT">ENT</option>
                    </select>
                </div>
            </div>
                <div class="inputs">
                    <h3>Select Doctor</h3>
                    <div class="options">
                        <select name="myDoctor">
                            <option value="Prof Dr. Inayatullah">Prof Dr. Inayatullah</option>
                            <option value="Dr. Tehmina Yousaf">Dr. Tehmina Yousaf</option>
                            <option value="Brig. Dr. Zubair Babar, SI(M) (R)">Brig. Dr. Zubair Babar, SI(M) (R)</option>
                            <option value="Prof. Dr. Nighat Bilal">Prof. Dr. Nighat Bilal</option>
                            <option value="Dr. Faridullah Khan">Dr. Faridullah Khan</option>
                            <option value="Prof Dr. Imran Sikander Khan">Prof Dr. Imran Sikander Khan</option>
                            <option value="MAJ GEN (R). DR. WAQAR H">MAJ GEN (R). DR. WAQAR H</option>
                            <option value="MAJ GEN (R). DR. Shamir Haider">MAJ GEN (R). DR. Shamir Haider</option>
                        </select>
                    </div>
                    <div class="inputs">
                <label for="appointmentDate">Select Appointment Date & Time</label>
                <input type="datetime-local" name="myAppointmentDate" id="appointmentDate" required>
            </div>
                    <div class="inputs">
                        <label for="message">Message</label>
                        <textarea class="textarea" name="myMessage" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <div class="btn">
                        <button type="submit" class="button">Submit</button>
                    </div>
        </form>
    </Section>
</body>

</html>
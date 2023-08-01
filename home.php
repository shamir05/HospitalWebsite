<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADS International Hospital | www.dshospital.com</title>
    <link rel="stylesheet" href="css/homestyle.css">
</head>

<body>

    <div id="navbar">
        <div id="logo">
            <img src="img/logo.png" alt="not working">
        </div>
        <div id="navlist">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="Aboutus.php">About Us</a></li>
                <li><a href="Services.php">Services</a></li>
                <li><a href="Gallery.php">Gallery</a></li>
                <li><a href="departments.php">Departments</a></li>
                <li><a href="Doctors.php">Our Doctors</a></li>
                <li><a href="timeTable.php">Dr Time Table</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <!-- <li><a href="#">Location</a></li> -->
            </ul>
        </div>
        <div id="bookAppointment">
            <li><a href="BookAppointment.php">Book Appointment</a></li>
        </div>
    </div>
    <section id="home">
        <h1 class="h-main center">WELCOME TO ADS INTERNATONAL HOSPITAL</h1>
    </section>
    <div class="container">
        <section id="aboutus">
            <h1 class="h-primary center">ABOUT US</h1>
            <div id="mission">
                <div class="about">
                    <h4 class="h-secondary">Our Mission</h4>
                    <p>A non commercial and non-profit organization.
                        Open to everyone and affordable to all.
                        A forum for academics and research. A provider of quality medical diagnosis and care.</p>
                </div>
                <div class="about">
                    <h4 class="h-secondary">Vision</h4>
                    <p>To be a leading patient care services provider in the country and a pioneer in healthcare education.To be a quality healthcare provider to all individuals and excel in medical education.We inspire to be the first choice for medical care and a pioneer in healthcare education.</p>
                </div>
                <div class="about">
                    <h4 class="h-secondary">Values</h4>
                    <p>Thank you very much. Which of them, for he fled with the architect, so that they were born
                        expediently,
                        his great business? To him I will explain everything loosely, and not because of any consequence
                        escape
                        him! If the customer is very smart, he or she will be able to achieve the desired result. To,
                        therefore,
                        you must when he asks us to find out some options.</p>
                </div>
            </div>
        </section>

        <section id="Services">
            <h1 class="h-primary center">OUR SERVICES</h1>
            <div id="servicesContainer">
                <div class="box" id="Healthcare">
                    <h4 class="h-secondary">Home HealthCare Services</h4>
                    <p>Our top priority is to provide the convenient online consultation services. We have provided our
                        Outpatient Department with dedicated WhatsApp numbers for the consultation with doctors.</p>
                </div>
                <div class="box" id="Thoracic">
                    <h4 class="h-secondary">Thoracic Surgery</h4>
                    <p>Thoracic / chest surgery department provides all thoracic surgical elective and emergency
                        consultancies in collaborationwith pulmonology, thoracic anesthesiology and critical care
                        services.
                    </p>
                </div>
                <div class="box" id="Cardiology">
                    <h4 class="h-secondary">Cardiology</h4>
                    <p>DS Hospital is the trendsetter in cardiology and cardiac services. Our cardiology department
                        treats
                        all heart related problems to utmost satisfaction. It is equipped with state-of-the-art latest
                        equipment.</p>
                </div>
            </div>
        </section>
        <section id="ourdoctor">
            <h1 class="h-primary center">OUR DOCTORS</h1>
            <?php
            include('conn.php');
            $sql = "SELECT * FROM `add_doctor` LIMIT 3";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="doctor">
                        <div class="box" id="doc">
                            <div class="docProfile">
                                <div class="img"><img
                                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']) ?>"
                                        alt="Not Working"></div>
                                <div class="dname">
                                    <h4 class="h-secondary">
                                        <?php echo $row['fullName'] ?>
                                    </h4>
                                </div>
                            </div>
                            <div>
                                <h5 class="depname">
                                    <?php echo $row['department'] ?>
                                </h5>
                            </div>
                            <div>
                                <p><?php echo $row['education'] ?></p>
                            </div>
                        </div>
                        <?php
                }
            }
            ?>
        </section>
    </div>
    <section id="contact">
        <h1 class="h-primary center">Contact Us</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $sql = "INSERT INTO `message`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
            $result = mysqli_query($conn, $sql);
        }
        ?>
        <div class="contact-flexbox">
            <div id="contact-box">
                <form class = "form" action="/web/home.php" method="POST">
                    <h3 class ="h-secondary center">Write us a Message</h3>
                    <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email" placeholder="Enter your Email">
                </div>
                <div class="form-group">
                    <label for="message">Message: </label>
                    <textarea name="message" id="message" cols="10" rows="5"></textarea>
                </div>
                <div class="form-group">
                <button type="submit" class="button" >Submit</button>
                </div>
            </form>
        </div>
        <div id="contact-info">
        <h3>Contact Information</h3>
            <div class = "flex">
                <img src="img/phoneNo.png" alt="not working">
                <h3>+92 (051) 8449100</h3>
            </div>
            <div class="flex">
                <img src="img/mail.png" alt="not working">
                <h3>contact@ads.com</h3>
            </div>
            <div class="flex">
                <img src="img/location.png" alt="not working">
                <h3>ADS International Hospital, <br> Near Golra Morr, Peshawar <br> Road, Islamabad, Pakistan</h3>
            </div>
        </div>
    </div>
    </section>
    <footer>
        <div class="center">
            Copyright &copy; www.dshospital.com. All rights reserved!
        </div>
    </footer>
</body>

</html>
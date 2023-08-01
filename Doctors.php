<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link rel="stylesheet" href="css/homestyle.css">
</head>

<body>
    <section class="container">

        <?php
        include('conn.php');
        ?>

        <h1 class="h-primary center">OUR DOCTORS</h1>
        <!-- <div id="doctor"> -->
        <div id="dr">
            <?php
            $sql = "SELECT * FROM `add_doctor`";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="dprofile">
                        <div class="img"><img
                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']) ?>"
                                alt="Not Working">
                            </div>
                        <div class="dname">
                            <h3>
                                <?php echo $row['fullName'] ?>
                            </h3>
                        </div>
                        <div>
                            <h5><?php echo $row['department'] ?></h5>
                        </div>
                        <div>
                            <p><?php echo $row['education'] ?></p>
                        </div>
                        </div>
                        <?php

}
}
?>
        </div>
        <!-- </div> -->
        <!-- <div id="dr">
        <div class="dprofile">
            <div class="img"><img src="img/dr5f.jpg" alt="Not Working"></div>
            <div class="dname">
                <h4>Prof. Dr. Nighat Bilal</h4>
            </div>
            
        </div>
        <div>
            <h3>Gynecology</h3>
        </div>
        <div>MBBS-Punjab Medical College Faisalabad 1995/96</div>
        <div>FCPS, MCPS,CHPE</div>
    </div>
    <div class="box" id="dr">
        <div class="dprofile">
            <div class="img"><img src="img/dr3.jpg" alt="Not Working"></div>
            <div class="dname"><h4>Prof Dr. Inayatullah</h4></div>
        </div>
        <div><h3>Neurosurgery</h3></div>
        <div>MBBS, FRCS (Ireland)</div>
        <div>FRCS (Neurosurgery, UK)</div>
        <div>Intercollegiate Speciality Board in Neurosurgery (UK)</div>
        <div>Specialist in Brain and Spine</div>
    </div>
    <div class="box" id="dr">
        <div class="dprofile">
            <div class="img"><img src="img/dr4.jpg" alt="Not Working"></div>
            <div class="dname"><h4>Prof Dr. Imran Sikander Khan</h4></div>
        </div>
        <div><h3>Gastroenterology</h3></div>
        <div>MBBS, DABIM (USA), DABGE (USA), FACG (USA)</div>
    </div>
    <div class="box"  id="dr">
        <div class="dprofile">
            <div class="img"><img src="img/dr2.jpg" alt="Not Working"></div>
            <div class="dname"><h4>Dr. Tehmina Yousaf</h4></div>
        </div>
        <div><h3>Oncology</h3></div>
        <div>MBBS, FCPS, SCE Medical Oncology RCP (UK), ESMO</div>
    </div>
    <div id="dr">
        <div class="dprofile">
            <div class="img"><img src="img/dr6.jpg" alt="Not Working"></div>
            <div class="dname"><h4>MAJ GEN (R). DR. Shamir Haider</h4></div>
        </div>
        <div><h3>General Surgery</h3></div>
        <div>Prof of Surgery / HOD PIMS</div>
        <div>Principal FMDC Islamabad</div>
        <div>Consultant General & Laparoscopic Surgeon KULSUM International Hospital</div>
    </div>
    <div id="dr">
        <div class="dprofile">
            <div class="img"><img src="img/dr7.jpg" alt="Not Working"></div>
            <div class="dname">MAJ Dr. Ali Khan</div>
        </div>
        <div>Anesthetics</div>
    </div>
    <div id="dr">
        <div class="dprofile">
            <div class="img"><img src="img/dr8.jpg" alt="Not Working"></div>
            <div class="dname">Dr. Faridullah Khan</div>
        </div>
        <div>Orthopaedics</div>
    </div>-->
    </section>
</body>

</html>
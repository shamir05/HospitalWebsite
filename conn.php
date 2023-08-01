<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'hms');


  //Connecting to database
  $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  
  //check the connection
  if($conn==false){
    dir('Err: Cannot connect' . mysqli_connect_error());
  }
?>
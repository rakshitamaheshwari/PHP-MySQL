<?php

$host = 'server-my.mysql.database.azure.com';
$username = 'azuresql@server-my';
$password = 'Rakshi@123';
$db_name = 'test';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

#if (isset($_POST['Submit'])) {

 //This makes sure they did not leave any fields blank

if (!$_POST['firstname'] | !$_POST['lastname'] | !$_POST['gender'] | !$_POST['email'] | !$_POST['contact'] | !$_POST['country'] ) {

                die('You Did Not Fill All Of The Required Fields') ;

}

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$country = $_POST['country'];


// Database connection
$sql = "INSERT INTO information (`FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `CONTACT`, `COUNTRY`) VALUES ('".$firstName."', '".$lastName."', '".$gender."', '".$email."', '".$contact."', '".$country."')";


//Execute query & Show error msg if any error in query
if (!mysqli_query($conn, $sql)) {
   echo "Error: " . mysqli_error($conn);
}
else{
        printf("Details Submitted Successfully. You May Close This Page Now !!");
}
#}
//Close the connection
mysqli_close($conn);
?>

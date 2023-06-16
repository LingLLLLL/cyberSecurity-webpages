<?php
    include("server.php");
    $username = "";
    $password = "";

?>

<!-- ===================data store============================ -->

<?php

    $conn = mysqli_connect("localhost", "tester", "tester", "myDB");

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " .mysqli_connect_error());
    }

    // Taking all 2 values from the form data(input)
    $username =  $_REQUEST['username'];
    $password =  $_REQUEST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      //check password requirements on server side before Performing insert query execution
      if (strlen($_POST['password']) < 8 || !preg_match("#[0-9]+#", $_POST['password']) || !preg_match("#[a-z]+#", $_POST['password']) || !preg_match("#[A-Z]+#", $_POST['password']) || !preg_match("#\W+#", $_POST['password'])) {
        echo "Password must contain at least one lowercase letter, one uppercase letter, one digit, one special character, and be at least 8 characters long";

      }else{
            // Performing insert query execution
    $sql = "INSERT INTO Users (Username, Password)
        VALUES ('$username','$hashed_password')";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration successful!!Welcome!")</script>';
        header('Location: login.php');
    } else {
        echo '<script>alert("ERROR: Hush! Sorry")</script>';
        echo "ERROR is : $sql. ".mysqli_error($conn);
    }
      }



    // Close connection
    mysqli_close($conn);
?>

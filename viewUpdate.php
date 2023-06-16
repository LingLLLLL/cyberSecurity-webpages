<?php
    include("server.php");
    $conn = mysqli_connect("localhost", "tester", "tester", "myDB");
    // $conn = mysqli_connect("localhost", "root", "", "myDB");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Taking all 8 values from the profile data
    $user =  $_SESSION['logUserName'];
    $exercise = $_REQUEST['ExerciseName'];
    $repetitions = $_REQUEST['Repetitions'];
    $sets = $_REQUEST['Sets'];
    $weight = $_REQUEST['Weight'];


    // Performing update query execution
    // here our table name is ourDB
    $sql = "UPDATE Exercises 
                SET Repetitions = '$repetitions', 
                    Sets = '$sets', 
                    Weight = '$weight'
                WHERE Username = '$user' AND ExerciseName = '$exercise'";

    if ($conn->query($sql) === TRUE) 
    {
        echo '<script>alert("Exercise Updated successful!!")</script>';
        header("Location: viewExercises.php");
    } 
    else 
    {
        echo '<script>alert("ERROR: Hush! Sorry")</script>';
        echo "ERROR is : " . $conn->error;
    }

    // Close connection
    mysqli_close($conn);


?>

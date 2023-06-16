<?php
    include("server.php");
    $user = "";
    $exercise = "";
    $repetitions = "";
    $sets = "";
    $weight = "";

    $conn = mysqli_connect("localhost", "tester", "tester", "myDB");
    // $conn = mysqli_connect("localhost", "root", "", "myDB");
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $user = $_SESSION['logUserName']; 
    $exercise = $_REQUEST['ExerciseName'];
    $repetitions = $_REQUEST['Repetitions'];
    $sets = $_REQUEST['Sets'];
    $weight = $_REQUEST['Weight'];

    

    $sql = "INSERT INTO Exercises (Username, ExerciseName, Repetitions, Sets, Weight)
        VALUES('$user', '$exercise', '$repetitions', '$sets', '$weight')";
    if($conn->query($sql) === TRUE)
    {
        print("success");
    }
    else
    {
        print("failure<br>");
        print("Error description: " . mysqli_error($conn));
    }
    header("Location: viewExercises.php");
?>
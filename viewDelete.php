<?php
    // $conn = mysqli_connect("localhost", "root", "", "myDB");
    $conn = mysqli_connect("localhost", "tester", "tester", "myDB");
    if ($conn->connect_error) 
    {
      die('Connect Error (' .
      $conn->connect_errno . ') '.
      $conn->connect_error);
    }
    $exercise = $_GET['ExerciseName'];
    $sql = "DELETE FROM Exercises WHERE ExerciseName ='".$exercise."'";
    $conn->query($sql);
    header("Location: viewExercises.php");
?>
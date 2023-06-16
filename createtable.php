<?php
    // Create tables in the database, seed an initial entry
    // Run as http://localhost/Trans-Web-Project/createtable.php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $sql = "CREATE TABLE Users (
        Username VARCHAR(50) PRIMARY KEY,
        Password VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                   )";

    $sql2 = "CREATE TABLE Exercises (
        Username VARCHAR(50),
        ExerciseName VARCHAR(255),
        Repetitions INT(3),
        Sets INT(2),
        Weight FLOAT(10, 2)
    )";

    $sql3 = "ALTER TABLE Exercises
        ADD FOREIGN KEY (Username)
        REFERENCES Users(Username)";

    if ($conn->query($sql) === TRUE) {
        echo "Table Users created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    if ($conn->query($sql2) === TRUE) {
        echo "Table Exercises created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    if ($conn->query($sql3) === TRUE) {
        echo "Added Foreign Key to Username successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    // Hashed password generated by password_hash()
    $createUser = "INSERT INTO Users (Username, Password)
                    VALUES ('user1', '" . password_hash('user1password', PASSWORD_DEFAULT) . "')";

    if ($conn->query($createUser) === TRUE) {
        echo "Base user created<br>";
    } else {
        echo "Error creating user: " . $conn->error . "<br>";
    }

    $createExercise1 = "INSERT INTO Exercises (Username, ExerciseName, Repetitions, Sets, Weight)
                        VALUES ('user1', 'curl', 10, 3, 25.5)";

    if ($conn->query($createExercise1) === TRUE) {
        echo "Base Exercise1 created<br>";
    } else {
        echo "Error creating Exercise: " . $conn->error . "<br>";
    }

    $createExercise2 = "INSERT INTO Exercises (Username, ExerciseName, Repetitions, Sets, Weight)
                        VALUES ('user1', 'tricep curl', 20, 1, 100)";
    if ($conn->query($createExercise2) === TRUE) {
        echo "Base Exercise2 created<br>";
    } else {
        echo "Error creating Exercise: " . $conn->error . "<br>";
    }

    print("Proceed to: <br>");
    print("http://localhost/Trans-Web-Project/createDBUser.php");

$conn->close();

?>

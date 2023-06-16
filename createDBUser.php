<?php
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
    $createDatabaseUser = "CREATE USER 'tester'@'localhost' IDENTIFIED BY 'tester';";
    if ($conn->query($createDatabaseUser) === TRUE) 
    {
        echo "Database user created<br>";
    } 
    else 
    {
        echo $conn->error . "<br>";
    }
    $permission =  "GRANT SELECT, INSERT, UPDATE, DELETE ON `mydb`.* TO 'tester'@'localhost';"; 
    if ($conn->query($permission) === TRUE) 
    {
        echo "Database user permission created<br>";
    } 
    else 
    {
        echo $conn->error . "<br>";
    }
    print("Proceed to: <br>");
    print("http://localhost/Trans-Web-Project/");

    $conn->close();
?>
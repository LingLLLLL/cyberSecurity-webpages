<?php
    // Run as http://localhost/Trans-Web-Project/createdb.php, creates initial DB
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    print("Next step: <br>");
    print("http://localhost/Trans-Web-Project/createtable.php");
    
    $conn->close();
?>

<?php
    // CREATE USER 'tester'@'localhost' IDENTIFIED WITH caching_sha2_password BY '***';
    // GRANT SELECT, INSERT, UPDATE, DELETE ON *.* TO 'tester'@'localhost';
    // ALTER USER 'tester'@'localhost'
    // REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
    session_start();

    // $conn = mysqli_connect("localhost", "root", "", "myDB");
    $conn = mysqli_connect("localhost", "tester", "tester", "myDB");
    if (isset($_POST['login'])) {
        // Hash the password before querying the database
        $hashed_password = password_hash($_POST["logUserPassword"], PASSWORD_DEFAULT);
        $sql = mysqli_query($conn, "SELECT * FROM Users WHERE Username='" . $_POST["logUserName"] . "'");
        $num = mysqli_num_rows($sql);
        if ($num > 0) {

        $row = mysqli_fetch_array($sql);
        // Verify the hashed password with the entered password
        if (password_verify($_POST["logUserPassword"], $row['Password'])) {
            $_SESSION['logUserName'] = $row['Username'];
            $_SESSION['logUserPassword'] = $row['Password'];
        }
    }
        $sql2 = mysqli_query($conn, "SELECT * FROM Exercises WHERE Username='" . $_POST["logUserName"]);
        $num2 = mysqli_num_rows($sql2);
        if ($num2 > 0) {
            $row = mysqli_fetch_array($sql2);
            $_SESSION['exName'] = $row['Name'];
            $_SESSION['exRepetitions'] = $row['Repetitions'];
            $_SESSION['exSets'] = $row['Sets'];
            $_SESSION['exWeight'] = $row['Weight'];
        }
    } elseif (isset($_SESSION['logUserName'])) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE Username='" . $_SESSION['logUserName'] . "' ");
        $num = mysqli_num_rows($sql);
        if ($num > 0) {
            $row = mysqli_fetch_array($sql);
            $_SESSION['logUserName'] = $row['Username'];
            $_SESSION['logUserPassword'] = $row['Password'];
        }
        $sql2 = mysqli_query($conn, "SELECT * FROM Exercises WHERE Username='" . $_SESSION['logUserName'] . "' ");
        $num2 = mysqli_num_rows($sql2);
        if ($num2 > 0) {
            $row = mysqli_fetch_array($sql2);
            $_SESSION['exName'] = $row['Username'];
            $_SESSION['exRepetitions'] = $row['Repetitions'];
            $_SESSION['exSets'] = $row['Sets'];
            $_SESSION['exWeight'] = $row['Weight'];
        }
    }
    mysqli_close($conn);
?>

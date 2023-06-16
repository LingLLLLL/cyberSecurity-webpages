<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="login.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&family=Solitreo&display=swap" rel="stylesheet" />
  <title>Login</title>
</head>

<body>
  <div class="navbar">
    <div class="navbar-leftside">
      <h1>
        <a class="name" href="index.php">myfitnessfit</a>
      </h1>
    </div>

    <div class="navbar-rightside">
      <a href="login.php">Log in</a>
      <a href="signup.php">Sign up</a>
    </div>
  </div>

  <?php
  session_start();

  $loginUserName = "";
  $loginPwd = "";
  // I don't think these do anything?
  // $loginEml = "";
  // $loginFNm = "";
  // $loginLNm = "";
  // $loginCtry = "";
  // $loginMarital = "";
  // $loginChld = "";
  // $loginAdmin = "";

  $conn = mysqli_connect("localhost", "root", "", "myDB");
  if (isset($_POST['login'])) {
    // Check connection
    // if ($conn->connect_error) {
    //   die("Connection failed: " . $conn->connect_error);
    // }
    $stmt = $conn->prepare("SELECT * FROM users WHERE Username=? AND Password=?");
    $stmt->bind_param("ss", $user, $pass);

    $user = $_POST["logUserName"];
    $pass = $_POST["logUserPassword"];
    $stmt->execute();
    $result = $stmt->get_result();
    // var_dump($result);
    $userData = $result->fetch_assoc();
    // var_dump($userData);

    // $sql = mysqli_query($conn, "SELECT * FROM users WHERE Username='" . $_POST["logUserName"] . "' AND Password='" . $_POST["logUserPassword"] . "'");
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      // $row = mysqli_fetch_array($sql);
      $row = $userData;
      $_SESSION['logUserName'] = $row['Username'];
      $_SESSION['logUserPassword'] = $row['Password'];

      echo '<script>alert("Login successful!!")</script>';
      header('Location: viewExercises.php');
    } else {
      echo '<script>alert("Sorry, Please Enter Correct Username and Password")</script>';
    }
  }

  mysqli_close($conn);
  ?>

  <div class="main">
    <div class="login">
      <h1>Login</h1>
      <form method="post" class="login-input">
        <label for="text">Username</label>
        <input type="text" name="logUserName" id="logUserName" value="<?php echo $loginUserName; ?>" />

        <label for="password">Password</label>
        <input type="password" name="logUserPassword" id="logUserPassword" value="<?php echo $loginPwd; ?>" />
        <input type="submit" name="login" value="Log In">
      </form>
    </div>
  </div>
  <img class="peppa" src="assets/tug-of-war-titan-games.gif" alt="pull" />

</body>

</html>
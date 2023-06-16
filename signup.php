<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup</title>
  <script defer src="password.js"></script>
  <link rel="stylesheet" href="login.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Iso&family=Solitreo&display=swap" rel="stylesheet" />
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
  
  <div class="textTypeWriter">
    <h3>
      Start your fitness journey with us!! Sign up to get our exclusive offer!
    </h3>
  </div>

  <?php
    $username = "";
    $password_hashed = ""; // Hashed signup password
    $error = "";
  ?>

  <div class="main">
    <div class="signup">
      <h1>Signup</h1>
      <form action="insertUser.php" method="post" class="signin-input">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>" required/>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="<?php echo $password_hashed; ?>" required/>
        <h3 id="passwordError"> </h3>

        <button class="signup-button">Signup</button>
      </form>
 
    </div>
  </div>

</body>

</html>
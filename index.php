<?php include('server.php') ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <script defer src="script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik+Iso&family=Solitreo&display=swap"
      rel="stylesheet"
    />
    <title>Fitness Tracker</title>
  </head>
  <body>
    <div class="navbar">
      <div class="navbar-leftside">
        <h1>
          <a class="name" href="index.php">myfitnessfit</a>
        </h1>
      </div>

      <div class="navbar-rightside">
      <?php if(isset($_SESSION['logUserName'])):?>
        <a href="viewExercises.php">Welcome <span class="usernamenavbar"><?= $row['Username']?></span> </a>
        <a href="logout.php">Log out</a>
        <?php else:?>
      <a href="login.php">Log in</a>
      <a href="signup.php">Sign up</a>
      <?php endif;?>
      </div>
    </div>

    <div class="hero">
      <h1 id="welcome">Welcome</h1>
      <img
        class="explode"
        id="boom"
        width="170px"
        height="170px"
        src="assets/explode.png"
        alt="boom"
      />
      <img
        class="hidden"
        id="run"
        src="assets/chris-evans-captain-america.gif"
        alt="run"
      />
    </div>
  </body>
</html>

<?php 
  include('server.php');
  // $conn = mysqli_connect("localhost", "root", "", "myDB");
  $conn = mysqli_connect("localhost", "tester", "tester", "myDB");
  if ($conn->connect_error) 
  {
    die('Connect Error (' .
    $conn->connect_errno . ') '.
    $conn->connect_error);
  }
  $sql = "SELECT * FROM Exercises WHERE Username='" . $_SESSION['logUserName'] . "' " . "ORDER BY ExerciseName";
  
  $result = $conn->query($sql);
  $conn->close();
  $ExerciseName = "";
  $Repetitions = "";
  $Sets = "";
  $Weight = "";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrator</title>
  <link rel="stylesheet" href="admin.css" />
  <link rel="stylesheet" href="styles.css" />
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
      <?php 
        if(isset($_SESSION['logUserName'])):?>
        <a href="viewExercises.php">Welcome <span class="usernamenavbar"><?= $row['Username']?></span> </a>
        <a href="logout.php">Log out</a>
        <?php else:?>
      <a href="login.php">Log in</a>
      <a href="signup.php">Sign up</a>
      <?php endif;?>
    </div>
  </div>

  <h1 id = "tableTitle">View Database</h1>
  <table>
    <tr>
      <th>Exercise</th>
      <th>Repetitions</th>
      <th>Sets</th>
      <th>Weight</th>
    </tr>
    <?php
      while($rows = $result->fetch_assoc())
      {
    ?>
    <tr>
      <form action="viewUpdate.php" method="post">
        <td><input type="text" name="ExerciseName" id="ExerciseName" value="<?php echo $rows['ExerciseName'];?>"></td>
        <td><input type="number" name="Repetitions" id="Repetitions" value="<?php echo $rows['Repetitions'];?>"  min = 1></td>
        <td><input type="number" name="Sets" id="Sets" value="<?php echo $rows['Sets'];?>" min = 1></td>
        <td><input type="number" name="Weight" id="Weight" value="<?php echo $rows['Weight'];?>" min = 1></td>
        <td><a href="viewDelete.php?ExerciseName=<?php echo $rows['ExerciseName']?>" class='deleteBtn'>Delete</a></td>
        <td><input type="submit" class="deleteBtn" value="Update"></button></td>
      </form>
    </tr>
    <?php
      }
    ?>
    <tr>
      <form action="viewInsertExercise.php" method="post">
        <td><input type="text" name="ExerciseName" id="ExerciseName" value="<?php echo $ExerciseName; ?>"></td>
        <td><input type="number" name="Repetitions" id="Repetitions" value="<?php echo $Repetitions; ?>" min = 1></td>
        <td><input type="number" name="Sets" id="Sets"  value="<?php echo $Sets; ?>" min = 1></td>
        <td><input type="number" name="Weight" id="Weight"  value="<?php echo $Weight; ?>" min = 1></td>
        <td><input type="submit" class="deleteBtn" value="Add"></button></td>
      </form>
    </tr>

  </table>
  

  
</body>

</html>
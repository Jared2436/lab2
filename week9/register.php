<!DOCTYPE html>
<html>
<head>
   <style>
     .error {color: #FF0000;}
   </style>
   <title>Redja's Website</title>
   <link rel="stylesheet" type="text/css" href="test.css">
   https://l.messenger.com/l.php?u=https%3A%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DOpen%2520Sans%253A300%252C300i%252C400%252C400i%252C600%252C600i%252C700%252C700i%257CRaleway%253A300%252C300i%252C400%252C400i%252C500%252C500i%252C600%252C600i%252C700%252C700i%257CPoppins%253A300%252C300i%252C400%252C400i%252C500%252C500i%252C600%252C600i%252C700%252C700i&h=AT2y4-FE3xecXQt8iuzDjR4p6rK-6bVRg9xzUaFBiXzfvnpXWtjcfsyS5L4xx6Zq7XwtoB4_wl4O26Ez_eLauVk9Ad3ggYNOUkULAzKeKnxstc0UQELmpI7lqVZ_njGkCtmrZg
</head>
<body>
    <header class="header3">
        <div class="main">
           
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="aboutt.php">About</a></li>
              <li><a href="pictures.php">Pictures</a></li>
              <li class="active"><a href="register.php">Register</a></li>
              
            </ul>
            
        </div>
          <!--  <video class="video3" height="40%" width="40%" controls>
                <source src="imahe/lulu.mp" type="video/mp4">
                
            </video>
          -->    

          <?php 
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $servername = "localhost";
    $username = "webprogmi212";
    $password = "webprogmi212";
    $dbname = "webprogmi212";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO jbdeleon_myguest (name, email, website, comment, gender)
    VALUES ('$name', '$email', '$website', '$comment', '$gender')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

        
    </header>
    
</body>
</html>
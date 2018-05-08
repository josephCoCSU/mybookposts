<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost', 'root', '', 'bookpostsDB');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //two passwords are equal
  if ($_POST['password'] == $_POST['confirmpassword']) {
    
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
    
    //check file type is image
    if (preg_match("!image!", $_FILES['avatar']['type'])) {
      
      //copy image to images folder
      if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) {
        
        $_SESSION['username'] = $usernname;
        $_SESSION['avatar'] = $avatar_path;
        
        $sql = "INSERT INTO user (username, email, password, avatar) "
             . "VALUES ('$username', '$email', '$password', '$avatar_path')";
        
        //if query successful, redirect to welcome.php page.
        if ($mysqli->query($sql) == true) {
          $_SESSION['message'] = 'Registration successful';
          header("location: welcome.php");
        }
        else {
          $_SESSION['message'] = "User could not be added.";
        }
        
      }
      else {
        $_SESSION['message'] ="File upload failed.";
      }
      
    }
    else {
       $_SESSION['message'] ="File must be .gif, .jpeg, or .png";
      
    }
  }
  else {
    $_SESSION['message'] ="Passwords did not match";
    
  }
}

?>
<!-- >Sign up form</-->

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create your account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
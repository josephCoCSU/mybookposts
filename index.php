<!--<?php-->
<!--    require_once('database.php');-->
<!--    // Get customers-->
<!--    $query = 'SELECT , ???? FROM ???';-->
<!-- // result set-->
<!--    $books = $db->query($query);-->
<!--?>-->


<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>

<title>Login Form in PHP with Session</title>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
	<div class="omdule">
		<h1>BookPosts</h1>
<div id="login">
		<form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
		<input id="name" name="username" placeholder="username" type="text" required>
		<input id="password" name="password" placeholder="**********" type="password" required>
		<input name="submit" type="submit" value=" Login " class="btn btn-block btn-primary" />
		<span><?php echo $error; ?></span>
		</form>
<button type="button" onclick="location.href='form.php'">Sign up</button>
</div>
<!-- >Sign up form</-->
</div>
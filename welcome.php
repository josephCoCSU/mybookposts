<link rel="stylesheet" href="form.css">

<?php session_start(); ?>
<div class = "body content">
    <div class="welcome">
        <div class="imgcontainer">
        <a href="index.php"><img src="books.png" style="width:120px;height:140px;border:0;">
        </a>
        </div>
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        <span class="user"><img src='<?= $_SESSION['avatar'] ?>'</span><br />
        Welcome <span class="user"><?= $_SESSION['username'] ?></span>
        
        
        <?php
        
        $mysqli = new mysqli('localhost', 'root', '', 'bookpostsDB');
        $sql = 'SELECT username, avatar FROM user';
        $result = $mysqli->query($sql); //$result = mysqli_result object
        
        ?>
        
        <div id = "registered">
            <span>All registered users</span>
            <?php
            while($row = $result->fetch_assoc()){
                echo "<div class='userlist'><span>$row[username]</span><br />";
                echo "<img src='$row[avatar]'></div>";
                
            }
            ?>
        </div>
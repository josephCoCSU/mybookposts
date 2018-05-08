<?php
    $dsn = 'localhost';
    $dbname = 'bookpostsDB';
    $username = 'mgs_user';
    $password = 'pa55word';
    
    //create connection
    $db = new mysqli($dsn,  $username, $password, $dbname);
    
    //check connection
    if(mysqli_connect_errno())
    {
        echo '<p>Error: could not connect to DB.<br/>Please try later.</p>';
        include('database_error.php');
        exit();
    }
?>
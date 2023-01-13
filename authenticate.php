<?php
session_start();
//
//require 'include/db.php';
//
//if ( !isset($_POST['username'], $_POST['password'])) {
//    exit('Please fill both the username and password fields!');
//}   if($stmt = $con->prepare('SELECT username, password FROM users WHERE username = ?')) {
//    $stmt->bind_param('s', $_POST['username']);
//    $stmt->execute();
//
//    $stmt->store_result();
//    if($stmt->num_rows > 0) {
//        $stmt->bind_result($username, $password);
//        $stmt->fetch();
//
//        if (password_verify($_POST['password'], $password)) {
//            session_regenerate_id();
//            $_SESSION['loggedin'] = TRUE;
//            $_SESSION['name'] = $_POST['username'];
//            $_SESSION['id'] = $id;
//            header('Location: home.php');
//        } else {
//            echo 'Incorrect username and/or password!';
//        }
//    } else {
//        echo 'Incorrect username and/or password!';
//    }
//
//    $stmt->close();
//}
//?>

<?php

require 'include/db.php';

$dbconnect = new dbconnection();

if ( !isset($_POST['username'], $_POST['password'])) {
    exit('Please fill both the username and password fields!');
}

if ($query = $dbconnect -> prepare($sql = 'SELECT id, username, password FROM users WHERE username = ?')) {
      //$query->bindParam(':uname', $_POST['username']);
      $query -> execute([$_POST['username']]) ;


      $aantalgevonden = $query->rowCount();
      //echo $aantalgevonden;
      //exit();
       if ($aantalgevonden > 0) {
           //$query->bind_result($username, $password);
           $recset = $query -> fetch(PDO::FETCH_ASSOC);

           if (password_verify($_POST['password'], $recset['password'])) {
               session_regenerate_id();
               $_SESSION['loggedin'] = TRUE;
               $_SESSION['name'] = $_POST['username'];
               $_SESSION['id'] = $id;
               header('Location: home.php');
           } else {
               echo 'Incorrect username and/or password! 1';
           }
       } else {
           echo 'Incorrect username and/or password! 2';
       }
}
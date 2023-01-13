<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'thy';
$DATABASE_PASS = '1234';
$DATABASE_NAME = 'forum_klas1';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL:' . mysqli_connect_error());
}
if(isset($_GET['email'], $_GET['code'])) {
    if ($stmt = $con->prepare('SELECT * FROM users WHERE email = ? AND activation_code = ?')) {
        $stmt->bind_param('ss', $_GET['email'], $_GET['code']);
        $stmt->execute();

        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            if ($stmt = $con->prepare('UPDATE users SET activation_code = ? WHERE email = ? AND activation_code = ?')) {
                $newcode = 'activated';
                $stmt->bind_param('sss', $newcode, $_GET['email'], $_GET['code']);
                $stmt->execute();
                echo 'Your account is already activated or doesn\'t exist!';
            }
        } else {
            echo 'The account is already activated or doesn\'t exist!';
        }
    }
}
?>
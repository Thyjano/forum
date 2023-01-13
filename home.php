<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
require 'include/db.php';
$dbconnect = new dbconnection();

$query = $dbconnect -> prepare(
        'SELECT `threads`.*, 
                        `users`.`username` AS username,
                        COUNT(`topics`.`id`) AS aantal
              FROM `threads`
              INNER JOIN `users` ON `users`.`id` = `threads`.`user_id`
              INNER JOIN `topics` ON `topics`.`thread_id` = `threads`.`id`
              GROUP BY `threads`.`id`
');
$query->execute();

//$result = mysqli_fetch_array($query);
//echo "<pre>";
//print_r($result);
//echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Lang" content="nl">
        <meta name="author" content="J.J. Strootman">
        <meta http-equiv="Reply-to" content="noreply@forum.ao-alfa.nl">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="creation-date" content="16/01/2018">
        <meta name="revisit-after" content="60 days">
        <meta name="google" content="nostranslate">
        <meta name="robots" content="noodp, noarchive">

    <meta charset="UTF-8">
    <title>Homepage Forum</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/forum.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
    <?php include 'navbar.php';?>

    <div class="container main-content">
    <div class="row first-row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Threads</span>
                    <div class="collection">

                        <!-- BEGIN VAN EEN THREAD -->
                        <?php
                        while($record = $query->fetch()) {
                        ?>
                        <a href="thread.php?id=<?= $record['id'] ?>" class="collection-item avatar collection-link">
                            <img src="img/icon-php.png" alt="" class="circle">
                            <div class="row">
                                <div class="col s9">
                                    <div class="row last-row">
                                        <div class="col s12">
                                            <span class="title"><?= $record['title'] ?></span>
                                            <p><?= $record['content'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row last-row">
                                        <div class="col s12 post-timestamp">Moderator: <?= $record['username'] ?></div>
                                    </div>
                                </div>
                                <div class="col s3">
                                    <h6 class="title center-align">Statistieken</h6>
                                    <p class="center-align"><?= $record['aantal'] ?> topics</p>
                                </div>
                            </div>
                        </a>
                        <?php } ?>
                        <!-- EINDE VAN EEN THREAD -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- EINDE PAGINA CONTAINER -->

    <!-- BEGIN FOOTER -->

    <?php include 'footer.php';?>

</body>
</html>
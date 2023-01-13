
<?php
$thread_id = $_GET['id'];

$sql = '
        SELECT `topics`.*, COUNT(`replies`.`id`) AS aantal, `users`.`username` AS username, `threads`.`title` AS threadname
        FROM `topics`, `replies`, `users`, `threads`
        WHERE `topics`.`id` = `replies`.topic_id 
        AND `topics`.`thread_id` = :thread_id
        AND `users`.`id` = `topics`.`user_id`
        AND `threads`.`id` = `topics`.`thread_id`
        GROUP BY `topics`.`id`
';

require 'include/db.php';
$dbconnect = new dbconnection();

$query = $dbconnect -> prepare($sql);
$query->execute([ ':thread_id' => $thread_id]);
$topics = $query->fetchAll(PDO::FETCH_ASSOC);
/*echo "<pre>";
print_r($topics);
echo "</pre>";*/
?>
<!DOCTYPE html>
<html lang="nl">
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

    <title>AO Forum</title>

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="img/android-chrome-192x192.png" sizes="192x192">
    <meta name="msapplication-square70x70logo" content="img/smalltile.png">
    <meta name="msapplication-square150x150logo" content="img/mediumtile.png">
    <meta name="msapplication-wide310x150logo" content="img/widetile.png">
    <meta name="msapplication-square310x310logo" content="img/largetile.png">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="../../Forum%20Stootman/design/js/ckeditor/plugins/prism/lib/prism/prism_patched.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/forum.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
  </head>

  <body>
    <!-- BEGIN MENU -->
    <?php include 'navbar.php';?>
    <!-- EINDE MENU -->

    <!-- BEGIN PAGINA CONTAINER -->
    <div class="container main-content">
      <div class="row first-row">

        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><?= $topics[0]['threadname'] ?> - Topics</span>

                    <div class="collection">
                        <?php foreach($topics as $topic): ?>
                        <!-- BEGIN TOPIC -->
                            <a href="topic.php?id=<?= $topic['id'] ?>" class="collection-item avatar collection-link">
                            <img src="http://www.gravatar.com/avatar/fc7d81525f7040b7e34b073f0218084d?s=50" alt="" class="square">

                            <div class="row">
                                
                                <div class="col s8">
                                    <div class="row last-row">
                                        <div class="col s12">
                                            <span class="title"><?= $topic['title'] ?></span>
                                            <p><?= $topic['content'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row last-row">
                                        <div class="col s12 post-timestamp">Gepost door: <?= $topic['username'], $topic['created_at'] ?></div>
                                    </div>
                                </div>

                                <div class="col s2">
                                    <h6 class="title center-align">Replies</h6>
                                    <p class="center replies"><?= $topic['aantal'] ?></p>
                                </div>

                                <div class="col s2">
                                    <h6 class="title center-align">Status</h6>
                                    <div class="status-wrapper">
                                        <span class="status-badge status-open">open</span>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <!-- EINDE TOPIC -->
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
    <!-- EINDE PAGINA CONTAINER -->

    <!-- BEGIN FOOTER -->
    <?php include 'footer.php';?>
      <!-- EINDE FOOTER -->

    <script type="text/javascript" src="../../Forum%20Stootman/design/js/ckeditor/plugins/prism/lib/prism/prism_patched.min.js"></script>
    <script type="text/javascript" src="../../Forum%20Stootman/design/js/main.js"></script>
    <script type="text/javascript" src="../../Forum%20Stootman/design/js/forum.js"></script>
  </body>
</html>
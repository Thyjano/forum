<?php

$sql = '
    SELECT *, `users`.`username` AS username
    FROM `replies`, `topics`, `users`
    WHERE `users`.`id` = `topics`.`user_id`
    GROUP BY `topics`.`id`
';

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
                <div class="card-content clearfix">
                    <span class="card-title">
                        Topic Titel&nbsp;
                        <span class="status-badge status-open">
                            Open
                        </span>
                    </span>
                </div>
            </div>

            <!-- BEGIN TOPIC -->
            <div class="card cyan lighten-5">
                <div class="card-content">
                    <div class="collection">
                        <div class="collection-item row">
                            <div class="col s3">
                                <div class="avatar collection-link">
                                    <div class="row">
                                        <div class="col s3">
                                            <img src="http://www.gravatar.com/avatar/fc7d81525f7040b7e34b073f0218084d?s=50" alt="" class="square">
                                        </div>
                                        <div class="col s9">
                                            <p class="user-name"><?= $topic['username'] ?></p>
                                        </div>
                                    </div>
                                    <p class="post-timestamp">
                                        Gepost op 12-10-2015 11:00
                                    </p>
                                </div>
                            </div>
                            <div class="col s9">
                                <div class="row last-row">
                                    <div class="col s12">
                                        <h6 class="title">Titel van de topic</h6>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium neque fugiat eius illo. Dignissimos voluptatem, architecto. Aspernatur consequatur hic dolorem, atque optio incidunt quibusdam dolorum eveniet, distinctio minima velit rerum.
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis tempore, delectus temporibus maxime ad expedita repudiandae hic nulla minus impedit, aperiam nam dolorem ullam itaque consectetur eaque numquam totam pariatur?
                                        </p>
                                    </div>
                                </div>
                                <div class="row last-row block-timestamp">
                                    <div class="col s6 push-s6">
                                        <p class="post-timestamp last-post-timestamp">Laatst aangepast op: xx-xx-xxxx xx:xx</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EINDE TOPIC -->

            <!-- BEGIN REPLY -->
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Replies</span>
                    <div class="collection">
                        <div class="collection-item row">
                            <div class="col s2">
                                <span class="reply-username">Username</span>
                                <span class="reply-timestamp">Geplaatst op</span>
                            </div>
                            <div class="col s10">
                                <p>Reply tekst</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EINDE REPLY -->

            <!-- TOEVOEGEN VAN EEN REPLY -->
            <div class="card">
                <div class="card-content">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="input-field col s6 has-error">
                                <input id="title" type="text" name="title" placeholder="Tik hier een titel voor het onderwerp in">
                                <label for="title" class="active">Titel van de topic</label>
                                <span>Titel is verplicht!</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <textarea id="message-body" name="body"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6 push-s6">
                                <a href="" class="btn right cyan darken-1">
                                    Bewaren
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- EINDE TOEVOEGEN VAN EEN REPLY -->

        </div>
      </div>
    </div>
    <!-- EINDE PAGINA CONTAINER -->

    <!-- BEGIN FOOTER -->
    <?php include 'footer.php';?>
    <!-- EINDE FOOTER -->

    <script type="text/javascript" src="../../Forum%20Stootman/design/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../../Forum%20Stootman/design/js/main.js"></script>
    <script type="text/javascript" src="../../Forum%20Stootman/design/js/forum.js"></script>
    <script type="text/javascript" src="../../Forum%20Stootman/design/js/editor.js"></script>
  </body>
</html>
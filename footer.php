<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footer</title>

    <style type="text/css">
        main{
            width: 60%;
            margin: 2em auto;
            line-height: 1.8;
            outline: 1px solid #c2c2c2;
            padding: 2em;
            position: absolute;
        }
        footer p{
            padding:0;
            color: white;
            margin: 1em 0;
            font-size: 1rem;
        }
        footer ul{
            list-style: none;
            display: flex;
            margin: 1em 0;
        }
        footer ul li a{
            padding: 1em;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.904);
            transition: 100ms;
        }
        footer ul li a:hover{
            color: red;
        }

        footer{
            width: 100%;
            background: black;
            color: #fff;
            display: grid;
            place-items: center;
            padding: 10px;
            font-size: 1.2rem;
            border-radius: 10px;
        }



        /* Sticky Footer Styling */
        body{
            min-height: 100vh;
            /*overflow-x: hidden;*/
            /*overflow-y: hidden;*/
        }
        .sticky-footer{
            position: sticky;
            top: 100%;
        }


    </style>
</head>
<body>
<footer class="sticky-footer">
    <ul>
        <li><a href="rules.php">Rules</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="disclaimer.php">Disclaimer</a></li>
        <li><a href="privacy.php">Privacy</a></li>
        <li><a href="cookies.php">Cookies</a></li>
    </ul>
    <p>Copyright &copy; by Alfa-college AO, All rights reserved</p>
</footer>
</body>
</html>
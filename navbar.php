<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navbar</title>

    <style type="text/css">
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        li1,a3,button{
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-size: 16px;
            color: white;
            text-decoration: none;
        }

        header{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 0%;
        }

        .logo3{
            cursor: pointer;
        }

        nav {
            background-color: black;
        }

        .nav_links{
            list-style: none;
        }

        .nav_links li{
            display: inline-block;
            padding: 0 20px;
        }

        .nav_links li, a3{
            transition-property: all .3s ease 0s;
        }

        .nav_links li, a3:hover{
            color: red;
        }

        button{
            padding: 9px 25px;
            background-color: rgba(255, 0, 0, 1);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all .3s ease 0s;
        }

        button:hover{
            background-color: rgba(255, 0, 0, 0.5);
        }
        
    </style>
</head>

<body>
    <header>
        <img class="logo3" src="" alt="">
        <nav class="nav">
            <ul class="nav_links">
                <li><a href="home.php">Homepage</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="thread.php">Threads</a></li>
            </ul>
            <a class="cta" href='logout.php'><button>Logout</button></a>

        </nav>
<!--        <a class="cta" href='login.html'><button>Login</button></a>-->
    </header>
</body>
</html>
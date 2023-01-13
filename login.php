<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>

    <div class="center">
      <h1>Login</h1>
      <form action="authenticate.php" method="post">
        <div class="txt_field">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
          <input type="text" name="username" id="username" required>
          <label>Username</label>
        </div>

        <div class="txt_field">
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
          <input type="password" name="password" id="password" required>
          <label>Password</label>
        </div>

        <div class="pass"> <a href="recovery.html">Forgot Password?</a> </div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="register.html">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>

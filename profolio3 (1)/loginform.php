<link rel="stylesheet" type="text/css" href="CSS/style.css">

<html>
    <head>
        <title>Login</title>
    </head>

    <h2>LOGIN</h2>

<body>
<form action="login.php" method="post">
    <label>USERNAME/EMAIL</label>
    <input type="text" name="username" size="15" maxlength="25" />
    
    <label>PASSWORD:</label>
    <input type="password" name="password" size="15" maxlength="25" />
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">


    <input type="submit" value="login" />
    <input type="reset" value="clear" />
    <input type="hidden" name="submitted" value="TRUE" />

    <p>
        Not registered yet? <a href="register.php">REGISTER HERE</a>
    </p>
</form>
</body>
</html>

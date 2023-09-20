<link rel="stylesheet" type="text/css" href="CSS/style.css">

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Register">
        <input type="reset" value="Clear">
        <input type="hidden" name="submitted" value="true">
    </form>
    <p>Already a user? <a href="login.php">Log in here</a></p>
</body>
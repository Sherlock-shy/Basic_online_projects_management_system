<head>
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<?php
session_start();
if (isset($_POST['submitted'])) {
    require_once('connectdb.php');

    $username = isset($_POST['username']) ? $_POST['username'] : false;
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;

    try {
        #register user by inserting the user info 
        $stat = $db->prepare("INSERT INTO users VALUES (default,?,?,?)");
        $stat->execute(array($username, $password, $email));

        $id = $db->lastInsertId();
        echo "Congratulations! You are now registered. Your ID is: $id. Redirecting, if not please click <a href='index.php'>HERE</a> ";
        
        if ($stat) {
          // log in the user automatically
          $_SESSION['username'] = $username;
          var_dump($_SESSION['username']);
          $_SESSION['register_message'] = "Congratulations, you are now registered. Please login to upload/edit project!";
          header("Refresh: 3; URL=index.php");
          exit;
        } else {
          echo "Sorry, an error occurred during registration.";
        }
    } catch (PDOexception $ex) {
        echo "Sorry, a database error occurred! <br>";
        echo "Error details: <em>". $ex->getMessage()."</em>";
    }
}

?>


<?php require_once('registerform.php'); ?>
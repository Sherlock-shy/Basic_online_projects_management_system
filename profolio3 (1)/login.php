<?php
session_start();

if (isset($_POST['submitted'])) {
    if (!isset($_POST['username'], $_POST['password'])) {
        exit('Please fill both the username and password fields for register!');
    }

    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        exit('Invalid CSRF token');
    }
    
    require_once("connectdb.php");

    try {
        $stat = $db->prepare('SELECT uid, password FROM users WHERE username = ? or email =?');
        $stat->execute(array($_POST['username'], $_POST['email']));
        
        if ($stat->rowCount() > 0) {
            $row = $stat->fetch();
            
            if (password_verify($_POST['password'], $row['password'])) {
                $_SESSION["username"] = $_POST['username'];
                $_SESSION["uid"] = $row['uid'];
                header("Location: index.php");
                exit();
            } else {
                echo "<p style='color:red'>Error logging in, password does not match</p>";
            }
        } else {
            echo "<p style='color:red'>Error logging in, Username not found</p>";
        }
    } catch(PDOException $ex) {
        echo("Failed to connect to the database!<br>");
        echo($ex->getMessage());
        exit;
    }
}

$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;
?>

<?php require_once('loginform.php'); ?>

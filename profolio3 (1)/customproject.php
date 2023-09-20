<?php
session_start();
require_once('header.php');
require_once('connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $db_host = 'localhost';
    $db_name = 'u_220036506_db';
    $username = 'u-220036506';
    $password = 'CEH81zqEOVrlwDm';

    try {
        $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $title = !empty($_POST['title']) ? $_POST['title'] : $_POST['cur_title'];
        $description = !empty($_POST['description']) ? $_POST['description'] : $_POST['cur_description'];
        $phase = !empty($_POST['phase']) ? $_POST['phase'] : $_POST['cur_phase'];
        $start_date = !empty($_POST['start_date']) ? date('Y-m-d', strtotime($_POST['start_date'])) : $_POST['cur_start_date'];
        $end_date = !empty($_POST['end_date']) ? date('Y-m-d', strtotime($_POST['end_date'])) : $_POST['cur_end_date'];

        $stmt = $db->prepare("UPDATE projects SET title=?, start_date=?, end_date=?, description=?, phase=? WHERE pid=? AND uid=?");
        $stmt->execute(array($title, $start_date, $end_date, $description, $phase, $_POST['pid'], $_SESSION['uid']));

        echo "<p>Project details updated successfully, redirecting to view list, if not please <a href='index.php'>click here</a>.</p>";
        
        // Redirect the user to index.php
        header("refresh:2;url=index.php");
        exit();
    } catch(PDOException $ex){
        echo "Failed to update project details.<br>";
        echo $ex->getMessage();
        exit;
    }
} elseif (isset($_SESSION['username'])) {

    $db_host = 'localhost';
    $db_name = 'u_220036506_db';
    $username = 'u-220036506';
    $password = 'CEH81zqEOVrlwDm';

    try {
        $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("SELECT pid, title, description, start_date, end_date, phase FROM projects WHERE uid = ?");
        $stmt->execute(array($_SESSION['uid']));
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($projects) > 0) {
            include('updateprojectform.php');

        } else {
            echo "You have not uploaded any projects yet, you can only modify the project you uploaded.";
        }
    } catch(PDOException $ex){
        echo "Failed to retrieve project details.<br>";
        echo $ex->getMessage();
        exit;
    }
} else {
    echo "You must be logged in to update project details.";
}
?>

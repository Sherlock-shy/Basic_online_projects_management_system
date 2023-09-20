<?php
session_start();
require_once('header.php');

$project_phase = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $project_name = $_POST["title"];
    $project_description = $_POST["description"];
    $start_date = $_POST["start_date"];
    $end_date = null;
    $project_phase = $_POST["phase"];
    if ($project_phase === 'complete') {
        $end_date = $_POST["end_date"];
    }

    $db_host = 'localhost';
$db_name = 'u_220036506_db';
$username = 'u-220036506';
$password = 'CEH81zqEOVrlwDm';


    try {
        $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute SQL query
        $stmt = $db->prepare("INSERT INTO projects (title, description, start_date, end_date, phase, uid) VALUES (:title, :description, :start_date, :end_date, :phase, :uid)");
        $stmt->bindParam(':title', $project_name);
        $stmt->bindParam(':description', $project_description);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->bindParam(':phase', $project_phase);
        $stmt->bindParam(':uid', $_SESSION['uid']);
        $stmt->execute();

        echo "Project details uploaded successfully.";
    } catch(PDOException $ex){
        echo "Failed to upload project details.<br>";
        echo $ex->getMessage();
        exit;
    }
} 

?>

<?php include('uploadprojectform.php'); ?>

<script src="script/mian.js"></script>

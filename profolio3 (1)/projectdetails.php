<?php
session_start();
require_once('header.php');
require_once('connectdb.php');

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    try {

        $stmt = $db->prepare("SELECT * FROM projects WHERE pid = :pid");
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($project) {
            
            $stmt = $db->prepare("SELECT username FROM users WHERE uid = :uid");
            $stmt->bindParam(':uid', $project['uid']);
            $stmt->execute();
            $owner = $stmt->fetchColumn();

            echo "<h2>Project Details</h2>";
            echo "<p><b>Project ID:</b> " . $project['pid'] . "</p>";
            echo "<p><b>Project Name:</b> " . $project['title'] . "</p>";
            echo "<p><b>Description:</b> " . $project['description'] . "</p>";
            echo "<p><b>Start Date:</b> " . $project['start_date'] . "</p>";
            if ($project['phase'] === 'complete') {
                echo "<p><b>End Date:</b> " . $project['end_date'] . "</p>";
            }
            echo "<p><b>Phase:</b> " . $project['phase'] . "</p>";
            echo "<p><b>Owner:</b> " . $owner . "</p>";

        if (isset($_SESSION['uid']) && $project['uid'] == $_SESSION['uid']) {
                echo "<p><a href='customproject.php?pid=" . $project['pid'] . "'>Edit Project Details</a></p>";
            }
        } else {
            echo "<p>Project not found!</p>";
        }
    } catch(PDOException $ex){
        echo "Failed to retrieve project details.<br>";
        echo $ex->getMessage();
        exit;
    }
} else {
    echo "<p>Invalid project ID!</p>";
}
?>

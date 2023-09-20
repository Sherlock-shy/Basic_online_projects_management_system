<?php
session_start();
require_once('connectdb.php');
require_once('header.php');
include('searchbar.php');

// Get search queries from form fields
$pid_query = isset($_GET['pid_query']) ? $_GET['pid_query'] : '';
$title_query = isset($_GET['title_query']) ? $_GET['title_query'] : '';
$phase_query = isset($_GET['phase_query']) ? $_GET['phase_query'] : '';
$start_date_query = isset($_GET['start_date_query']) ? $_GET['start_date_query'] : '';
$end_date_query = isset($_GET['end_date_query']) ? $_GET['end_date_query'] : '';

// Establish database connection
$db_host = 'localhost';
$db_name = 'u_220036506_db';
$username = 'u-220036506';
$password = 'CEH81zqEOVrlwDm';

try {
    $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['show_all_button'])) {
        // Execute query to get all projects
        $rows = $db->query("SELECT * FROM projects");
        $results = $rows->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Prepare SQL query with search criteria
        $query = "SELECT * FROM projects WHERE 1=1";
        $params = array();

        if (!empty($title_query)) {
            $query .= " AND title LIKE ?";
            $params[] = '%' . $title_query . '%';
        }

        if (!empty($phase_query)) {
            $query .= " AND phase = ?";
            $params[] = $phase_query;
        }

        if (!empty($start_date_query)) {
            $query .= " AND start_date >= ?";
            $params[] = $start_date_query;
        }

        if (!empty($end_date_query)) {
            $query .= " AND end_date <= ?";
            $params[] = $end_date_query;
        }

        if (!empty($pid_query)){
            $query .= " AND pid <=?";
            $params[] = $pid_query;
        }

        // Prepare and execute SQL query
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        // Fetch results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    if (isset($_SESSION['register_message'])) {
        echo "<div class='message'>{$_SESSION['register_message']}</div>";
        unset($_SESSION['register_message']);
    } elseif (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h2>Welcome ".$username."!</h2>";
    }

    if ($results) {
        include 'projectlisttable.php';
    } else {
        echo "<p>No projects matched in the list!</p>";
    }

} catch (PDOException $ex) {
    echo "Sorry, a database error occurred! <br>";
    echo "Error details <em>". $ex->getMessage()."</em>";
    exit;
}

if (isset($_SESSION['logout_message'])) {
    echo "<div class='message'>{$_SESSION['logout_message']}</div>";
    unset($_SESSION['logout_message']);
    session_unset(); 
    session_destroy(); 
    header("Location: index.php");
    exit;
}
?>
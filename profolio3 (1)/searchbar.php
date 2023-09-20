<link rel="stylesheet" type="text/css" href="CSS/style.css">
<form method="GET" action="index.php">
    <label for="pid_query"> Search by project id:</label>
    <input type="number" id="pid_query" name="pid_query" placeholder="Enter project id...">
    <label for="title_query">Search by project title:</label>
    <input type="text" id="title_query" name="title_query" placeholder="Enter project title...">
    <label for="phase_query">Search by phase:</label>
    <select id="phase_query" name="phase_query">
        <option value="">Select phase...</option>
        <option value="design">Design</option>
        <option value="development">Development</option>
        <option value="testing">Testing</option>
        <option value="deployment">Deployment</option>
        <option value="complete">Complete</option>
    </select>
    <label for="start_date_query">Search by start date:</label>
    <input type="date" id="start_date_query" name="start_date_query">
    <label for="end_date_query">Search by end date:</label>
    <input type="date" id="end_date_query" name="end_date_query">
    <br>
    <button type="submit" name="search_button">Search</button>
    <br>
    <button type="submit" name="show_all_button">Show all projects</button>
</form>
    
    <?php
// Validate the CSRF token
if (isset($_GET['csrf_token']) && !hash_equals($_SESSION['csrf_token'], $_GET['csrf_token'])) {
    exit('Invalid CSRF token');
}
?>
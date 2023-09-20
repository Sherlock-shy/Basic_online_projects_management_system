<link rel="stylesheet" type="text/css" href="css/style.css">
<!DOCTYPE html>
<html>
<head>
    <title>Upload Project</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2>Upload Project</h2>
    <form method="POST">
        <label for="title">Project Name:</label>
        <input type="text" name="title" required><br>

        <label for="description">Project Description:</label>
        <textarea name="description" rows="5" required></textarea><br>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" required><br>

        <label for="phase">Phase:</label>
        <select name="phase" id="phase-select" required>
            <option value="design">Design</option>
            <option value="development">Development</option>
            <option value="testing">Testing</option>
            <option value="deployment">Deployment</option>
            <option value="complete">Complete</option>
        </select><br>

        <div id="end-date-container">
            <label for="end_date">End Date(If your project is completed):</label>
            <input type="date" name="end_date"><br>
        </div>

        <input type="submit" value="Submit">
    </form>

    <script src="script/mian.js"></script>
</body>
</html>

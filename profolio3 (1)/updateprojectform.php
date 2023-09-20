<link rel="stylesheet" type="text/css" href="CSS/style.css">
<!DOCTYPE html>
<html>
<body>
    <h2>You can only modify projects that are uploaded by you!</h2>
    <form method='POST'>
        <label for='project_id'>Choose project to update:</label>
        <select name='pid' id='project_id'>
            <?php foreach ($projects as $project) { ?>
                <option value='<?php echo $project['pid']; ?>'><?php echo $project['title']; ?></option>
            <?php } ?>
        </select><br>
        <label for='project_name'>Project Name:</label>
        <input type='hidden' name='cur_title' value='<?php echo $projects[0]['title']; ?>'>
        <input type='text' name='title' value='<?php echo $projects[0]['title']; ?>'><br>
        <label for='project_description'>Project Description:</label>
        <input type='hidden' name='cur_description' value='<?php echo $projects[0]['description']; ?>'>
        <textarea name='description' rows='5'><?php echo $projects[0]['description']; ?></textarea><br>
        <label for='start_date'>Starting date:</label>
        <input type='hidden' name='cur_start_date' value='<?php echo $projects[0]['start_date']; ?>'>
        <input type='date' name='start_date' value='<?php echo $projects[0]['start_date']; ?>'><br>
        <label for='end_date'>End Date(If complete):</label>
        <input type='date' name='end_date' value='<?php echo $projects[0]['end_date']; ?>'><br>
        <label for="phase">Phase:</label>
        <select name="phase" id="phase-select" required>
            <option value="design"<?php if ($projects[0]['phase'] == 'design') { echo ' selected'; } ?>>Design</option>
            <option value="development"<?php if ($projects[0]['phase'] == 'development') { echo ' selected'; } ?>>Development</option>
            <option value="testing"<?php if ($projects[0]['phase'] == 'testing') { echo ' selected'; } ?>>Testing</option>
            <option value="deployment"<?php if ($projects[0]['phase'] == 'deployment') { echo ' selected'; } ?>>Deployment</option>
            <option value="complete"<?php if ($projects[0]['phase'] == 'complete') { echo ' selected'; } ?>>Complete</option>
        </select><br>
        <input type='submit' value='Update Project'>
    </form>
</body>
</html>

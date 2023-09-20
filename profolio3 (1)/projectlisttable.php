<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
if (isset($results) && count($results) > 0) {
    echo "<table cellspacing='0' cellpadding='5' id='projectTable'>";
    echo "<tr>
    <th align='left'><b>Project ID</b></th>
    <th align='left'><b>Project Name</b></th>
    <th align='left'><b>Phase</b></th>
    </tr>";
foreach ($results as $row) {
    echo "<tr>";
    echo "<td align='left'>" . htmlspecialchars($row['pid']) . "</td>";
    echo "<td align='left'><a href='projectdetails.php?pid=" . htmlspecialchars($row['pid']) . "'>" . htmlspecialchars($row['title']) . "</a></td>";
    echo "<td align='left'>" . htmlspecialchars($row['phase']) . "</td>";
    echo "</tr>";
}
    echo "</table>";
} else {
    echo "<p>No projects found!</p>";
}
?>

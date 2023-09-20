<link rel="stylesheet" type="text/css" href="CSS/style.css">

<div id="header">
    <h1>Project Management System</h1>
    <div id="navbar">
        <ul>
            <li><a href="index.php">Project List</a></li>
            <?php
                if (isset($_SESSION['username']) && isset($_SESSION['uid'])) {
                    echo "<li><a href='uploadproject.php'>Upload Project</a></li>";
                    echo "<li><a href='customproject.php'>Custom Project Data</a></li>";
                    echo "<li><a href='logout.php'>Logout</a></li>";
                } else {
                    echo "<li><a href='login.php'>Login</a></li>";
                    echo "<li><a href='register.php'>Sign Up</a></li>";
                }
            ?>
        </ul>
    </div>
</div>

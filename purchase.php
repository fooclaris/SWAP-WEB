<html>
<head>
<title>Safe Lights</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php session_start();

echo "<pre><b>For authorised users only</b><br></pre>";

if (isset($_SESSION["username"]) && $_SESSION["role"]=="default")
{
    echo "<pre><h3>You are clear to access this page, <u>" . $_SESSION['username']. "</u></h3></pre>";
    debug();
}
elseif (!isset($_SESSION["username"]))
{
    echo "<pre><h3><a href=loginform.php>You have not logged in. Please go back to login page</a></h3></pre>";
    debug();
    die("");
}
else {
    echo "<pre><h3><a href=loginform.php>You have not logged in as a user. This page is only for authorised users</a></h3></pre>";
    debug();
    die("");
}

function debug() {
    echo "<pre>";
    echo "--------------------------------------------<br>";
    echo "_SESSION<br>";
    print_r($_SESSION);
    echo "_COOKIE<br>";
    print_r($_COOKIE);
    echo "session_name()= " . session_name();
    echo "<br>";
    echo "session_id()= " . session_id();
    echo "<br>";
    echo "</pre>";
}?>
      
</body>
</html>

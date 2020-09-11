<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        h2 {font: sans-serif; color: blue;}
        h3 {font: sans-serif; color: green;}
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Rudraraj Kadel's Website.</h1>
    </div>
    <h2><b>Users of My Website</b></h2>
    <?php
        define('DB_SERVER', '');
        define('DB_USERNAME', '');
        define('DB_PASSWORD', '');
        define('DB_NAME', '');

        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sql = "SELECT username FROM users";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<h3>".$row["username"]."</h3><br>";
            }
        } else {
        echo "No Results Found";
        }
    ?>
    <p><br></br>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a><br></br>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>

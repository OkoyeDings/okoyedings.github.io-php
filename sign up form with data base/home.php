<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Home page</title>
</head>
<body>
<nav class=" p-3">
<h2 class="">Welcome <?php echo $_SESSION['username']; ?></h2> 
<div> <a href="logout.php" class="btn btn-primary">Log out</a></div>
</nav>   

</body>
</html>
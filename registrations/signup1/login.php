<?php 
$login = 0;
$invalid = 0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    

    $sql="select * from `registration` where username='$username' and password='$password'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
        // echo "Login successful";
        $login = 1;
        session_start();
        $_SESSION['username']=$username;
        header('location:home.php');
        }else{
            // echo "Invalid Email or Password";
            $invalid = 1;
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login page</title>
</head>
<body>
<?php 
    if($invalid){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Invalid Email or Password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

    <?php 
    if($login){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation!</strong> Login successful.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <h1 class="text-center">Login to our website</h1>
    <div class="container mt-5">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="ExampleInputEmail">Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username">
            </div>

            <div class="form-group">
                <label for="ExampleInputPasword">Password</label>
                <input type="password" class="form-control" placeholder="Enter your Password" name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
        </form>
        <p class="text-center">Don't have an account <a href="sign.php">Sign up</a></p>
    </div>
</body>
</html>
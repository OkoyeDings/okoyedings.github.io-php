<?php 
$succes=0;
$user=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    

    $sql="select * from `registration` where username='$username'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo "User already exist";
            $user=1;
        }else{
            if($password===$cpassword){
                $sql="insert into `registration`(username,password)values('$username','$password')";
                $result=mysqli_query($con,$sql);
                if(!$result){
                     echo 'connection error: '. mysqli_connect_errno();
                 }else{
                    // echo 'Signup successful';
                    $succes=1;
                    header('location:login.php');
                }
            }else{
                $invalid=1;
            }
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>signup page</title>
</head>
<body>

    <?php 
    if($user){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>hoo no!</strong> User already exist.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

    <?php 
    if($succes){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation!</strong> Signup successful.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>

    <?php 
        if($invalid){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please re-confirm your password.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>


    <h1 class="text-center mt-3">Sign up page</h1>
    <div class="container mt-5">
        <form action="sign.php" method="post">
            <div class="form-group mt-2">
                <label for="ExampleInputEmail">Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username" autocomplete="off">
            </div>

            <div class="form-group mt-2">
                <label for="ExampleInputPasword">Password</label>
                <input type="password" class="form-control" placeholder="Enter your Password" name="password" autocomplete="off">
            </div>

            <div class="form-group mt-2">
                <label for="ExampleInputPasword">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Sign up</button>
        </form>
        <p class="text-center">Already have an account <a href="login.php">Login</a></p>
    </div>
</body>
</html>
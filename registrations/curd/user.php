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



    <h1 class="text-center mt-3">Add User</h1>
    <div class="container mt-5">
        <form action="" method="post">
            <div class="form-group mt-2">
                <label for="ExampleInputEmail">Name</label>
                <input type="text" class="form-control" placeholder="Enter your Name" name="name">
            </div>

            <div class="form-group mt-2">
                <label for="ExampleInputPasword">Email</label>
                <input type="email" class="form-control" placeholder="Enter your Email" name="email">
            </div>

            <div class="form-group mt-2">
                <label for="ExampleInputPasword">Mobile No</label>
                <input type="tel" class="form-control" placeholder="Enter your Mobile number" name="mobile">
            </div>

            <div class="form-group mt-2">
                <label for="ExampleInputPasword">Password</label>
                <input type="password" class="form-control" placeholder="Enter your Password" name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Add User</button>
        </form>
        <p class="text-center"> <a href="../signup1/home.php">Back</a></p>
    </div>
</body>
</html>
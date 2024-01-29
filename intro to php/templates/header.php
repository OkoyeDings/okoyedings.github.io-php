<?php 

    session_start();

    if($_SERVER['QUERY_STRING'] == 'noname'){
        //unset($_SESSION['name']); = this is for a single page
        //for all the web pages we use
        session_unset();
    }

    $name = $_SESSION['name'] ?? 'Guest';

    //Fetching the cookie from the sandbox
    $gender = $_COOKIE['gender'] ?? 'unknown';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dings Pizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
    <nav class="white">
        <div class="container">
            <a href="index.php" class="brand logo">Ninja Pizza</a>
            <ul id="nav-mobile">
                <li class="name grey-text">Hello <?php echo htmlspecialchars($name); ?></li>
                <li class="name grey-text">(<?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="add.php" class="btn">ADD A PIZZA</a></li>
            </ul>
        </div>
    </nav>
<?php 
//connectin to the server usin the code in the config file
 include('config/db_connect.php');


    //Using the GET method
    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];

    //showing errors

    $title = $email = $ingredients = '';
    $error = array('email' => '', 'title' => '', 'ingredients' => '');

    if(isset($_POST['submit'])){
        // //to protect my site from cross site scripting use this "htmlspecialchars"
        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['Ingredients']);

        //Fliters and more validation

        //check email
        if(empty($_POST['email'])){
            // echo  'An email is required <br/>';
            $error['email'] = 'An email is required <br/>';
            
        }else{
            // echo htmlspecialchars($_POST['email']). '<br/>';
            // Adding email validation
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                // echo 'email must be a valid emai address'. '<br/>';
                $error['email'] = 'email must be a valid emai address'. '<br/>';
                $email = '';
            }
        }

        //check title
        if(empty($_POST['title'])){
            // echo 'A title is requird <br/>';
            $error['title'] = 'A title is requird <br/>';
        }else{
            // echo htmlspecialchars($_POST['title']). '<br/>';
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                // echo 'Title must be letter and space only'. '<br/>';
                $error['title'] = 'Title must be letter and space only'. '<br/>';
                $title = '';
            }
        }

        //check ingridients
        if(empty($_POST['ingredients'])){
            // echo 'Ingredients are needed in making your pizza <br/>';
            $error['ingredients'] = 'Ingredients are needed in making your pizza <br/>';
        }else{
            // echo htmlspecialchars($_POST['ingredients']). '<br/>';
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
                // echo 'Ingredients must contain at least 1 toppiens';
                $error['ingredients'] = 'ingredients must contain at least 1 toppiens';
                $ingredients = '';
            }
        }
        if(array_filter($error)){
            // echo 'error in the from';
        }else{
            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $title = mysqli_real_escape_string($connect, $_POST['title']);
            $ingredients= mysqli_real_escape_string($connect, $_POST['ingredients']);
    
            // create sql
            $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";
    
            //save to database
            if(mysqli_query($connect, $sql)){
                //sucess
                // echo 'form is valid';
                header ('location: index.php');
            }else{
                //error
                echo 'querry error: '.mysqli_error($connect);
            }
        }
    }

    

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

    <section class="con">
        <h4 class="center">Add a pizza</h4>
        <form action="add.php" method="POST" class="white" >

            <label for="email" class="label">Your Email</label>
            <input type="text" class="input" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text">
                <?php echo $error['email']; ?>
            </div>
           
            <label for="title" class="label">Pizza Title</label>
            <input type="text" class="input" name="title"  value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text">
                <?php echo $error['title']; ?>
            </div>  
           
            <label for="ingredients" class="label">Ingredients (comma seperated)</label>
            <input type="text" class="input" name="ingredients"  value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text">
                <?php echo $error['ingredients']; ?>
            </div>
          
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn submit">
            </div>

        </form>
    </section>

<?php include('templates/footer.php'); ?>



</body>
</html>
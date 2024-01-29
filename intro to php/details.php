<?php 

include('config/db_connect.php');

if(isset($_POST['delete'])){
    
    $id_to_delete = mysqli_real_escape_string($connect, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if(mysqli_query($connect, $sql)){
        //sucess
        header('location: index.php');
    }else{
        //faliure
        echo 'query error: '.mysqli_error($connect);
    }

}

//chechk GET request id param
if(isset($_GET['id'])){
    //dont forget we use this to protect your id from user entering malicious code into web search bar 
    $id = mysqli_real_escape_string($connect , $_GET['id']);

    //making the sql record and collecting data 
    $sql = "SELECT * FROM pizzas WHERE id  = $id";

    //getting the querry result
    $result = mysqli_query($connect, $sql);

    // fetchin the result to look like an array, like an associative array
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($connect);

    // print_r($pizza);
}



?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

    <div class="container center">
        <?php if($pizza): ?>

            <h4><?php echo htmlspecialchars($pizza['Title']); ?></h4>
            <p>created by: <?php echo htmlspecialchars($pizza['Email']); ?></p>
            <p>time created: <?php echo date($pizza['Created_at']); ?></p>
            <p><h5>Ingredients</h5></p>
            <p><?php echo htmlspecialchars($pizza['Ingredients']); ?></p>

            <!-- Delete from -->
           <form action="details.php" method="POST">
             <input type="hidden" name="id_to_delete" value="<?php echo $id ?>">
             <input type="submit" name="delete" value="Delete" class="btn brand">
           </form>

        <?php else: ?>
            <h5>No such pizza exists!</h5>
        <?php endif; ?>
    </div>

    <?php include('templates/footer.php'); ?>

</html>
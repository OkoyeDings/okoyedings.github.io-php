<?php 

    include('config/db_connect.php');

    //write the query fro all pizza
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    //make query and get result
    $result = mysqli_query($connect, $sql);

    //fetch the result row as an array 
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    //closethe connection
    mysqli_close($connect);

    // print_r($pizzas);


    //using "explode" function to seperate , (coma) into diffrent strings
    // print_r( explode(',' , $pizzas[0]['ingredients']));    
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>
    
<h4 class="center">Pizzas</h4>

<div class="container">
    <div class="row">

    <?php foreach($pizzas as $pizza){ ?>

        <div class="col s6 md3">
            <div class="card">
                <div class="card-content center">
                    <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                    <!-- <div class="flex"> <?php // echo htmlspecialchars($pizza['ingredients']); ?></div> -->
                    <ul>
                        <?php foreach(explode(',' , $pizza['ingredients']) as $ing){ ?>
                            <li><?php echo htmlspecialchars($ing); ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="card-action right-align">
                    <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">more infor</a>
                </div>
            </div>
        </div>

    <?php } ?>
    </div>
</div>
  
<?php include('templates/footer.php'); ?>

</body>
</html>
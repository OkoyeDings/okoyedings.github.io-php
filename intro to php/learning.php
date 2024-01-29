<?php 

    $name = "dings";
    define("NAME", "chizzy");

    $stringOne = "my email  is ";
    $stringTwo = "okoyedindu@gmail.com";

    echo $stringOne , $stringTwo; 
        
    echo 'the nija said "hmmmm" ';
   
    echo  $name[3];


    //functions
    echo strlen($stringOne);
    echo strtoupper($stringTwo);
    echo strtolower($stringOne);
    echo str_replace('email','gmail',$stringOne);


    //increment  operators
    $num = 23;
    $num++;
    echo $num;


    //shorthand operators
    $num +=10;
    echo $num;
    $num*=2;
    echo $num;


    //number functions 
    $pi = 44.56;
    echo floor($pi);
    echo ceil($pi);
    echo pi();



    //........ARRAYS  ...............
    //Typres of array 1.indexed array....  2.Associative array...   3.multi demesion array

    //Indexed array
    $peopleOne = ['dings','chisom','chizzy','uju'];
    echo $peopleOne[2];
    //OR 
    $peopleTwo = array('ola','joy');
    echo $peopleTwo[0];

    $age = [30,20,40];
    //we use print_r wich stand printreadable to print out all the strings in an array 
    print_r($age);
    //if you want to  overwriteor change a string in an array
    $age[0] = 33;
    print_r($age);
    //then if u want to add a new  string to the array 
    $age[] = 60; //it add because u did not put any value into the square box
    print_r($age);
    //you can also use the array_push function
    array_push($age,70);
    print_r($age);

    //HOW TO COUNT THE NUMBER OF STRING IN AN ARRAY BY USING THE COUNT FUNCTION
    echo count($age). '<br/>';

    //HOW TO MERGE TWO ARAY TOGETHER  WITH USE OF ARRAY_MERGE FUNCTION
    $peopleThree = array_merge($peopleOne,$peopleTwo);
    print_r($peopleThree). '<br/>';



    //ASSOCIATIVE ARRAY
    //This is the use of keys and value pairs 
    $ninjaOne = ['max' => 'black' , 'frank' => 'white' , 'kulture' => 'orange'];
    echo $ninjaOne['frank'];
    print_r($ninjaOne);
    //you can also make an array with the array function "array()"
    //Then to add a new string to  the array 
    $ninjaOne['bradly'] = 'pink';
    print_r($ninjaOne);
    //Then to over write 
    $ninjaOne['frank'] = 'gold';
    print_r($ninjaOne);
    //Then to count
    echo count($ninjaOne). '<br/>';
    //Then the merge is the same  with the indexed array



    
    //MULTIDIMENSION ARRAY
    //This means having an array inside an array  
    $blogs = [
        ['title'=>'mario','author'=>'mumu','social'=>'facebook','likes'=>30],
        ['title'=>'game','author'=>'code','social'=>'cheat','likes'=>25],
        ['title'=>'csc','author'=>'favour','social'=>'divine','likes'=>50]
    ];

    // print_r($blogs[1][0]);
    echo $blogs[0]['title'];
    echo count($blogs[0]);
    $blogs[]=['title' => 'noone','author' => 'dings', 'social' =>  'instagram', 'likes' => 10];
    print_r($blogs). '<br/>';


    //This is how to rmeove the last string in an array and the function is called ARRAY_POP 
    $popped = array_pop($blogs);
    print_r($popped). '<br/>';

    //'''''''LOOP FUNCTIONS'''''''
    //the FOR loop
    for ($i = 0; $i < 5; $i++ ){

        echo 'some template';

    };

    $ninja = ['man','woman','boy'];

    // for ($i = 0; $i  < count($ninja); $i++){
    //     echo $ninja[$i] . '<br/>';
    // }. '<br/>';

    foreach($ninja as $ninjas){
        echo $ninjas. '<br/>';
    };

    $products =[
        ['name' => 'shiny sta', 'price' => 20],
        ['name' => 'green shell', 'price' => 10],
        ['name' => 'red shell', 'price' => 15],
        ['name' => 'gold coin', 'price' => 5],
        ['name' => 'lightinng blot', 'price' => 40],
        ['name' => 'banana skin', 'price' => 2]
    ];

    // foreach($products as $product){
    //     echo $product['name'] . ' _ ' . $product['price'];
    //     echo '<br/>';
    // };

    // $i = 0;

    // while ($i < count($products)){
    //     echo $products[$i]['name'];
    //     echo '<br/>';
    //     $i++;
    // }



    
    //'''''''''''COMPARISONS AND BOOLEANS'''''''''''''
    //This involve true or false statement
    // echo 'dings' >= 'Dings';

    // Strict vs loose equal cpmparison
    echo 5 == '5','<br/>';
    //this would work because we used double equl sign and it does not care is the number is string or number on like triple equal  
    echo 5 === '5' ;
    //this  would not work because of the triple equal sign 
    echo '5' === '5' , '<br/>';



    //........CONDITIONAL STATEMENT............
    $price = 20;
    if ($price  < 10) {
        echo 'the condition is met'  , '<br/>';
    } elseif ( $price == 20){
        echo 'the condition is equal', '<br/>';
    } else{
        echo 'the condition is not met' ;
    } ;


foreach($products as $product){

    // if($product['price'] < 15 && $product['price']> 2){
    //     echo $product['name'] , '<br/>';
    // }

    // if($product['price'] > 20 || $product['price'] <10 ){
    //     echo $product['name'] , '<br/>';
    // }
}


//'''''''''COUNTINUE & BREAK'''''''''''
foreach($products as $product){

    if($product['name'] === 'lightinng blot'){
        break;
    }

    if($product['price'] > 15){
        continue;
    }

    echo $product['name']. '<br/>';

}



//'''''''''  FUNCTIONS   '''''''''''
function sayHello($namee = 'dings' , $time = 'morning'){
    echo "good $time $namee";
}

sayHello('chizzy'.'<br/>');
sayHello('mummy' , 'night'  );
sayHello();

function formatProduct($productss){
   // echo "{$productss['name']} costs {$productss['price']} to buy <br/>";
   return "{$productss['name']} costs {$productss['price']} to buy <br/>";
}

// $formatted = formatProduct(['name' => 'gold star', 'price' => 20]);
// echo $formatted;

//using of multipule diffent agurments 


//'''''''''''VARIABLE SCOPE''''''''''
//Local scope variable
function myFunc(){
    $price = 10;
    //This is what we call local variable because you can only use the variable inside this function
    echo $price;
}
myFunc();

function myFuncTwo($age){
    echo $age;
}
myFuncTwo(25);

//Global scope variable
$myName = 'mario';

function helloWorld(){
    // to make the $myName a global variable we have to call it inside by
    global $myName;
    echo "hello $myName";
}
helloWorld();

function sayBye(&$myName){
    $myName = 'dings';
    echo"bye $myName". '<br/>';
}
sayBye($myName);
//if you want to make thevariable change like the one u changed in the function above you add the "&" symbol to it
echo $myName;


//.........INCLUDE $ REQUIRE............
// how to include a php code from another php file
include('ninja.php');
echo 'end of php';
require('ninja.php');
//includ just add on a code while require needs the code to countinue or else it wont work
// it can also work with out the bracket 








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My first php file</title>
</head>
<body>
    
        <h1>product</h1>
        <ul>
            <?php foreach ($products as $product){ ?>

            <h3><?php echo $product['name']; ?> </h3>
            <p> <?php echo $product['price'];?> </p>

            <?php } ?>
        </ul>

        <div>
            <ul>
                <?php foreach($products as $product){ ?> 

                    <?php if($product['price'] > 15){ ?>
                        <li> <?php echo  $product ['name']; ?> </li>
                    <?php }?>

                <?php }?>
            </ul>
        </div>

</body>
</html>

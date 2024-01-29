<?php 

// termary operation

$score = 50;

// if($score > 40){
//     echo 'high score';
// }else{
//     echo 'low score';
// }

// A termary oprator is when we can have 2 diffrent outcome based on an event just like the scoe is an event and the if statement is the outcome
$val = $score > 40 ? 'high score' : 'low score' ;
//this is the same as an if statement where "$score > 40" is the IF statement and " : " is the ELSE statement
echo $val . '<br/>';



//Super Globals
//for getting the server name
echo $_SERVER['SERVER_NAME'] . '<br/>';
//for getting the method used to fetch the data
echo $_SERVER['REQUEST_METHOD'] . '<br/>';
//for getting the location of the the web site being hosted
echo $_SERVER['SCRIPT_FILENAME'] . '<br/>';
//for getting the the site name 
echo $_SERVER['PHP_SELF'] . '<br/>';




//.....SESSIONS.....
//it is used for storing data on the server between diffrent web pages
if(isset($_POST['submit'])){

    //Addind a cookie for gender, This is how to add cookie
    setcookie('gender', $_POST['gender'], time() + 86400);

    session_start();

    $_SESSION['name'] = $_POST['name'];

    // echo $_SESSION['name'];
    header('location: index.php');
}


//Readind files from the system
// $quotes = readfile('readme.txt');
// echo $quotes;
$file ='readme.txt';

if(file_exists($file)){

    echo readfile($file) . '<br/>';

    //How to copy the file and create it as a file in VS CODE and the file name will be called "QUOTES.TXT"
    copy($file , 'quotes.txt') . '<br/>';

    //Find the absolute or file path
    echo realpath($file) . '<br/>';

    //finding out the file size
    echo filesize($file)  . '<br/>';

    //renaming the file
    // rename($file, 'text.txt');

}else{
    echo 'file does not exist';
}


//Another way to open and read a file 
$files2 = 'quotes.txt';

//opening the file for reading 
$handle = fopen($files2, 'a+');

//reading the file , we add two paramiters because the second one read the amought of file size u want to read
echo fread($handle, filesize($files2));
// echo fread($handle, 120);

//how to read a single line of the file 
//and this will nnot work if u have read all the line in the previous code , and it reads from line to line like a book 
echo fgets($handle);

//how to read single character in the file
echo fgetc($handle);

//how to write to the file
//to do this we have to use a code which is 'A+', which will turn in $handle "R" TO "A+"
fwrite($handle, "\nEvery thing popular is wrong . <br/>");

//how to close the file
fclose($handle);

//how to delete a file 
//unlink($file);

//Classes 
class User {

    //public class and private class , public can be changed anywhere , private can only ba assed iside the class
    //we are using a pbuic class

    public $email;
    public $name;

    //giving hte values name so it call be called or changed 
    public function __construct($name , $email){
        // $this->email = 'Okoyedings@gmail.com';
        // $this->name = 'Dings';

        //instead of hard coding it we can set it to the email we recive from the user 
        $this->email = $email;
        $this->name = $name;
    }

    public function login(){
        //echo 'the user logged in' .'<br/>';
        echo $this->name . ' logged in'. '<br/>';
    }

}
//we are creating a new object witch is going to based on the user class
// $userOne = new User();

//how to access the function in the user class
// $userOne-> login();
// echo $userOne->name;

$userTwo = new User('Dings', 'OkoyeDings@gmail.com');
// echo $userTwo-> name .'<br/>';
// echo $userTwo-> email .'<br/>';
$userTwo->login();

//since the user name and email is public we can update anywhere 
$userTwo->name = 'max';
echo $userTwo->name .'<br/>';

//using private class
class Work{

    private $admin;
    private $password;

    public function __construct($admin, $password){
        $this->admin = $admin;
        $this->password = $password;
    }
//we use this code because we are using a private class and we want to call this class from anywhere
    public function getName(){
        return $this->admin;
    }

    //this code vailedate the name iputed by the user to make sure it is a string not  letter and it must be more than 1 letter
    public function setName($admin){
        if(is_string($admin) && strlen($admin) > 1){
            $this-> admin = $admin;
            return "Admin has been updated to $admin";
        }else{
            return 'Not a valid name';
        }
    }
}
$adminOne = new Work('Dings', 'MADmaxoo57');
//we have to add getName function because the class we are using is a private class
echo $adminOne->getName() .'<br/>';
echo $adminOne->setName('Madman');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pup tutorial</title>
</head>
<body>
   
    <form action=" <?php echo $_SERVER['PHP_SELF'] ?> " method="POST">
        <input type="text" name="name">
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" value="submit" name="submit">
    </form>

</body>
</html>
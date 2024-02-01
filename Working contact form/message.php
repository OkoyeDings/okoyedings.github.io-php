<?php 
    // echo "This message is sent from PHP file";
    //now we want to get the vale inputed by the user 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $message = $_POST['message'];

    if(!empty($email) && !empty($message)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //the person who will recive the email and how the mail would look like 
            $receiver = "bigchizz666@gmail.com";
            $subject = "From: $name <$email>";
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nwebsite: $website\n\nMessage: $message\n\nRegards,\n$name";
            $sender = "From: $email";
            if(mail($receiver, $subject, $body, $sender)){
                //we use mail() because is an inbuilt php function
                echo "Your message has been sent";
            }else{
                echo "sorry, failed to send your message!";
            }
        }else{
            echo "Enter a valid email";
        }
    }else{
        echo "Email and password field is required";
    }
?>
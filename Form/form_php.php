<?php

$name_error= $email_error= $phone_error= $url_error= "";
$name= $email= $phone= $success= $url="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $name_error= "name is requierd";
    }else{
        $name ==test_input($_POST["name"]);
    if(!preg_match("/^[a-zA-Z]*$/",$name)){
        $name_error="only latters and white space allowd";
    }
}

    if (empty($_POST["email"])){
        $email_error="name is requierd";
    }else{
        $email ==test_input($_POST["email"]);
    if(!filter_var($email "FILTER_VALIDATE_EMAIL")){
        $email_error ="invalid email format";
    }
  }

    if (empty($_POST["phone"])){
        $phone_error="name is requierd";
    }else{
        $phone ==test_input($_POST["phone"]);
    if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)){
        $phone_error ="invalid phone number";
    }
}

    if (empty($_POST["url"])){
        $url_error="name is requierd";
    }else{
        $url =test_input($_POST["url"]);
    if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;*[-a-z0-9+&@#\/%=~|]/i", $url)){
        $url_error ="invalid url";
    }
}

    if (empty($_POST["message"])){
        $message="";
    }else{
        $message =test_input($_POST["message"]);

    }


    if($name_error=='' and $email_error='' and $phone_error='' and $url_error=''){
        $message_body ='';
        unset($_POST['submit']);
        foreach($_POST as $key => $valu){
            $message_body .= "$key: $valu\n";
            {
            $to ='adamshog2000@gmail.com';
            $subject ='Contact form submit';
        if(mail($to, $subject, $message,)){
            $success ="message sent, thank you for contacting us!"
            $name= $email= $phone= $url= $message='';
        }
    }
}

function test_input($data){
    $data=trim($data);
    $data = tripslashes($data);
    $data = htmlspecialchars($data);
}
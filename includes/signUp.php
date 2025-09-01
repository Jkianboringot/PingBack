<?php

use Controllers\SignupCtrl;
require_once '../Controllers/Signup.php';


if ($_SERVER['REQUEST_METHOD']=== 'POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd']; 

    $signUpUser=new SignupCtrl($name,$email,$pwd);
   
    $signUpUser->createUser();
}
<?php

use Controllers\LoginCrtl;
require_once '../Controllers/Login.php';


if($_SERVER['REQUEST_METHOD']=='POST'){

    $email=$_POST['email'];
    $pwd=$_POST['pwd'];

    $userLogIn=new LoginCrtl($email,$pwd);
    if($userLogIn->userExist()){
    echo 'logged in';
    }
    else {
        echo 'not log in';
    }
}



// theirs a problem with the models of login fix taht
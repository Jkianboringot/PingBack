<?php

namespace Controllers;

use Models\Login;

require_once '../Models/Login.php';
require_once '../config/session.php';

class LoginCrtl extends Login
{

    protected $email;
    protected $pwd;

    public $errors = [];

    public function __construct($email, $pwd)
    {

        $this->email = $email;
        $this->pwd = $pwd;
    }

    protected function mount()
    {
        $signup = new Login($this->email, $this->pwd);
        return $signup;
    }


    protected function emptyInput()
    {
        if (empty($this->email) || empty($this->pwd)) {

            return true;
            // if even one is empty it will return false not the best use but its ok for 
            // now that i want all fields to be filled
        }
        return false;
    }

    public function errorview(){
         if ($this->errors) {
                $_SESSION['errors_login'] = $this->errors;

                $loginData = [

                    'email' => $this->email
                ];

                $_SESSION['login_data'] = $loginData;
                header('location: ../view/login.php');

                die();
            }
    }

    public function login()
    {
        try {
            if (!$this->emptyInput()) {
                if ($this->registeredEmail()) {
                    if ($this->mount()->userLogin()) {
                        header('location: ../view/posts.php');
                    } else {
                        header('location: ../view/login.php');
                        $this->errors['login_wrong_password'];
                    }
                } else {
                    header('location: ../view/login.php');
                    $this->errors['login_no_account'];
                }
            } else {
                header('location: ../view/login.php');
                $this->errors['login_empty_input'];
            }

        } catch (\Throwable $th) {
          die('failed login:' . $th->getMessage());
        }
    }


function login_or_out(){
    if(isset($_SESSION['email'])){
        echo 'you are log in'.$_SESSION['email'];
    }
    else {
        echo 'you are log out';
    }
}


public  function check_login_errors()
{
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];

        echo '<br>';

        foreach ($errors as $error) {

            echo '<div class="form-error"><p class="form-error">' . $error . '</p></div>';
        }

        unset($_SESSION['errors_login']);


    } 
   else if (isset($_GET['login']) && $_GET['login'] === 'success') {

        echo '<div class="form-error"><p class="form-error"> Log in </p></div>';
    }   
}



}


// what do i wnat this signup do 
    // 1.input validation
        // -empty input✔
        // -email taken✔
    // 2.create user👌
    // 3. user allowrd to update?



// i have a feeling and am definetely wrong with what am doing with all teh 
// use and extend or for how am connecting wth teh controller but i will not 
// use gpt to fix it 
<?php
namespace Models;

use Database\Dbh;
require_once '../Database/Dbh.php';

class Login extends Dbh {
    
    protected $email;
    protected $pwd;

    public function __construct($email,$pwd){
        $this->email=$email;
        $this->pwd=$pwd;
    }
    

    protected function userLogin(){

        try {
        
       $target='select pwd_hash from users where email=:email';


        if(password_verify($this->pwd,$target)){
        $stmt=parent::connection()->prepare($target); 
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':pwd',$pwd);
        $stmt->execute(); 
        return true;
    }
    else{
        return true;
    }

        } catch (\Throwable $th) {
            echo 'fail query'.$th->getMessage();
        }

        
       
    }
}


// what do i wnat this signup do 
    // 1.insert user✔
    // 2.update user 
    // 3.validation create this as a seperate thing if possible✔
        // -only job is to check if a user has been created already
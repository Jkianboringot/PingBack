<?php
namespace Controllers;

use Models\Login;

require_once '../Models/Login.php';
class LoginCrtl extends Login{

    protected $email;
    protected $pwd;

   
    public function __construct($email,$pwd){

        $this->email=$email;
        $this->pwd=$pwd;
     

    }
    
    protected function mount(){
        $signup=new Login($this->email,$this->pwd);
         return $signup;
    }
  

    protected function emptyInput(){
        if( !empty($this->email)|| !empty($this->pwd)){
            return false;
            // if even one is empty it will return false not the best use but its ok for 
            // now that i want all fields to be filled
        }
        return true;
    }
    

    public function userExist(){
       return $this->mount()->userLogin();
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
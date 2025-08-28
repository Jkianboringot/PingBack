<?php
namespace Controllers;

use Models\Signup;

class SignupCtrl extends Signup{
    protected $name;
    protected $email;
    protected $pwd;

   
    public function __construct($name,$email,$pwd){
        $this->name=$name;
        $this->email=$email;
        $this->pwd=$pwd;
     

    }
    
    protected function mount(){
        $signup=new Signup($this->name,$this->email,$this->pwd);
         return $signup;
    }
    protected function createUser(){
         $this->mount();
    }

    protected function emptyInput(){
        if(!empty($this->name)|| !empty($this->email)|| !empty($this->pwd)){
            return false;
            // if even one is empty it will return false not the best use but its ok for 
            // now that i want all fields to be filled
        }
        return true;
    }
    

    protected function isEmailRegistered(){
      $this->mount()->isValidEmail();
    }


    protected function allowUpdate(){
        if ($this->userUpdate()){
            return true;
        }
        return false;
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
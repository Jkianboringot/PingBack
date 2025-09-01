<?php
namespace Models;

use Database\Dbh;
use PDO;

require_once '../Database/Dbh.php';

class Login extends Dbh {
    
    protected $email;
    protected $pwd;

    public function __construct($email,$pwd){
        $this->email=$email;
        $this->pwd=$pwd;
    }

   

    protected function registeredEmail(){
         try {
          $query='Select count(*) From users where email=:email';
        $stmt=parent::connection()->prepare($query);
        $stmt->bindParam(':email',$this->email);
        $stmt->execute();
        $count=$stmt->fetchColumn();
        return $count>=1;

        } catch (\Throwable $th) {
           die('qeurey failed:' . $th->getMessage());
        }

        
    }

    protected function userLogin(){

        try {
      
             $target='select * from users where email=:email';
               $stmt=parent::connection()->prepare($target); 
                    $stmt->bindParam(':email',$this->email);
                    $stmt->bindParam(':pwd',$this->pwd);
                    $stmt->execute();
                  $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($this->pwd,$result['pwd_hash'])){
                    return true;
        
    }
   else {

     return false;
   }

        } catch (\Throwable $th) {
          die('qeurey failed:' . $th->getMessage());
        }

        
       
    }
}


// what do i wnat this signup do 
    // 1.insert user✔
    // 2.update user 
    // 3.validation create this as a seperate thing if possible✔
        // -only job is to check if a user has been created already
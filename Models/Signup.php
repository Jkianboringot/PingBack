<?php

namespace Models;

use Database\Dbh;

require_once '../Database/Dbh.php';

class Signup extends Dbh
{
    protected $name;
    protected $email;
    protected $pwd;

    public function __construct($name, $email, $pwd)
    {
        $this->name = $name;
        $this->email = $email;
        $this->pwd = $pwd;
    }


    protected function emailExistAlready()
    {
        try {
            $query = 'select count(*) from users where email=:email';
            $stmt = parent::connection()->prepare($query);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count >= 1;
        } catch (\Throwable $th) {
            die('qeurey failed:' . $th->getMessage());
        }
    }


    protected function userSignup()
    {
        try {
            $query = 'insert into users (username,email,pwd_hash) value (:name,:email,:pwd)';

            // i cannot put the validation logic here becuase this is only for $quering 
            // the database not for logic handling this is only for retriving and inputing 
            // in db puting a logic here is a waste if i can just put it in controller to
            // do the check that way this is no way of even accessing this model if it could 
            // not go trough controller

            $hash = password_hash($this->pwd, PASSWORD_BCRYPT);

            $stmt = parent::connection()->prepare($query);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pwd', $hash);
            $stmt->execute();
            return true;
        } catch (\Throwable $th) {
            die('qeurey failed:' . $th->getMessage());
        }
    }



    protected function userUpdate()
    {

        try {
            $query = 'udpate users set pwd_hash=:pwd,email=:email where email=:email';
            $target = 'select pwd_hash from users where email=:email';


            if (password_verify($this->pwd, $target)) {
                $stmt = parent::connection()->prepare($query);

                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':pwd', $pwd);
                $stmt->execute();
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
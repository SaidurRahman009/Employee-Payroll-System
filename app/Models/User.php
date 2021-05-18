<?php

namespace App\Models;

//use phpDocumentor\Reflection\Types\Null;

class User{

    public $name = NULL;
    protected $email = NULL;
    private $password = NULL;

    public static $count = 0;
    private $uid;




    public function setName($name){
        $this->name = trim($name);
    }


    public function getName(){
        return $this->name;
    }
    public function setEmail($email){
        $this->email = $email;
        return TRUE;

    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setPassword($password){
        $this->password=$password;
        return TRUE;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function register()
    {
        if($this->name != NULL && $this->email != NULL && $this->password != NULL){

            return TRUE;
        }

        return FALSE;
    }
    public function login($id, $pass)
    {
        if($id===$this->email && $pass===$this->password){
            return TRUE;
        }

        return FALSE;

    }
}

?>
<?php
namespace App\Models;
class TaiKhoan
{
    private $email;
    private $pass;
    private $remember;
    
    public function __construct($email, $pass, $remember) {
        $this->email = $email;
        $this->pass = $pass;
        $this->remember = $remember;
    }

    public function getEmail(){
        return $this->email;
    }
    
    public function getPass(){
        return $this->pass;
    }

    public function getRemember(){
        return $this->remember;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    
    public function setPass($pass){
        $this->pass = $pass;
    }
    public function setRemember($remember){
        $this->remember = $remember;
    }
}

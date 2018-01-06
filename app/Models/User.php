<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    private $name;
    private $email;
    private $password;
    private $phoneNumber;
    private $admin;

    public function __construct()
    {

    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getAccountType()
    {
        return $this->accountType;
    }

    public function setAccountType($accountType)
    {
        // $this->accountType = $accountType;
        if($accountType == 'ADMIN'){
            $this->admin = true;
        } else {
            $this->admin = false;
        }
    }

    public function getAttributesArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'phone_number' => $this->phoneNumber,
            'admin' => $this->admin
        ];
    }

}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    private $id;
    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $password;
    private $phoneNumber;
    private $accountType;

    public function __construct()
    {

    }

    /*public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }*/

    /*public function __construct($firstname, $lastname, $username, $email, $password, $phoneNumber){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber
    }
    */

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
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
        $this->accountType = $accountType;
    }

    public function getAttributesArray()
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'phone_number' => $this->phoneNumber,
            'account_type' => $this->accountType
        ];
    }

}
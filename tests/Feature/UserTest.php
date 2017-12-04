<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Tests\RequestTest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    private $userController;

    public function __construct(UserController $userController)
    {
        $this->userController = $userController;
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testAuthenticateUser()
    {
        $request = new Request();
        $request->initialize(['username' => 'grantfayvor', 'password' => 'password']);
        $this->assertEquals(redirect()->intended('/'), $this->userController->authenticateUser($request), 'user controller authenticateUser() passed test');
    }
}

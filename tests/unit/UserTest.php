<?php namespace platform;

use App\User;

class UserTest extends \Codeception\TestCase\Test {
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testRegister()
    {
        $user = new User();
        $user->fill(['firstName' => 'John', 'lastName' => 'Doe', 'email' => 'johndoe@example.com']);
        $this->assertEquals('John', $user->firstName);
        $this->assertEquals('Doe', $user->lastName);
        $this->assertEquals('johndoe@example.com', $user->email);
    }

}

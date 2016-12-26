<?php namespace Platform;

use App\User;

class UserTest extends \Codeception\TestCase\Test {
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testRegister()
    {
        $user = new User();
        $user->fill(['first_name' => 'John', 'last_name' => 'Doe', 'email' => 'johndoe@example.com']);
        $this->assertEquals('John', $user->first_name);
        $this->assertEquals('Doe', $user->last_name);
        $this->assertEquals('johndoe@example.com', $user->email);
    }

}

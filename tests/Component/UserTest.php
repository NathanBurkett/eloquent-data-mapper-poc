<?php namespace Tests\Component;

use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testUserGettersAndSetters()
    {
        $user = new User();
        $email = 'foo@bar.com';
        $user->setEmail($email);

        $user->save();

        $this->assertDatabaseHas('users', [
            'email' => 'foo@bar.com',
        ]);
    }
}

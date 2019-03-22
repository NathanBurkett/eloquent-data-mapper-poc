<?php namespace Tests\Component;

use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function testProfileRelationship()
    {
        $user = new User();
        $email = 'foo@baz.com';
        $user->setEmail($email);

        $profile = new Profile();
        $profile->setName('Johnny Boy');

        $user->setProfile($profile);

        $user->save();

        $this->assertEquals($profile, $user->getProfile());
        $this->assertDatabaseHas('profiles', [
            'name' => 'Johnny Boy',
            'user_id' => 1,
        ]);
    }
}

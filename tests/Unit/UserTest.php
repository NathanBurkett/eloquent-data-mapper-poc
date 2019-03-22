<?php namespace Tests\Unit;

use App\Location;
use App\Profile;
use App\User;
use PHPUnit\Framework\TestCase;
use Showdown\Database\DynamicPropertyException;

class UserTest extends TestCase
{
    public function testUserGettersAndSetters()
    {
        $user = new User();
        $email = 'foo@bar.com';
        $user->setEmail($email);

        $this->assertEquals($email, $user->getEmail());
    }

    public function testDynamicallyReadingMembersThrowsException()
    {
        $this->expectException(DynamicPropertyException::class);

        $user = new User();
        $email = 'foo@bar.com';
        $user->setEmail($email);

        $email = $user->email;
    }

    public function testDynamicallySettingMembersThrowsException()
    {
        $this->expectException(DynamicPropertyException::class);

        $user = new User();
        $user->email = 'foo@bar.com';
    }

    public function testProfileRelationship()
    {
        $user = new User();
        $profile = new Profile();

        $user->setProfile($profile);
        $this->assertEquals($profile, $user->getProfile());
    }

    public function testLocationsRelationship()
    {
        $user = new User();

        $locationA = new Location();
        $locationB = new Location();

        foreach ([$locationA, $locationB] as $location) {
            $user->getLocations()->add($location);
        }
    }
}

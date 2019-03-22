<?php namespace Tests\Component;

use App\Location;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserLocationRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function testLocationsRelationship()
    {
        $user = new User();

        $locationA = new Location();
        $locationB = new Location();

        foreach ([$locationA, $locationB] as $location) {
            $user->addLocation($location);
        }
    }
}

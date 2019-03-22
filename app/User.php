<?php

namespace App;

use Illuminate\Support\Collection;
use Showdown\Database\HasTimestamps;
use Showdown\Database\Model;

class User extends Model
{
    use HasTimestamps;

    protected function profile()
    {
        return $this->hasOne(Profile::class);;
    }

    protected function locations()
    {
        return $this->hasMany(Location::class);
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->getAttribute('email');
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->setAttribute('email', $email);
    }

    /**
     * @return Profile|null
     */
    public function getProfile(): ?Profile
    {
        return $this->getRelationValue('profile');
    }

    /**
     * @param Profile $profile
     */
    public function setProfile(Profile $profile)
    {
        $this->setRelation('profile', $profile);
    }

    /**
     * @return Collection|null
     */
    public function getLocations(): ?Collection
    {
        return $this->getRelationValue('locations');
    }

    /**
     * @param Collection $locations
     */
    public function setLocations(Collection $locations)
    {
        $this->setRelation('locations', $locations);
    }

    /**
     * @param Location $locations
     */
    public function addLocation(Location $locations)
    {
        $this->setRelation('locations', $locations);
    }
}

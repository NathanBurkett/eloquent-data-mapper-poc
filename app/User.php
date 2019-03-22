<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
     * @return Profile|HasOne
     */
    public function getProfile()
    {
        return $this->getRelationValue('profile') ?? $this->profile();
    }

    /**
     * @param Profile $profile
     */
    public function setProfile(Profile $profile)
    {
        $this->setRelation('profile', $profile);
    }

    /**
     * @return Collection|HasMany
     */
    public function getLocations()
    {
        return $this->getRelationValue('locations') ?? $this->locations();
    }

    /**
     * @param Collection $locations
     */
    public function setLocations(Collection $locations)
    {
        $this->setRelation('locations', $locations);
    }

    /**
     * @param Location $location
     */
    public function addLocation(Location $location)
    {
        $this->getRelationValue('locations')->add($location);
    }
}

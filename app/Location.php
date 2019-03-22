<?php namespace App;

use Showdown\Database\HasTimestamps;
use Showdown\Database\Model;

class Location extends Model
{
    use HasTimestamps;

    /**
     * User relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->getRelationValue('user');
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->setRelation('user', $user);
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->setAttribute('name', $name);
    }
}

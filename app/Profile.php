<?php namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Showdown\Database\HasTimestamps;
use Showdown\Database\Model;

/**
 * Class Profile
 * @package App
 */
class Profile extends Model
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
     * @return User|BelongsTo
     */
    public function getUser()
    {
        return $this->getRelationValue('user') ??
            $this->user();
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

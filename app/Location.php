<?php namespace App;

use Showdown\Database\HasTimestamps;
use Showdown\Database\Model;

class Location extends Model
{
    use HasTimestamps;

    /**
     * @var string
     */
    const FIELD_NAME = 'name',
        FIELD_USER_ID = 'user_id';

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
        return $this->getAttribute(static::FIELD_NAME);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->setAttribute(static::FIELD_NAME, $name);
    }
}

<?php

namespace App\Events;

use App\Models\User;

class UpdateUserEvent extends Event
{

    private string $username;
    private string $password;
    private User $user;

    /**
     * UpdateUserEvent constructor.
     * @param string $username
     * @param string $password
     * @param User $user
     */
    public function __construct(string $username, string $password, User $user)
    {
        $this->username = $username;
        $this->password = $password;
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
}

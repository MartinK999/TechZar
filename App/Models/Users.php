<?php

namespace App\Models;

use App\Core\Model;

class Users extends \App\Core\Model
{
    public function __construct(
        public ?string $login = "",
        public ?string $fullname = "",
        public ?string $email = "",
        public ?string $password = ""
    )
    {
    }

    static public function setDbColumns()
    {
       return ['login','fullname','email','password'];
    }

    static public function setTableName()
    {
        return "users";
    }

    /**
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @param string|null $login
     */
    public function setLogin(?string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string|null
     */
    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    /**
     * @param string|null $fullname
     */
    public function setFullname(?string $fullname): void
    {
        $this->fullname = $fullname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }
}
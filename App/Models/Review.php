<?php
namespace App\Models;

use App\Core\Model;

class Review extends \App\Core\Model
{
    public function __construct(
        public int     $id = 0,
        public ?string $user_writer = "",
        public ?string $user_login = "",
        public int     $rating = 0,
        public ?string $text = "",
        public ?string $date = ""
    )
    {

    }

    static public function setDbColumns()
    {
        return ['id', 'user_writer', 'user_login', 'rating', 'text', 'date'];
    }

    static public function setTableName()
    {
        return "review";
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getUserWriter(): ?string
    {
        return $this->user_writer;
    }

    /**
     * @param string|null $user_writer
     */
    public function setUserWriter(?string $user_writer): void
    {
        $this->user_writer = $user_writer;
    }

    /**
     * @return string|null
     */
    public function getUserLogin(): ?string
    {
        return $this->user_login;
    }

    /**
     * @param string|null $user_login
     */
    public function setUserLogin(?string $user_login): void
    {
        $this->user_login = $user_login;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }
}
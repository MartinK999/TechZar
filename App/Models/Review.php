<?php
namespace App\Models;

use App\Core\Model;

class Review extends \App\Core\Model
{
    public function __construct(
        public int     $id = 0,
        public int     $user_writer = 0,
        public int     $user_id = 0,
        public int     $rating = 0,
        public ?string $text = "",
        public ?string $date = ""
    )
    {

    }

    static public function setDbColumns()
    {
        return ['id', 'user_writer', 'user_id', 'rating', 'text', 'date'];
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

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getUserWriter(): int
    {
        return $this->user_writer;
    }

    /**
     * @param int $user_writer
     */
    public function setUserWriter(int $user_writer): void
    {
        $this->user_writer = $user_writer;
    }
}
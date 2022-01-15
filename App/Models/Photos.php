<?php

namespace App\Models;

use App\Core\Model;

class Photos extends \App\Core\Model
{
    public function __construct(
        public int     $id = 0,
        public ?string $inzerat_id = "",
        public ?string $image = ""
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'inzerat_id', 'image'];
    }

    static public function setTableName()
    {
        return "photos";
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
    public function getInzeratId(): ?string
    {
        return $this->inzerat_id;
    }

    /**
     * @param string|null $inzerat_id
     */
    public function setInzeratId(?string $inzerat_id): void
    {
        $this->inzerat_id = $inzerat_id;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }


}

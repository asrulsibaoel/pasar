<?php


namespace App\Module\Category\Model;


use App\Module\Interfaces\PrimaryKeyInterface;
use Rhumsaa\Uuid\Uuid;

class CategoryId implements PrimaryKeyInterface
{
    /**
     * @var Uuid
     */
    private $uuid;

    public function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    public static function generate() : CategoryId
    {
        return new self(Uuid::uuid4());
    }

    public static function fromString(\string $uuid) : CategoryId
    {
        return new self(Uuid::fromString($uuid));
    }

    public function toString() : string
    {
        return $this->uuid->toString();
    }
}

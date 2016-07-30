<?php


namespace App\Module\Category\Model;


use Prooph\EventSourcing\AggregateRoot;

final class TbKategori extends AggregateRoot
{

    /**
     * @var CategoryId
     */
    private $categoryId;

    /**
     * @var string
     */
    private $namaKategori;

    public static function addWithData(
        CategoryId $categoryId,
        string $namaKategori
    ): TbKategori {
        $self = new static();

        return $self;
    }

    protected function aggregateId() : string
    {
        return $this->categoryId->toString();
    }

}

<?php


namespace App\Module\Interfaces;


interface PrimaryKeyInterface
{

    public static function generate();

    public static function fromString(\string $uuid) : self;

    public function toString() : string;
}

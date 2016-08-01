<?php
declare(strict_types=1);

namespace App\Module\User\Model\Service\PasswordEncoder;

class DefaultPasswordEncoder implements PasswordEncoder
{
    public function encode(string $password) : string
    {
        return md5($password);
    }

    public function verify(string $rawPassword, string $encodedPassword) : bool
    {
        return password_verify($rawPassword, $encodedPassword);
    }
}

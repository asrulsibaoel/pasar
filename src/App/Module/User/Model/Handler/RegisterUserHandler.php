<?php
declare(strict_types=1);

namespace App\Module\User\Model\Handler;

use App\Module\User\Model\Command\RegisterUser;
use App\Module\User\Model\UserCollection;
use App\Module\User\Model\Service\PasswordEncoder\PasswordEncoder;
use App\Module\User\Model\User;
use LosMiddleware\LosLog\StaticLogger;

final class RegisterUserHandler
{
    /**
     * @var PasswordEncoder
     */
    private $encoder;

    /**
     * @var UserCollection
     */
    private $userCollection;

    public function __construct(PasswordEncoder $encoder, UserCollection $userCollection)
    {
        $this->encoder = $encoder;
        $this->userCollection = $userCollection;
    }

    public function __invoke(RegisterUser $command)
    {
        $password = $this->encoder->encode($command->password());

        $user = User::registerWithData($command->userId(), $command->email(), $password, $command->authKey());

        $this->userCollection->add($user);
    }
}

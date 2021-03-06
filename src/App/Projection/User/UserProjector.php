<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Projection\User;

use App\Module\User\Model\Event\UserWasRegistered;
use App\Projection\Table;
use App\Projection\User\UserFinder;
use Doctrine\DBAL\Connection;
use LosMiddleware\LosLog\StaticLogger;

/**
 * Description of UserProjector
 *
 * @author asrulsibaoel
 */
class UserProjector
{

    private $tokenSender;

    /**
     *
     * @var Connection
     */
    private $connection;

    /**
     *
     * @var UserFinder
     */
    private $userFinder;

    public function __construct(Connection $connection, UserFinder $userFinder)
    {
        $this->connection = $connection;
        $this->userFinder = $userFinder;
    }

    /**
     * @param UserWasRegistered
     */
    public function onUserWasRegistered(UserWasRegistered $event)
    {
        $this->connection->insert(
        Table::USER,[
            'id' => $event->userId()->toString(),
            'email' => $event->email()->toString(),
            'password' => $event->password(),
            'auth_key' => $event->authKey()
        ]);
    }

    public function onNotificationWasSended()
    {

    }

}

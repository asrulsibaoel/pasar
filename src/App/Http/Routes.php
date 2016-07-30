<?php
namespace App\Http;

use App\Http\Action\AddCategoryAction;
use App\Http\Action\HomePageAction;
use App\Http\Action\LoginAction;
use App\Http\Action\NewUserAction;
use App\Http\Action\RegisteredUserAction;
use App\Http\Action\RegisterUserAction;
use App\Http\Action\UserManagementAction;
use App\Http\Container\HomePageActionFactory;
use App\Http\Container\LoginActionFactory;
use App\Http\Container\RegisteredUserActionFactory;
use App\Http\Container\RegisterUserActionFactory;
use App\Http\Container\NewUserActionFactory;
use App\Http\Container\UserManagementActionFactory;

class Routes
{
    public function __invoke()
    {
        return [
            'dependencies' => [
                'factories' => [
                    HomePageAction::class => HomePageActionFactory::class,
                    RegisterUserAction::class => RegisterUserActionFactory::class,
                    NewUserAction::class => NewUserActionFactory::class,
                    RegisteredUserAction::class => RegisteredUserActionFactory::class,
                    LoginAction::class => LoginActionFactory::class,
                    UserManagementAction::class => UserManagementActionFactory::class
                ],
            ],
            'routes' => [
                [
                    'name' => 'home',
                    'path' => '/',
                    'middleware' => HomePageAction::class,
                    'allowed_methods' => ['GET'],
                ],
                [
                    'name' => 'register-user',
                    'path' => '/register',
                    'middleware' => RegisterUserAction::class,
                    'allowed_methods' => ['POST', 'GET']
                ],
                [
                    'name' => 'new-user',
                    'path' => '/new-user',
                    'middleware' => NewUserAction::class,
                    'allowed_methods' => ['POST', 'GET']
                ],
                [
                    'name' => 'registered-user',
                    'path' => '/registered',
                    'middleware' => RegisteredUserAction::class,
                    'allowed_methods' => ['GET']
                ],
                [
                    'name' => 'login',
                    'path' => '/login',
                    'middleware' => LoginAction::class,
                    'allowed_methods' => ['GET']
                ],
                [
                    'name' => 'user-management',
                    'path' => '/user-management',
                    'middleware' => UserManagementAction::class,
                    'allowed_methods' => ['GET']
                ],
                [
                    'name' => 'add-category',
                    'path' => '/add-category',
                    'middleware' => AddCategoryAction::class,
                    'allowed_methods' => ['GET', 'POST']
                ]
            ],
        ];
    }
}

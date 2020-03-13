<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\UpdateUserAction;
use App\Application\Actions\JobDating\CreateJobDatingAction;
use App\Application\Actions\JobDating\DeleteJobDatingAction;
use App\Application\Actions\JobDating\ListJobDatingsAction;
use App\Application\Actions\JobDating\UpdateJobDatingAction;
use App\Application\Actions\JobDating\ViewJobDatingAction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;


return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->put('/{id}', UpdateUserAction::class);
    });

//    $app->group('/users', function (Group $group) {
//        $group->get('', ListUsersAction::class);
//        $group->get('/{id}', ViewUserAction::class);
//        $group->put('/{id}', UpdateUserAction::class);
//    });

    $app->group('/jobdatings', function (Group $group) {
        $group->get('', ListJobDatingsAction::class);
        $group->post('', CreateJobDatingAction::class);
        $group->get('/{id}', ViewJobDatingAction::class);
        $group->put('/{id}', UpdateJobDatingAction::class);
        $group->delete('/{id}', DeleteJobDatingAction::class);

        $group->post('/{id}/{listName}', function(){});

        $group->get('/{id}/{listName}/{listId}', function(){});
        $group->put('/{id}/{listName}/{listId}', function(){});
        $group->delete('/{id}/{listName}/{listId}', function(){});


    });


};

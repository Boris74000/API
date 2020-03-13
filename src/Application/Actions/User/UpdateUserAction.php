<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class UpdateUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userId = (int) $this->resolveArg('id');

        $datas = $this->getFormData();

        $user = $this->userRepository->findUserOfId($userId);

        $response = $user->update($datas);

        $this->logger->info("User of id `${userId}` was updated.");

        return $this->respondWithData(['status'=>$response, "user"=>$user]);
    }
}

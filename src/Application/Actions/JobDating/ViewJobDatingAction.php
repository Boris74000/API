<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use Psr\Http\Message\ResponseInterface as Response;

class ViewJobDatingAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userId = (int) $this->resolveArg('id');
        $user = $this->jobdatingRepository->findUserOfId($userId);

        $this->logger->info("User of id `${userId}` was viewed.");

        return $this->respondWithData($user);
    }
}

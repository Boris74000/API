<?php

declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use App\Domain\JobDating\JobDating;
use Psr\Http\Message\ResponseInterface as Response;

class UpdateJobDatingAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobdatingId = (int) $this->resolveArg('id');

        $datas = $this->getFormData();

        $jobdating = $this->jobdatingRepository->findUserOfId($jobdatingId);

        $response = $jobdating->update($datas);

        $this->logger->info("User of id `${jobdatingId}` was updated.");

        return $this->respondWithData(['status'=>$response, "data"=>$jobdating]);
    }
}

<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use Psr\Http\Message\ResponseInterface as Response;

class ListJobDatingsAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobdatings = $this->jobdatingRepository->findAll();

        $this->logger->info("Jobdatings list was viewed.");

        return $this->respondWithData($jobdatings);
    }
}

<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use App\Application\Actions\Action;
use App\Domain\JobDating\JobDatingRepository;
use Psr\Log\LoggerInterface;

abstract class JobDatingAction extends Action
{
    /**
     * @var JobDatingRepository
     */
    protected $jobdatingRepository;

    /**
     * @param LoggerInterface $logger
     * @param JobDatingRepository  $jobdatingRepository
     */
    public function __construct(LoggerInterface $logger, JobDatingRepository $jobdatingRepository)
    {
        parent::__construct($logger);
        $this->jobdatingRepository = $jobdatingRepository;
    }
}

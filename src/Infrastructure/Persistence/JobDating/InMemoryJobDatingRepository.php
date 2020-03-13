<?php


declare(strict_types=1);

namespace App\Infrastructure\Persistence\JobDating;

use App\Domain\JobDating\JobDating;
use App\Domain\JobDating\JobDatingNotFoundException;
use App\Domain\JobDating\JobDatingRepository;

class InMemoryJobDatingRepository implements JobDatingRepository
{
    /**
     * @var JobDating[]
     */
    private $jobdatings;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $jobdatings
     */
    public function __construct(array $jobdatings = null)
    {
        $this->jobdatings = $jobdatings ?? [
                1 => new JobDating(1, 'Stage', 'Saint-Genis-Pouilly', '12 mars', '3', '2', '15h', '18h'),
                2 => new JobDating(2, 'Alternance', 'Saint-Genis-Pouilly', '5 juin', '3', '2', '15h', '18h'),
                3 => new JobDating(3, 'Stage', 'Lyon', '1er janvier', '3', '2', '15h', '18h'),
                4 => new JobDating(4, 'Alternance', 'Lyon', '25 octobre', '3', '2', '15h', '18h')
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->jobdatings);
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): JobDating
    {
        // request en bdd
        // if idJobDating not found
        if (!isset($this->jobdatings[$id])) {
            // throw exeption
            throw new JobDatingNotFoundException();
        }
        // return User
        return $this->jobdatings[$id];
    }
}

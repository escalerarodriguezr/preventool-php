<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\OccupationalRisk;

use Preventool\Domain\OccupationalRisk\Model\TaskRisk;
use Preventool\Domain\OccupationalRisk\Repository\TaskRiskRepository;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

class DoctrineTaskRiskRepository extends DoctrineBaseRepository implements TaskRiskRepository
{
    protected static function entityClass(): string
    {
        return TaskRisk::class;
    }

    public function save(TaskRisk $taskRisk): void
    {
        $this->saveEntity($taskRisk);
    }


}
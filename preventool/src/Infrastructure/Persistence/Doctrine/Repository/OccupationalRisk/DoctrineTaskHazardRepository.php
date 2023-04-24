<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\OccupationalRisk;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\OccupationalRisk\Exception\TaskHazardAlreadyExitsException;
use Preventool\Domain\OccupationalRisk\Model\TaskHazard;
use Preventool\Domain\OccupationalRisk\Repository\TaskHazardRepository;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

class DoctrineTaskHazardRepository extends DoctrineBaseRepository implements TaskHazardRepository
{
    protected static function entityClass(): string
    {
        return TaskHazard::class;
    }

    public function save(TaskHazard $taskHazard): void
    {
        try {
            $this->saveEntity($taskHazard);
        }catch (UniqueConstraintViolationException $exception){
            throw TaskHazardAlreadyExitsException::withTaskIdAndHazardId(
                $taskHazard->getTask()->getId(),
                $taskHazard->getHazard()->getId()
            );
        }
    }


}
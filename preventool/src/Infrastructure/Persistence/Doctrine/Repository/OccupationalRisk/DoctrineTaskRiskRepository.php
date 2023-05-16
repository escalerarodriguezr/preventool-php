<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\OccupationalRisk;

use Preventool\Application\OccupationalRisk\Response\TaskRiskResponse;
use Preventool\Domain\OccupationalRisk\Exception\TaskRiskNotFoundException;
use Preventool\Domain\OccupationalRisk\Model\TaskRisk;
use Preventool\Domain\OccupationalRisk\Repository\TaskRiskRepository;
use Preventool\Domain\Shared\Model\Value\Uuid;
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

    public function findById(Uuid $id): TaskRisk
    {
        $criteria = [
            'id' => $id->value
        ];
       $model = $this->objectRepository->findOneBy($criteria);

       if($model === null){
           throw TaskRiskNotFoundException::withId($id);
       }

       return $model;
    }


}
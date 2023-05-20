<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\OccupationalRisk;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\OccupationalRisk\Exception\TaskRiskAssessmentAlreadyExitsException;
use Preventool\Domain\OccupationalRisk\Model\TaskRiskAssessment;
use Preventool\Domain\OccupationalRisk\Repository\TaskRiskAssessmentRepository;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

class DoctrineTaskRiskAssessmentRepository extends DoctrineBaseRepository implements TaskRiskAssessmentRepository
{
    protected static function entityClass(): string
    {
        return TaskRiskAssessment::class;
    }

    public function save(TaskRiskAssessment $model): void
    {
        try{
            $this->saveEntity($model);

        }catch (UniqueConstraintViolationException $exception){
            throw TaskRiskAssessmentAlreadyExitsException::withTaskRiskId($model->getTaskRisk()->getId());
        }
    }


}
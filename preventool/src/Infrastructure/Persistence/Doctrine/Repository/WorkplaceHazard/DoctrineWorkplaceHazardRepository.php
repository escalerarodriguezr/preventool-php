<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\WorkplaceHazard;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\WorkplaceHazard\Exception\WorkplaceHazardAlreadyExistsException;
use Preventool\Domain\WorkplaceHazard\Model\WorkplaceHazard;
use Preventool\Domain\WorkplaceHazard\Repository\WorkplaceHazardRepository;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;


class DoctrineWorkplaceHazardRepository extends DoctrineBaseRepository implements WorkplaceHazardRepository
{
    protected static function entityClass(): string
    {
        return WorkplaceHazard::class;
    }

    public function save(WorkplaceHazard $model): void
    {
        try {
            $this->saveEntity($model);
        }catch (UniqueConstraintViolationException $exception){
            throw WorkplaceHazardAlreadyExistsException::withNameForWorkplace(
                $model->getName(),
                $model->getWorkplace()->getId()
            );
        }
    }


}
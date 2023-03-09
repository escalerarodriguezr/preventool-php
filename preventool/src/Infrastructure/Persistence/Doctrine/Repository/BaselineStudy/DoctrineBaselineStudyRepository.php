<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\BaselineStudy;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\BaselineStudy\Exception\BaselineStudyAlreadyExistsException;
use Preventool\Domain\BaselineStudy\Model\BaselineStudy;
use Preventool\Domain\BaselineStudy\Repository\BaselineStudyRepository;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

class DoctrineBaselineStudyRepository extends DoctrineBaseRepository implements BaselineStudyRepository
{
    protected static function entityClass(): string
    {
        return BaselineStudy::class;
    }

    public function save(BaselineStudy $model): void
    {
        try {
            $this->saveEntity($model);

        }catch (UniqueConstraintViolationException $exception){

            throw BaselineStudyAlreadyExistsException::forWorkplace($model->getWorkplace());
        }

    }


}
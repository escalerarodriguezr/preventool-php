<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\BaselineStudy;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\BaselineStudy\Exception\BaselineStudyAlreadyExistsException;
use Preventool\Domain\BaselineStudy\Exception\BaselineStudyNotFoundException;
use Preventool\Domain\BaselineStudy\Model\BaselineStudy;
use Preventool\Domain\BaselineStudy\Repository\BaselineStudyRepository;
use Preventool\Domain\Workplace\Model\Workplace;
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

    public function findAllByWorkplace(Workplace $workplace): array
    {
        $array = $this->objectRepository->findBy([
            'workplace' => $workplace->getId()->value
        ]);



        if( !count($array)){
            throw BaselineStudyNotFoundException::fotWorkplace($workplace);
        }

        return $array;
    }


}
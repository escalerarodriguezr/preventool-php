<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\Process;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\Process\Exception\ProcessAlreadyExistsException;
use Preventool\Domain\Process\Exception\ProcessNotFoundException;
use Preventool\Domain\Process\Model\Process;
use Preventool\Domain\Process\Repository\ProcessRepository;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\Workplace\Model\Workplace;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

class DoctrineProcessRepository extends DoctrineBaseRepository implements ProcessRepository
{
    protected static function entityClass(): string
    {
        return Process::class;
    }

    public function save(Process $model): void
    {
        try {
            $this->saveEntity($model);

        }catch (UniqueConstraintViolationException $exception){
            throw ProcessAlreadyExistsException::withNameForWorkplace(
                $model->getName(),
                $model->getWorkplace()
            );
        }
    }

    public function findByWorkplaceAndId(
        Workplace $workplace,
        Uuid $id
    ): Process
    {
        $criteria = [
            'id' => $id->value,
            'workplace' => $workplace->getId()->value
        ];

        $process = $this->objectRepository->findOneBy($criteria);

        if($process === null){
            throw ProcessNotFoundException::withIdForWorkplace(
                $workplace,
                $id
            );
        }

        return $process;
    }


}
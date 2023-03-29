<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\Process;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\Process\Exception\ProcessAlreadyExistsException;
use Preventool\Domain\Process\Model\Process;
use Preventool\Domain\Process\Repository\ProcessRepository;
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


}
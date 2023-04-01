<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\Process;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\Process\Exception\ProcessActivityAlreadyExistsException;
use Preventool\Domain\Process\Exception\ProcessActivityNotFoundException;
use Preventool\Domain\Process\Model\ProcessActivity;
use Preventool\Domain\Process\Repository\ProcessActivityRepository;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

class DoctrineProcessActivityRepository extends DoctrineBaseRepository implements ProcessActivityRepository
{
    protected static function entityClass(): string
    {
        return ProcessActivity::class;
    }

    public function save(ProcessActivity $processActivity): void
    {
        try {
            $this->saveEntity($processActivity);
        }catch (UniqueConstraintViolationException $exception){
            throw ProcessActivityAlreadyExistsException::withNameForProcess(
                $processActivity->getName(),
                $processActivity->getProcess()
            );
        }
    }

    public function findById(Uuid $id): ProcessActivity
    {
        $citeria = [
            'id' => $id->value
        ];

        $model = $this->objectRepository->findOneBy($citeria);

        if($model === null){
            throw ProcessActivityNotFoundException::withId($id);
        }

        return $model;
    }


}
<?php
declare(strict_types=1);

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\Workplace;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\Workplace\Exception\WorkplaceAlreadyExistsException;
use Preventool\Domain\Workplace\Model\Workplace;
use Preventool\Domain\Workplace\Repository\WorkplaceRepository;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

class DoctrineWorkplaceRepository extends DoctrineBaseRepository implements WorkplaceRepository
{
    protected static function entityClass(): string
    {
        return Workplace::class;
    }

    public function save(
        Workplace $workplace
    ): void
    {
        try{
            $this->saveEntity($workplace);

        }catch (UniqueConstraintViolationException $exception){

            throw WorkplaceAlreadyExistsException::forCompanyWithName(
                $workplace->getCompany(),
                $workplace->getName()
            );
        }
    }


}
<?php

namespace Preventool\Infrastructure\Persistence\Doctrine\Repository\Audit;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Preventool\Domain\Audit\Exception\AuditTypeAlreadyExistsException;
use Preventool\Domain\Audit\Model\AuditType;
use Preventool\Domain\Audit\Repository\AuditTypeRepository;
use Preventool\Domain\Shared\Model\Value\Name;
use Preventool\Infrastructure\Persistence\Doctrine\Repository\DoctrineBaseRepository;

final class DoctrineAuditTypeRepository extends DoctrineBaseRepository implements AuditTypeRepository
{
    protected static function entityClass(): string
    {
        return AuditType::class;
    }

    public function save(
        AuditType $auditType
    ): void
    {
        try {
            $this->saveEntity(
                $auditType
            );

        }catch (UniqueConstraintViolationException $exception){

            if( !$auditType->getCompany() && !$auditType->getWorkplace() ){
                throw AuditTypeAlreadyExistsException::forSystemWithName(
                    $auditType->getName()
                );
            }

            if( $auditType->getCompany() && !$auditType->getWorkplace() ){
                throw AuditTypeAlreadyExistsException::forCompanyWithName(
                    $auditType->getName(),
                    $auditType->getCompany()
                );
            }

            if( $auditType->getWorkplace() ){
                throw AuditTypeAlreadyExistsException::forWorkplaceWithName(
                    $auditType->getName(),
                    $auditType->getWorkplace()
                );
            }

        }

    }

    public function findSystemAuditTypeByNameOrNull(
        Name $name
    ): ?AuditType
    {

        return $this->objectRepository->findOneBy([
            'name' => $name->value,
            'company' => null,
            'workplace' => null
        ]);
    }


}
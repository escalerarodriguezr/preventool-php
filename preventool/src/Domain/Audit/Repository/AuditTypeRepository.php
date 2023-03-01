<?php

namespace Preventool\Domain\Audit\Repository;

use Preventool\Domain\Audit\Model\AuditType;
use Preventool\Domain\Shared\Model\Value\Name;
use Preventool\Domain\Shared\Model\Value\Uuid;

interface AuditTypeRepository
{
    public function save(AuditType $auditType): void;
    public function findById(Uuid $id): AuditType;
    public function findSystemAuditTypeByNameOrNull(Name $name): ?AuditType;

}
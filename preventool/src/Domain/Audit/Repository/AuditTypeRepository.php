<?php

namespace Preventool\Domain\Audit\Repository;

use Preventool\Domain\Audit\Model\AuditType;
use Preventool\Domain\Shared\Model\Value\Name;

interface AuditTypeRepository
{
    public function save(AuditType $auditType): void;
    public function findSystemAuditTypeByNameOrNull(Name $name): ?AuditType;

}
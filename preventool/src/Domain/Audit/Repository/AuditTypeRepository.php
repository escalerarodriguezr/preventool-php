<?php

namespace Preventool\Domain\Audit\Repository;

use Preventool\Domain\Audit\Model\AuditType;

interface AuditTypeRepository
{
    public function save(AuditType $auditType): void;

}
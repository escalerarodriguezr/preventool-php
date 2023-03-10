<?php
declare(strict_types=1);

namespace Preventool\Domain\BaselineStudy\Repository;

use Preventool\Domain\BaselineStudy\Model\BaselineStudyCompliance;

interface BaselineStudyComplianceRepository
{
    public function save(BaselineStudyCompliance $model): void;

}
<?php
declare(strict_types=1);

namespace Preventool\Domain\OccupationalRisk\Repository;

use Preventool\Domain\OccupationalRisk\Model\TaskRisk;

interface TaskRiskRepository
{
    public function save(TaskRisk $taskRisk): void;

}
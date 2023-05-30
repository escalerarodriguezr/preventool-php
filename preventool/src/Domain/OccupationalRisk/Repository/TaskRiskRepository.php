<?php
declare(strict_types=1);

namespace Preventool\Domain\OccupationalRisk\Repository;

use Preventool\Domain\OccupationalRisk\Model\TaskRisk;
use Preventool\Domain\Shared\Model\Value\Uuid;

interface TaskRiskRepository
{
    public function save(TaskRisk $taskRisk): void;
    public function findById(Uuid $id): TaskRisk;
    public function delete(TaskRisk $model): void;


}
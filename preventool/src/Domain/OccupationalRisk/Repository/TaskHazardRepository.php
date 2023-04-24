<?php
declare(strict_types=1);

namespace Preventool\Domain\OccupationalRisk\Repository;

use Preventool\Domain\OccupationalRisk\Model\TaskHazard;

interface TaskHazardRepository
{
    public function save(TaskHazard $taskHazard):void;

}
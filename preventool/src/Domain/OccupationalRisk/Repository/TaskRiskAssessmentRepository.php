<?php
declare(strict_types=1);

namespace Preventool\Domain\OccupationalRisk\Repository;

use Preventool\Domain\OccupationalRisk\Model\TaskRiskAssessment;

interface TaskRiskAssessmentRepository
{
    public function save(TaskRiskAssessment $model): void;

}
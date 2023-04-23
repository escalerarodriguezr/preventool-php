<?php

namespace Preventool\Domain\WorkplaceHazard\Repository;

use Preventool\Domain\WorkplaceHazard\Model\WorkplaceHazard;
interface WorkplaceHazardRepository
{
    public function save(WorkplaceHazard $model): void;

}
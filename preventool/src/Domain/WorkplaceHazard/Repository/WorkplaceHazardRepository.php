<?php

namespace Preventool\Domain\WorkplaceHazard\Repository;

use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\WorkplaceHazard\Model\WorkplaceHazard;
interface WorkplaceHazardRepository
{
    public function save(WorkplaceHazard $model): void;
    public function findById(Uuid $id): WorkplaceHazard;

}
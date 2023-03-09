<?php
declare(strict_types=1);

namespace Preventool\Domain\BaselineStudy\Repository;

use Preventool\Domain\BaselineStudy\Model\BaselineStudy;

interface BaselineStudyRepository
{
    public function save(BaselineStudy $model): void;

}
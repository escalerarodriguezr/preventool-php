<?php
declare(strict_types=1);

namespace Preventool\Domain\Process\Repository;

use Preventool\Domain\Process\Model\Process;

interface ProcessRepository
{
    public function save(Process $model): void;

}
<?php
declare(strict_types=1);

namespace Preventool\Domain\Process\Repository;

use Preventool\Domain\Process\Model\ProcessActivityTask;

interface ProcessActivityTaskRepository
{
    public function save(ProcessActivityTask $processActivityTask): void;

}
<?php
declare(strict_types=1);

namespace Preventool\Domain\Process\Repository;

use Preventool\Domain\Process\Model\ProcessActivity;

interface ProcessActivityRepository
{
    public function save(ProcessActivity $processActivity): void;

}
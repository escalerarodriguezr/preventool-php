<?php
declare(strict_types=1);

namespace Preventool\Domain\Process\Repository;

use Preventool\Domain\Process\Model\ProcessActivity;
use Preventool\Domain\Shared\Model\Value\Uuid;

interface ProcessActivityRepository
{
    public function save(ProcessActivity $processActivity): void;
    public function findById(Uuid $id): ProcessActivity;

}
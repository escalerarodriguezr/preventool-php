<?php
declare(strict_types=1);

namespace Preventool\Domain\Process\Repository;

use Preventool\Domain\Process\Model\Process;
use Preventool\Domain\Shared\Model\Value\Uuid;
use Preventool\Domain\Workplace\Model\Workplace;

interface ProcessRepository
{
    public function save(Process $model): void;
    public function findByWorkplaceAndId(Workplace $workplace,Uuid $id): Process;

}
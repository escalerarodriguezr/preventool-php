<?php
declare(strict_types=1);

namespace Preventool\Domain\Workplace\Repository;

use Preventool\Domain\Workplace\Model\Workplace;

interface WorkplaceRepository
{
    public function save(Workplace $workplace): void;

}
<?php
declare(strict_types=1);

namespace Preventool\Application\Demo\DomainEvent;

use Preventool\Domain\Shared\Bus\DomainEvent\DomainEventHandler;

class DemoCreatedHandler implements DomainEventHandler
{
    public function __invoke(DemoCreated $demoCreated): void
    {
        dd(
            "desde el evento",
            $demoCreated->id
        );
    }


}
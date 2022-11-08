<?php
declare(strict_types=1);

namespace Preventool\Application\Demo\CreateDemo;

use JetBrains\PhpStorm\NoReturn;

use Preventool\Application\Demo\DomainEvent\DemoCreated;
use Preventool\Domain\Shared\Bus\Command\CommandHandler;
use Preventool\Domain\Shared\Bus\DomainEvent\DomainEventBus;

class CreateDemoCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly DomainEventBus $domainEventBus
    )
    {
    }


    public function __invoke(
        CreateDemoCommand $command
    ):void
    {
//        dd(
//            "desde el handler",
//            $command
//        );

        $event = new DemoCreated(
            "titito"
        );

        $this->domainEventBus->dispatch($event);

    }


}
<?php
declare(strict_types=1);

namespace Preventool\Application\Demo\CreateDemo;

use JetBrains\PhpStorm\NoReturn;
use Preventool\Domain\Shared\Bus\Command\CommandHandler;

class CreateDemoCommandHandler implements CommandHandler
{

    public function __invoke(
        CreateDemoCommand $command
    ):void
    {
        dd(
            "desde el handler",
            $command
        );
    }


}
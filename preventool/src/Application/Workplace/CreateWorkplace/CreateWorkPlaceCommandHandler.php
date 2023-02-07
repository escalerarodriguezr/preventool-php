<?php
declare(strict_types=1);

namespace Preventool\Application\Workplace\CreateWorkplace;

use Preventool\Domain\Shared\Bus\Command\CommandHandler;

class CreateWorkPlaceCommandHandler implements CommandHandler
{


    public function __construct()
    {
    }

    public function __invoke(
        CreateWorkplaceCommand $command
    ): void
    {
        dd('handler', $command);
    }


}
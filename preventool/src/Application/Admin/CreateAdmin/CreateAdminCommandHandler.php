<?php
declare(strict_types=1);

namespace Preventool\Application\Admin\CreateAdmin;

use Preventool\Domain\Shared\Bus\Command\CommandHandler;
use Preventool\Domain\Shared\Model\Value\Uuid;

class CreateAdminCommandHandler implements CommandHandler
{


    public function __construct()
    {
    }

    public function __invoke(CreateAdminCommand $command) : void
    {

    }


}
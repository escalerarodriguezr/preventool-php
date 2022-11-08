<?php
declare(strict_types=1);

namespace App\Controller\Demo;

use Preventool\Application\Demo\CreateDemo\CreateDemoCommand;
use Preventool\Domain\Shared\Bus\Command\CommandBus;
use Preventool\Infrastructure\Ui\Http\Request\DTO\CreateDemoRequest;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetDemoController
{


    public function __construct(
        private LoggerInterface $logger,
        private readonly CommandBus $commandBus
    )
    {
    }

    public function __invoke(CreateDemoRequest $createDemoRequest):Response
    {



        $command = new CreateDemoCommand(
            $createDemoRequest->getName(),
            $createDemoRequest->getWidth(),
            $createDemoRequest->getHeight()
        );

        $this->commandBus->dispatch($command);



        return new JsonResponse(null,200);
    }


}
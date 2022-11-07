<?php
declare(strict_types=1);

namespace App\Controller\Demo;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetDemoController
{


    public function __construct(
        private LoggerInterface $logger
    )
    {
    }

    public function __invoke():Response
    {
        $this->logger->error("hola...");

        return new JsonResponse(null,200);
    }


}
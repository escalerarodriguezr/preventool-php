<?php
declare(strict_types=1);

namespace App\Controller\OccupationalRisk;

use Preventool\Application\OccupationalRisk\GetTaskHazardsByTaskId\GetTaskHazardsByTaskIdQuery;
use Preventool\Domain\Shared\Bus\Query\QueryBus;
use Preventool\Domain\Shared\Model\IdentityValidator;
use Preventool\Infrastructure\Ui\Http\Service\HttpRequestService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetTaskHazardsByTaskIdController
{


    public function __construct(
        private readonly HttpRequestService $httpRequestService,
        private readonly IdentityValidator $identityValidator,
        private readonly QueryBus $queryBus
    )
    {
    }

    public function __invoke(
        string $taskId
    ): Response
    {
        $this->identityValidator->validate($taskId);

        $response = $this->queryBus->handle(
            new GetTaskHazardsByTaskIdQuery(
                $this->httpRequestService->actionAdmin->getId()->value,
                $taskId
            )
        );

        return new JsonResponse(
            null,
            Response::HTTP_OK
        );
    }


}